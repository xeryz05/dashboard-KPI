<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Virev;
use Illuminate\Support\Facades\DB;
use App\Models\periode\Event;


class CorpVIController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dari request, jika tidak ada, gunakan tahun default
        $selectedYear = $request->input('year', 2023);
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
            \DB::raw('MAX(profits.value) as total_profit'),
            \DB::raw('MAX(agings.value) as total_agings')
        )
            ->leftJoin('profits', 'virevs.event_id', '=', 'profits.event_id')
            ->leftJoin('agings', 'virevs.event_id', '=', 'agings.event_id')
            ->whereHas('event', function ($query) use ($selectedYear) {
                $query->where('year', $selectedYear);
            
            })
            ->groupBy('virevs.event_id')
            ->get();

            // dd($dataSUM);


        $item = Virev::select('updated_at')->latest()->first();
        $valueSum = $virevs->sum('total_value');
        $agingSum = $virevs->sum('total_aging');

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
                'total_aging' => $chunkMax,
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

        return view('internaldashboard.corpVI.dashboardCorp-2024', compact('virevs', 'events', 'selectedYear', 'dataSUM', 'semesterSums', 'item', 'records', 'valueSum', 'agingSum', 'valuePersent'));
    }
}