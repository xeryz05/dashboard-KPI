<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Virev;
use Illuminate\Support\Facades\DB;
use App\Models\periode\Event;


class CorpVIController extends Controller
{
    public function indexx()
    {
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
            ->leftJoin('jobs', 'virevs.job_id', '=', 'jobs.id')
            ->groupBy('job_id')
            ->orderByDesc('total_value') // Menyusun data berdasarkan total_value secara descending
            ->take(3) // Mengambil 2 data teratas
            ->get();

        // @dd($records);
        // @dd($records);

        return view('internaldashboard.corpVI.dashboardCorp-2023', compact('virevs', 'records', 'semesterSums', 'item', 'valueSum', 'profitSum', 'valuePersent'));

    }

    public function index(Request $request)
    {
        // Ambil tahun dari request, jika tidak ada, gunakan tahun default
        $selectedYear = $request->input('year', date('Y'));
        // Ambil virevs yang sesuai dengan tahun dari tabel events
        $virevs = Virev::whereHas('event', function ($query) use ($selectedYear) {
            $query->where('year', $selectedYear);
        })->get();
        // Ambil semua events untuk ditampilkan pada dropdown filter
        $events = Event::distinct('year')->pluck('year');

        // Menghitung data berdasarkan event_id yang sama
        $dataSUM = Virev::select(
            'virevs.event_id as event_id',
            \DB::raw('SUM(virevs.value) as count'),
            \DB::raw('MAX(profitves.value) as total_profit'),
            \DB::raw('MAX(physical_availabilities.value) as total_physical_availabilities')
        )
            ->leftJoin('profitves', 'virevs.event_id', '=', 'profitves.event_id')
            ->leftJoin('physical_availabilities', 'virevs.event_id', '=', 'physical_availabilities.event_id')
            ->whereHas('event', function ($query) use ($selectedYear) {
                $query->where('year', $selectedYear);
            })
            ->groupBy('virevs.event_id')
            ->get();


        $item = Virev::select('updated_at')->latest()->first();
        $valueSum = $virevs->sum('total_value');
        $profitSum = $virevs->sum('total_profit');

        $target = 24000000000;
        $valuePersent = ($valueSum / $target) * 100;
        // dd($item);


        $semesterSums = [];
        $semester = $dataSUM->chunk(6);

        foreach ($semester as $index => $item) {
            $chunkSum = $item->sum('count');
            $chunkMax = $item->sum('total_profit');

            $semesterSums[$index] = [
                'semester' => $index + 1,
                'total_value' => $chunkSum,
                'total_profit' => $chunkMax,
                // You may add other fields you want to sum here
            ];
        }
        // dd($semester);

        // Ambil virevs yang sesuai dengan tahun dari tabel events
        $records = DB::table('virevs')
            ->selectRaw('virevs.job_id as job_id,
                            jobs.name as job_name,
                            SUM(virevs.value) as total_value,
                            (SUM(virevs.value) / (SELECT SUM(value) FROM virevs)) * 100 as percentage')
            ->leftJoin('jobs', 'virevs.job_id', '=', 'jobs.id')
            ->leftJoin('events', 'virevs.event_id', '=', 'events.id') // Adjust the relationship based on your actual database structure
            ->where('events.year', $selectedYear) // Adjust the column name based on your actual database structure
            ->groupBy('job_id')
            ->orderByDesc('total_value')
            ->take(3)
            ->get();


        return view('internaldashboard.corpVI.dashboardCorp-2024', compact('virevs', 'events', 'selectedYear', 'dataSUM', 'semesterSums', 'item', 'records', 'valueSum', 'profitSum', 'valuePersent'));
    }
}