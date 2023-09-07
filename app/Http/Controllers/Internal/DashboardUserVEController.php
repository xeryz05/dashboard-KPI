<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Verev;

use Illuminate\Support\Facades\DB;

class DashboardUserVEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Verev::get();

        $groupedData = DB::table(function ($query) {
            $query->select(
                DB::raw('(ROW_NUMBER() OVER (ORDER BY event_id) - 1) DIV 6 + 1 AS semester'),
                'value','profit'
            )
            ->from('verevs');
        }, 'subquery')
        ->select('semester',DB::raw('SUM(value) as total_value'), 
                            DB::raw('SUM(profit) as total_profit'))
        ->groupBy('semester')
        ->get();

        // @dd($groupedData);
        // @dd($totalNilaiAkhir);

        return view('internaldashboard.dashboarduserVE', compact(
            'data',
            'groupedData',
        ));
    }
}
