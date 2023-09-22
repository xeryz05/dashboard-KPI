<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Verev;
use App\Models\corporate\PhysicalAvailability;
use App\Models\corporate\Profitve;
use App\Models\Admin\Visitor;
use Illuminate\Support\Facades\DB;

class CorporateveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $PhysicalAvailability = PhysicalAvailability::get();
        // @dd($PhysicalAvailability);

        $verevs = Verev::selectRaw('events.start as event, 
                            SUM(verevs.value) as total_value, 
                            MAX(profitves.value) as total_profit,
                            MAX(physical_availabilities.value) as total_physical_availabilities')
                ->join('events', 'events.id', '=', 'verevs.event_id')
                ->leftJoin('profitves', 'events.id', '=', 'profitves.event_id')
                ->leftJoin('physical_availabilities', 'events.id', '=', 'physical_availabilities.event_id')
                ->groupBy('event')
                ->get();

        // @dd($verevs);
        

        // foreach ($verevs as $item) {
        //     echo $item->total_value;
        // }
        // @dd($item);

            $semesterSums = [];
            $semester = $verevs->chunk(6);

                    foreach ($semester as $index => $chunk) {
                    $chunkSum = $chunk->sum('total_value'); // Menghitung total_value untuk setiap bagian
                    $chunkProfitSum = $chunk->sum('total_profit'); // Menghitung total_profit untuk setiap bagian
                    $chunkAgingsSum = $chunk->sum('total_agings'); // Menghitung total_agings untuk setiap bagian
                    $chunkphysical_availabilitiesSum = $chunk->sum('total_physical_availabilities'); // Menghitung total_agings untuk setiap bagian

                    $semesterSums[$index] = [
                            'semester' => $index + 1, // Menambahkan field "semester" dengan nilai indeks + 1
                            'total_value' => $chunkSum,
                            'total_profit' => $chunkProfitSum,
                            'total_agings' => $chunkAgingsSum,
                            'total_physical_availabilities' => $chunkphysical_availabilitiesSum,
                    ];
            }


            // @dd($semesterSums);

            $records = DB::table('verevs')
                            ->selectRaw('verevs.job_id as job_id, 
                                    jobs.name as job_name,
                                    SUM(verevs.value) as total_value, 
                                    (SUM(verevs.value) / (SELECT SUM(value) FROM verevs)) * 100 as percentage')
                            ->leftJoin('jobs', 'verevs.job_id',      '=', 'jobs.id')
                            ->groupBy('job_id')
                            ->orderByDesc('total_value') // Menyusun data berdasarkan total_value secara descending
                            ->take(3) // Mengambil 2 data teratas
                            ->get();

            // @dd($records);
            // @dd($records);

            return view('internaldashboard.dashboardcor', compact('verevs','records','semesterSums'));

        }

}
