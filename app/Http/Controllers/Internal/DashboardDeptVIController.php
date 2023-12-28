<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\periode\Event;
use App\Models\Departement\viitem;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardDeptVIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            // Load the necessary data
            $events = Event::orderBy('id','desc')->get(); // Load events data
            $dept = Departement::get(); // Load departments data
            // $filterEvent = $request->input('event_id', 1); // Get filter event from request

            $lastFilter = Viitem::orderBy('event_id', 'desc')->value('event_id');
            $filterEvent = $lastFilter ? $lastFilter : 1;
            if ($request->has('event_id')) {
                $filterEvent = $request->input('event_id');
            }
            
            // Get the user's departments
            $userDepartments = $this->getUserDepartments(); // Ambil seluruh departement_id yang dimiliki oleh user

            // Get VE items based on user departments and filter event
            $viitems = $this->getVeitems($userDepartments, $filterEvent);

            // Group VE items by department
            $viitemsByDepartment = $viitems->groupBy('departement_id');
            // Calculate sum by department
            $sumByDepartment = $this->calculateSumByDepartment($viitemsByDepartment);
            
            // Calculate average summary
            $total = $sumByDepartment->sum();
            $totalDepartements = $sumByDepartment->count();
            $avgsummary = $this->calculateAvgSummary($total, $totalDepartements);

            return view('internaldashboard.dashboard_dept_VI', compact('events', 'dept', 'filterEvent', 'viitems', 'viitemsByDepartment', 'sumByDepartment', 'avgsummary',));
        }

        private function getUserDepartments()
        {
            return Auth::user()->departement->pluck('id');
        }
        private function getVeitems($userDepartments, $filterEvent)
        {
            return Viitem::whereHas('departement', function ($query) use ($userDepartments) {
                $query->whereIn('id', $userDepartments);
            })
                ->where('event_id', $filterEvent)
                ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
                ->get();
        }

        private function calculateSumByDepartment($viitemsByDepartment)
        {
            return $viitemsByDepartment->map(function ($items) {
                 return $items->sum('weight_percentage');
             })->sortByDesc('sumPercentage');
        }

         private function calculateAvgSummary($total, $totalDepartements)
        {
            return $totalDepartements > 0 ? $total / $totalDepartements : 0;
        }








// public function index(Request $request)
// {
//     $filterevent = $request->input('event_id', 1);

//     $events = event::all();
//     $dept = Departement::all();

//     $viitems = viitem::with('departement')
//         ->when($filterevent, function ($query) use ($filterevent) {
//             $query->where('event_id', $filterevent);
//         })
//         ->select('viitems.*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
//         ->get();

//     // Sort the items in memory (assuming a smaller set of data)
//     $sortedViitems = $viitems->sortByDesc(function ($item) {
//         return $item->weight_percentage;
//     });

//     // Use caching to store the sorted items
//     $cachedKey = "sorted_viitems_event_$filterevent";
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
//         return view('internaldashboard.dashboard_dept_VI', compact('events', 'dept', 'filterevent','viitemsByDepartment', 'sumByDepartment', 'avgsummary'));
// }

    // public function index(Request $request)
    // {
    //     $events = event::get();
    //     $dept = Departement::get();
    //     $filterevent = $request->input('event_id',1);
    //     $viitems = viitem::when($filterevent, function ($query) use ($filterevent) {
    //         $query->where('event_id', $filterevent);
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
        
    //     return view('internaldashboard.dashboard_dept_VI', compact('events','dept','filterevent','viitemsByDepartment','sumByDepartment','avgsummary'));
    // }

}
