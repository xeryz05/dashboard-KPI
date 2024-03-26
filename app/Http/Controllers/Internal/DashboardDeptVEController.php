<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period;
use App\Models\Departement\veitem;
use App\Models\Departement;
use App\Models\periode\Event;
use App\Models\Departement\deptSemester;
use App\Models\corporate\Verev;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\corporate\CorpVEController;
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
            // Load the necessary data
            $periode = Event::orderBy('id')->get(); // Load events data
            $events = $periode->skip(12);

            $dept = Departement::get(); // Load departments data

            $lastFilter = Veitem::orderBy('event_id', 'desc')->value('event_id');
            $eventFilter = $lastFilter ? $lastFilter : 1;
            if ($request->has('event_id')) {
                $eventFilter = $request->input('event_id');
            }
            
            // Get the user's departments
            $userDepartments = $this->getUserDepartments(); // Ambil seluruh departement_id yang dimiliki oleh user

            // Get VE items based on user departments and filter event
            $veitems = $this->getVeitems($userDepartments, $eventFilter);

            // dd($viitems);

            // Group VE items by department
            $groupVeitems = $veitems->groupBy('departement_id');

            // dd($groupVeitems);
            // Calculate sum by department
            $sumByDepartment = $this->calculateSumByDepartment($groupVeitems);
            
            // Calculate average summary
            $total = $sumByDepartment->sum();
            $totalDepartements = $sumByDepartment->count();
            $avgsummary = $this->calculateAvgSummary($total, $totalDepartements);

            $deptsems = deptSemester::where('event_id', $eventFilter)->get();

            return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'eventFilter', 'veitems', 'groupVeitems', 'sumByDepartment', 'avgsummary','deptsems',));
        }

        private function getUserDepartments()
        {
            return Auth::user()->departement->pluck('id');
        }
        private function getVeitems($userDepartments, $eventFilter)
        {
            return Veitem::whereHas('departement', function ($query) use ($userDepartments) {
                $query->whereIn('id', $userDepartments);
            })
                ->where('event_id', $eventFilter)
                ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
                ->get();
        }

        private function calculateSumByDepartment($veitemsByDepartment)
        {
            return $veitemsByDepartment->map(function ($items) {
                 return $items->sum('weight_percentage');
             })->sortByDesc('sumPercentage');
        }

         private function calculateAvgSummary($total, $totalDepartements)
        {
            return $totalDepartements > 0 ? $total / $totalDepartements : 0;
        }

        // public function index(Request $request)
        // {
        //     // Load the necessary data
        //     $periode = Event::orderBy('id')->get(); // Load events data
        //     $events = $periode->skip(12);

        //     $dept = Departement::get(); // Load departments data

        //     $lastFilter = Veitem::orderBy('event_id', 'desc')->value('event_id');
        //     $eventFilter = $lastFilter ? $lastFilter : 1;
        //     if ($request->has('event_id')) {
        //         $eventFilter = $request->input('event_id');
        //     }
            
        //     // Get the user's departments
        //     $userDepartments = $this->getUserDepartments(); // Ambil seluruh departement_id yang dimiliki oleh user

        //     // Get VE items based on user departments and filter event
        //     $veitems = $this->getVeitems($userDepartments, $eventFilter);

        //     // dd($viitems);

        //     // Group VE items by department
        //     $groupVeitems = $veitems->groupBy('departement_id');

        //     // dd($groupVeitems);
        //     // Calculate sum by department
        //     $sumByDepartment = $this->calculateSumByDepartment($groupVeitems);
            
        //     // Calculate average summary
        //     $total = $sumByDepartment->sum();
        //     $totalDepartements = $sumByDepartment->count();
        //     $avgsummary = $this->calculateAvgSummary($total, $totalDepartements);

        //     $deptsems = deptSemester::where('event_id', $eventFilter)->get();

        //     return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'eventFilter', 'veitems', 'groupVeitems', 'sumByDepartment', 'avgsummary','deptsems',));
        //     // return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'groupVeitems','sumByDepartment','total', 'totalDepartements', 'avgsummary','eventFilter','semesterSums','data','deptsems'));
        // }

        // private function getUserDepartments()
        // {
        //     return Auth::user()->departement->pluck('id');
        // }
        // private function getVeitems($userDepartments, $filterEvent)
        // {
        //     return Veitem::whereHas('departement', function ($query) use ($userDepartments) {
        //         $query->whereIn('id', $userDepartments);
        //     })
        //         ->where('event_id', $filterEvent)
        //         ->select('*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
        //         ->get();
        // }

        // private function calculateSumByDepartment($veitemsByDepartment)
        // {
        //     return $veitemsByDepartment->map(function ($items) {
        //          return $items->sum('weight_percentage');
        //      })->sortByDesc('sumPercentage');
        // }

        //  private function calculateAvgSummary($total, $totalDepartements)
        // {
        //     return $totalDepartements > 0 ? $total / $totalDepartements : 0;
        // }

        

    // public function index(Request $request)
    // {
        
    //     $dept = Departement::get();

    //     $userDepartments = Auth::user()->departement->pluck('id'); // Ambil seluruh departement_id yang dimiliki oleh user

    //     $userDepartments = Auth::user()->departement->pluck('id');

    //     $lastFilter = Veitem::orderBy('event_id', 'desc')->value('event_id');
    //     $eventFilter = $lastFilter ? $lastFilter : 1;
    //         if ($request->has('event_id')) {
    //             $eventFilter = $request->input('event_id');
    //         }

    //     // $events = Event::orderBy('id', 'desc')->get();
        
    //     // $eventFilter = $request->input('event_filter');

    //     $veitems = Veitem::selectRaw('*, (realization / target) * 100 as percentage, ((realization / target) * 100) * weight / 100 as weight_percentage')
    //         ->whereIn('departement_id', $userDepartments)
    //         ->when($eventFilter, function ($query) use ($eventFilter) {
    //             $query->where('event_id', $eventFilter);
    //         })
    //         ->get();

    //     $groupVeitems = $veitems->groupBy('departement_id');
    //     $sumByDepartment = $groupVeitems->map(function ($items) {
    //         return $items->sum('weight_percentage');
    //     })->sortByDesc(function ($sumPercentage, $departementId) {
    //         return $sumPercentage;
    //     });

    //     $total = $veitems->sum(DB::raw('((realization / target) * 100) * weight / 100'));
    //     $totalDepartements = count($userDepartments);
    //     $avgsummary = $totalDepartements > 0 ? $total / $totalDepartements : 0;


    //     $data = deptSemester::pluck('id');  

    //     return view('internaldashboard.dashboard_dept_VE', compact('events', 'dept', 'groupVeitems','sumByDepartment','total', 'totalDepartements', 'avgsummary','eventFilter'));
    // }



    // public function x()
    // {
    //     $events = Event::all(); // Ganti $periods
    //     $latestEvents = Event::orderBy('id', 'desc')->get();

    //     // Ambil event terakhir sebagai event default
    //     $defaultEvent = $events->last();

    //     // Ambil event yang dipilih dari request
    //     $selectedEventId  = $request->input('selectEvent');

    //     // Gunakan event terakhir sebagai default jika selectEvent tidak ada atau tidak valid
    //     $selectedEventId  = $selectedEventId  ?? $defaultEvent->id;
    //     $selectedEvent = Event::find($selectedEventId);

    //     $user = Auth::user();
    //     $departmentIds = Auth::user()->departments->pluck('id'); 

    //    // Pastikan bahwa selectedEventId  adalah event yang valid
    //     if (!$events->contains('id', $selectedEventId )) {
    //         $selectedEventId  = $defaultEvent->id;
    //     }

    //     // Lanjutkan dengan mengambil data KpiItem sesuai dengan selectedEventId 
    //     $pditems = KpiItem::with('department')
    //         ->where('event_id', $selectedEventId ) // Filter berdasarkan event yang dipilih
    //         ->whereIn('department_id', $departmentIds)
    //         ->select('kpi_items.*', DB::raw('(realization / target) * 100 as percentage'), DB::raw('((realization / target) * 100) * weight / 100 as weight_percentage'))
    //         ->get();


    //     $pditemsByDepartment = $pditems->groupBy('department_id');
    //     $sumByDepartment = $pditemsByDepartment->map(function ($items) {
    //             return $items->sum('weight_percentage');
    //         })->sortByDesc(function ($sumPercentage, $departmentId) {
    //             return $sumPercentage;
    //         });

    //     $total = $sumByDepartment->sum();
    //     $totalDepartements = $sumByDepartment->count();
    //     $avgsummary = $totalDepartements > 0 ?  $total / $totalDepartements : 0;

    //     // Dapatkan data dari dept_corps berdasarkan ID yang telah ditentukan
    //     $data = DeptCorp::where('id', $id)
    //                     ->orderBy('id', 'desc')
    //                     ->get()
    //                     ->pluck('value');

    //     // Dapatkan data dari dept_corps berdasarkan ID yang telah ditentukan
    //     $semesterData = DeptCorp::where('id', $id);

    //     $semesterValue = $semesterData ? $semesterData->semester : null;


    //     return view('visit.dept', compact('selectedEvent', 'departmentIds', 'pditemsByDepartment', 'total', 'totalDepartements', 'avgsummary', 'sumByDepartment', 'events', 'latestEvents', 'data', 'semesterValue'));

    // }
}
