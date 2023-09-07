<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Verev;

use Illuminate\Support\Facades\DB;

class CorporateveController extends Controller
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

        foreach ($groupedData as $item) {
            # code...
            $totalNilaiAkhir = 0;
            $bobot = 40;
            $target =  21000000000;
            $pencapaian = $item->total_value;
            $nilai = ($pencapaian / $target) * 100;
            $nilai_akhir = ($nilai * $bobot) / 100;

            $bobot_profit = 30;
            $target_profit = 7;
            $pencapaian_profit = $item->total_profit;
            $nilai_profit = ($pencapaian_profit / $target_profit) * 100;
            if ($nilai_profit < 0) { 
                $nilai_profit = 0;
            }
            $nilai_akhir_profit = ($nilai_profit * $bobot_profit) / 100;

            if ($nilai_akhir_profit < 0) {
                $nilai_akhir_profit = 0;
            }

            $totalNilaiAkhir += $nilai_akhir + $nilai_akhir_profit;

        }
        // @dd($totalNilaiAkhir);

        return view('internaldashboard.dashboardcor', compact(
            'data',
            'groupedData',
            'bobot','target','pencapaian','nilai','nilai_akhir',
            'bobot_profit','target_profit','pencapaian_profit','nilai_profit','nilai_akhir_profit',
            'totalNilaiAkhir',
        ));
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
