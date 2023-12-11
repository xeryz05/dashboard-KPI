<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period;
use App\Models\Departement\veitem;
use App\Models\Departement;
use App\Models\periode\Event;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Cache;

class DashboardDeptVEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
{
    $events = Event::get();
    $dept = Departement::get();
    $lastFilter = Veitem::orderBy('event_id', 'desc')->value('event_id');
    $filterEvent = $lastFilter ? $lastFilter : 1;
    if ($request->has('event_id')) {
        $filterEvent = $request->input('event_id');
    }

    $userDepartments = Auth::user()->departement->pluck('id'); // Ambil seluruh departement_id yang dimiliki oleh user

    $veitems = Veitem::selectRaw('*, (realization / target) * 100 as percentage, ((realization / target) * 100) * weight / 100 as weight_percentage')
        ->where('event_id', $filterEvent)
        ->whereIn('departement_id', $userDepartments)
        ->get();
    $groupVeitems = $veitems->groupBy('departement_id');
        $sumByDepartment = $groupVeitems->map(function ($items) {
            return $items->sum('weight_percentage');
        })->sortByDesc(function ($sumPercentage, $departementId) {
            return $sumPercentage;
        });
    // dd($sumByDepartment);

    $total = $veitems->sum(DB::raw('((realization / target) * 100) * weight / 100'));
    // dd($total);
    $totalDepartements = count($userDepartments);
    // dd($totalDepartements);
    $avgsummary = $totalDepartements > 0 ? $total / $totalDepartements : 0;

    return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'filterEvent', 'groupVeitems','sumByDepartment','total', 'totalDepartements', 'avgsummary'));
}


    // public function indexx(Request $request)
    // {
    //     $events = Event::get();
    //     $dept = Departement::get();
    //     $filterEvent = $request->input('event_id', 1);

    //     $userDepartments = Auth::user()->departement->pluck('id'); // Ambil seluruh departement_id yang dimiliki oleh user

    //     $veitems = Veitem::whereHas('departement', function ($query) use ($userDepartments) {
    //         $query->whereIn('id', $userDepartments);
    //     })
    //         ->where('event_id', $filterEvent)
    //         ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
    //         ->get();
    //     // ->paginate(15);

    //     $sortedVeitems = $veitems->sortByDesc(function ($item) {
    //         return $item->weight_percentage;
    //     });

    //     $veitemsByDepartment = $sortedVeitems->groupBy('departement_id');
    //     $sumByDepartment = $veitemsByDepartment->map(function ($items) {
    //         return $items->sum('weight_percentage');
    //     })->sortByDesc(function ($sumPercentage, $departmentId) {
    //         return $sumPercentage;
    //     });

    //     $total = $sumByDepartment->sum();
    //     $totalDepartements = $sumByDepartment->count();
    //     $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;

    //     return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'filterEvent', 'veitems', 'veitemsByDepartment', 'sumByDepartment', 'avgsummary'));
    // }
}
//
// }
