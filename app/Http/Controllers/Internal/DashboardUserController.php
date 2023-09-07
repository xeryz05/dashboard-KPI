<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Revenue;
use App\Models\Period;
use App\Models\Vislider;
use App\Models\Customer;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::paginate(7);
        $revenues = Revenue::get();

        $tercapai = $revenues->pluck('grand_total')->sum();

        // @dd($total);

        $data = Revenue::select('grand_total','type_jobs')->get()->map(function ($item){
            return [
                'name' => $item->type_jobs,
                'y' => (int) $item->grand_total
            ];
        })->toArray();

        foreach ($revenues as $item) {
            $nilai1 =  $item->pluck('grand_total')->sum(); //nilai tercapai
            $nilai2 =  $item->target_pertahun; //target pertahun
            $a = $nilai2 - $nilai1;
        }

        return view('internaldashboard.dashboarduser', compact('revenues','a','periods','tercapai','data'));
    }


    public function grafik()
    {
        $revenues = Revenue::get();

        $tercapai = $revenues->pluck('grand_total')->sum();

        foreach ($revenues as $item) {

                $nilai1 =  $item->pluck('grand_total')->sum(); //nilai tercapai
                $nilai2 =  $item->target_pertahun; //target pertahun

                $selisih = $nilai2 - $nilai1;
        }

        // @dd($nilai1);

        return view('internaldashboard.grafikdashboarduser', compact('revenues','tercapai','selisih'));

    }

    public function jobchartVI()
    {
        $revenues = Revenue::get();

        $data = Revenue::select('grand_total','type_jobs')->get()->map(function ($item){
            return [
                'name' => $item->type_jobs,
                'y' => (int) $item->grand_total
            ];
        })->toArray();

        return view('internaldashboard.revenue.revenues', compact('revenues','data'));
    }

    
}
