<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Virev;
use App\Models\corporate\Profit;
use Illuminate\Support\Facades\DB;


class CorpVIController extends Controller
{
    public function index(){
        $virevs = Virev::selectRaw('events.start as event, 
                                        SUM(virevs.value) as total_value, 
                                        SUM(profits.value) as total_profit,
                                        SUM(agings.value) as total_agings',
                                        )
                ->join('events', 'events.id', '=', 'virevs.event_id')
                ->leftJoin('profits', 'events.id', '=', 'profits.event_id') // Left join dengan tabel profits
                ->leftJoin('agings', 'events.id', '=', 'agings.event_id') // Left join dengan tabel profits
                ->groupBy('event')
                ->get();
        // @dd($virevs);

        $item = Virev::select('updated_at')->latest()->first();
        $valueSum = $virevs->sum('total_value');
        $profitSum = $virevs->sum('total_profit');

        $target = 24000000000;
        $valuePersent = ($valueSum / $target) * 100;

        // dd($item);

        $semesterSums = [];
        $semester = $virevs->chunk(6);

                foreach ($semester as $index => $chunk) {
                $chunkSum = $chunk->sum('total_value'); // Menghitung total_value untuk setiap bagian
                $chunkProfitSum = $chunk->sum('total_profit'); // Menghitung total_profit untuk setiap bagian
                $chunkAgingsSum = $chunk->sum('total_agings'); // Menghitung total_agings untuk setiap bagian

                $semesterSums[$index] = [
                        'semester' => $index + 1, // Menambahkan field "semester" dengan nilai indeks + 1
                        'total_value' => $chunkSum,
                        'total_profit' => $chunkProfitSum,
                        'total_agings' => $chunkAgingsSum,
                ];
        }
        
        // @dd($semesterSums);

        $records = DB::table('virevs')
                        ->selectRaw('virevs.job_id as job_id, 
                                jobs.name as job_name,
                                SUM(virevs.value) as total_value, 
                                (SUM(virevs.value) / (SELECT SUM(value) FROM virevs)) * 100 as percentage')
                        ->leftJoin('jobs', 'virevs.job_id',      '=', 'jobs.id')
                        ->groupBy('job_id')
                        ->orderByDesc('total_value') // Menyusun data berdasarkan total_value secara descending
                        ->take(3) // Mengambil 2 data teratas
                        ->get();

        // @dd($records);
        // @dd($records);

        return view('internaldashboard.corpVI.dashboardCorp-2023', compact('virevs','records','semesterSums', 'item', 'valueSum', 'profitSum','valuePersent'));

    }
}
