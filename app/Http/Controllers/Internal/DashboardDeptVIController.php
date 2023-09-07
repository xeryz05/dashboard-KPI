<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period;
use App\Models\Departement\viitem;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DashboardDeptVIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $filterPeriod = $request->input('period_id', 1);

    // Load the necessary data
    $periods = Period::all();
    $dept = Departement::all();

    // Load VI items with the necessary relations and filters
    $viitems = viitem::with('departement')
        ->when($filterPeriod, function ($query) use ($filterPeriod) {
            $query->where('period_id', $filterPeriod);
        })
        ->select('viitems.*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
        ->get();

    // Calculate the weighted percentages
    $viitemsByDepartment = $viitems->groupBy('departement_id');
    $sumByDepartment = $viitemsByDepartment->map(function ($items) {
        return $items->sum('weight_percentage');
    });

    // Calculate the total
    $total = $sumByDepartment->sum();
    $totalDepartements = $sumByDepartment->count();
    $avgsummary = $totalDepartements > 0 ? $total / $totalDepartements : 0;

    // Return the view
    return view('internaldashboard.dashboard_dept_VI', compact('periods', 'dept', 'filterPeriod', 'viitemsByDepartment', 'sumByDepartment', 'avgsummary'));
}
// public function index(Request $request)
// {
//     $filterPeriod = $request->input('period_id', 1);

//     $periods = Period::all();
//     $dept = Departement::all();

//     $viitems = viitem::with('departement')
//         ->when($filterPeriod, function ($query) use ($filterPeriod) {
//             $query->where('period_id', $filterPeriod);
//         })
//         ->select('viitems.*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
//         ->get();

//     // Sort the items in memory (assuming a smaller set of data)
//     $sortedViitems = $viitems->sortByDesc(function ($item) {
//         return $item->weight_percentage;
//     });

//     // Use caching to store the sorted items
//     $cachedKey = "sorted_viitems_period_$filterPeriod";
//     $cachedSortedViitems = Cache::remember($cachedKey, now()->addMinutes(30), function () use ($sortedViitems) {
//         return $sortedViitems;
//     });

//     $viitemsByDepartment = $cachedSortedViitems->groupBy('departement_id');
//     $sumByDepartment = $viitemsByDepartment->map(function ($items) {
//             return $items->sum('weight_percentage');
//         })->sortByDesc(function ($sumPercentage, $departmentId) {
//             return $sumPercentage;
//         });

//         $total = $sumByDepartment->sum();
//         $totalDepartements = $sumByDepartment->count();
//         $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;

//     // Return the view
//         return view('internaldashboard.dashboard_dept_VI', compact('periods', 'dept', 'filterPeriod','viitemsByDepartment', 'sumByDepartment', 'avgsummary'));
// }

    // public function index(Request $request)
    // {
    //     $periods = Period::get();
    //     $dept = Departement::get();
    //     $filterPeriod = $request->input('period_id',1);
    //     $viitems = viitem::when($filterPeriod, function ($query) use ($filterPeriod) {
    //         $query->where('period_id', $filterPeriod);
    //     })
    //     ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
    //     ->get();
    //     $viitemsByDepartment = $viitems->groupBy('departement_id');
    //     $sumByDepartment = $viitemsByDepartment->map(function ($items) {
    //         return $items->sum('weight_percentage');
    //     })->sortByDesc(function ($sumPercentage, $departmentId) {
    //         return $sumPercentage;
    //     });

    //     $total = $sumByDepartment->sum();
    //     $totalDepartements = $sumByDepartment->count();
    //     $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;
        
    //     return view('internaldashboard.dashboard_dept_VI', compact('periods','dept','filterPeriod','viitemsByDepartment','sumByDepartment','avgsummary'));
    // }

}
