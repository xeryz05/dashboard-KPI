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

class DashboardDeptVEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterEvent = $request->input('event_id', 1); // Get filter event from request

        // Load the necessary data
        $events = Event::get(); // Load events data
        $dept = Departement::get(); // Load departments data

        // Get the user's departments
        $userDepartments = $this->getUserDepartments();

        // dd($userDepartments);

        // Get VE items based on user departments and filter event
        $veitems = $this->getVeitems($userDepartments, $filterEvent);

        // Group VE items by department
        $veitemsByDepartment = $veitems->groupBy('departement_id');

        // Calculate sum by department
        $sumByDepartment = $this->calculateSumByDepartment($veitemsByDepartment);

        // Calculate average summary
        $total = $sumByDepartment->sum();
        $totalDepartements = $sumByDepartment->count();
        $avgsummary = $this->calculateAvgSummary($total, $totalDepartements);

        // Render the view with the necessary data
        return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'filterEvent', 'veitems', 'veitemsByDepartment', 'sumByDepartment', 'avgsummary'));
    }

    private function getUserDepartments()
    {
        return Auth::user()->departement->pluck('id');
    }

    private function getVeitems($userDepartments, $filterEvent)
    {
        return Veitem::whereHas('departement', function ($query) use ($userDepartments) {
            $query->whereIn('id', $userDepartments);
        })
            ->where('event_id', $filterEvent)
            ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
            ->get();
    }

    private function calculateSumByDepartment($veitemsByDepartment)
    {
        return $veitemsByDepartment->map(function ($items) {
                return $items->sum('weight_percentage');
            })
            ->sortByDesc('sumPercentage');
    }

    private function calculateAvgSummary($total, $totalDepartements)
    {
        return $totalDepartements > 0 ? $total / $totalDepartements : 0;
    }
}
// {
    // public function index(Request $request)
    //     {
    //         $events = Event::get();
    //         $dept = Departement::get();
    //         $filterEvent = $request->input('event_id', 1);

    //         $userDepartments = Auth::user()->departement->pluck('id'); // Ambil seluruh departement_id yang dimiliki oleh user

    //         $veitems = Veitem::whereHas('departement', function ($query) use ($userDepartments) {
    //             $query->whereIn('id', $userDepartments);
    //         })
    //             ->where('event_id', $filterEvent)
    //             ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
    //             ->get();
    //             // ->paginate(15);

    //         $veitemsByDepartment = $veitems->groupBy('departement_id');
    //         $sumByDepartment = $veitemsByDepartment->map(function ($items) {
    //             return $items->sum('weight_percentage');
    //         })->sortByDesc('sumPercentage');

    //         $total = $sumByDepartment->sum();
    //         $totalDepartements = $sumByDepartment->count();
    //         $avgsummary = $totalDepartements > 0 ? $total / $totalDepartements : 0;

    //         return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'filterEvent', 'veitems', 'veitemsByDepartment', 'sumByDepartment', 'avgsummary',));
    //     }
// }