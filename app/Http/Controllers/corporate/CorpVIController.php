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
                // @dd($profitsAndVirevs);
        // $virevs = Virev::selectRaw('events.start as event, SUM(virevs.value) as total_value')
        //         ->join('events', 'events.id', '=', 'virevs.event_id')
        //         ->groupBy('event')
        //         ->get();
        // Query untuk mengambil total value dari tabel virevs

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

        $records = DB::table('virevs')
                ->selectRaw('virevs.job_id as job_id, 
                            SUM(virevs.value) as total_value, 
                            (SUM(virevs.value) / (SELECT SUM(value) FROM virevs)) * 100 as percentage')
                ->groupBy('job_id')
                ->get()
                ->toArray();

        // @dd($records);
        // @dd($records);

        return view('internaldashboard.dashboardcorp_vi', compact('virevs','records'));

    }
}
