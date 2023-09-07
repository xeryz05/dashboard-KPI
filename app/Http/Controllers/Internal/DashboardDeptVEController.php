<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period;
use App\Models\Departement\veitem;
use App\Models\Departement;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DashboardDeptVEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $filterPeriod = $request->input('period_id', 1);

    $periods = Period::all();
    $dept = Departement::all();

    $veitems = veitem::with('departement')
        ->when($filterPeriod, function ($query) use ($filterPeriod) {
            $query->where('period_id', $filterPeriod);
        })
        ->select('veitems.*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
        ->get();

    // Sort the items in memory (assuming a smaller set of data)
    $sortedVeitems = $veitems->sortByDesc(function ($item) {
        return $item->weight_percentage;
    });

    // Use caching to store the sorted items
    $cachedKey = "sorted_viitems_period_$filterPeriod";
    $cachedSortedVeitems = Cache::remember($cachedKey, now()->addMinutes(30), function () use ($sortedVeitems) {
        return $sortedVeitems;
    });

    $veitemsByDepartment = $cachedSortedVeitems->groupBy('departement_id');
    $sumByDepartment = $veitemsByDepartment->map(function ($items) {
            return $items->sum('weight_percentage');
        })->sortByDesc(function ($sumPercentage, $departmentId) {
            return $sumPercentage;
        });

        $total = $sumByDepartment->sum();
        $totalDepartements = $sumByDepartment->count();
        $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;

    // Return the view
        return view('internaldashboard.dashboard_dept_VE', compact('periods', 'dept', 'filterPeriod', 'veitemsByDepartment', 'sumByDepartment', 'avgsummary'));
}
    // public function index(Request $request)
    // {
    //     $periods = Period::get();
    //     $dept = Departement::get();
    //     $filterPeriod = $request->input('period_id',1);
    //     $veitems = veitem::when($filterPeriod, function ($query) use ($filterPeriod) {
    //         $query->where('period_id', $filterPeriod);
    //     })
    //     ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
    //     ->get();
    //     $veitemsByDepartment = $veitems->groupBy('departement_id');
    //     $sumByDepartment = $veitemsByDepartment->map(function ($items) {
    //         return $items->sum('weight_percentage');
    //     })->sortByDesc(function ($sumPercentage, $departmentId) {
    //         return $sumPercentage;
    //     });

    //     $total = $sumByDepartment->sum();
    //     $totalDepartements = $sumByDepartment->count();
    //     $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;
        
    //     return view('internaldashboard.dashboard_dept_VE', compact('periods','dept','filterPeriod','veitems','veitemsByDepartment','sumByDepartment','avgsummary'));
    // }
    // 
    // public function index(Request $request)
    // {
    //     $periods = Period::get();
    //     $dept = Departement::get();
        
    //     $veitems = veitem::select(
    //         '*',
    //         DB::raw('(realization / target) * 100 as percentage'),
    //         DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage')
    //     )->get();
        
    //     $veitemsByDepartment = $veitems->groupBy('departement_id');

    //     $sumByDepartment = $veitemsByDepartment->map(function ($items) {
    //         return $items->sum('weight_percentage');
    //     })->sortByDesc(function ($sumPercentage, $departmentId) {
    //         return $sumPercentage;
    //     });
    //     // Mengambil semua nilai 'weighted_percentage' dari koleksi $veitems
    //     $total = $sumByDepartment->sum();
    //     $totalDepartements = $sumByDepartment->count();
    //     $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;
        
    //     // @dd($sumByDepartment);

    //     return view('internaldashboard.dashboard_dept_VE', compact('periods','dept','veitemsByDepartment','sumByDepartment','avgsummary'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}