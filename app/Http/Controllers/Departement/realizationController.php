<?php

namespace App\Http\Controllers\Departement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement\realization;
use App\Models\Departement\kpipdca;
use App\Models\Period;


class realizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realization = realization::get();
        $kpipdca = kpipdca::get();
        $periods = Period::get();

        return view('kpi_departement.realization.vi.realization.index', compact('realization','kpipdca','periods'));
    }

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
        // $tambah = $target + $weight = $jumlah;
        $this->rules($request);

        $realization = new realization();
        $realization->period_id = $request->period_id;
        $realization->kpipdca_id = $request->kpipdca_id;
        $realization->value= $request->value;
        // $realization->create_by = Auth::guard('users')->id();
        $realization->save();
        
        return redirect()->route('realization-pdca.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(realization $realization)
    {
        $period = Period::get();

        return view('kpi_departement.realization.vi.realization.edit', compact('realization','period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, realization $realization)
    {
        $this->validate($request, [
            'period_id' => 'required',
            'realization_id' => 'required',
            'value' => 'required|numeric',
        ]);

        $realization->update([
            'period_id' => $request->period_id,
            'realization_id' => $request->realization_id,
            'value' => $request->value,
        ]);

      return redirect()->route('realization.index')->with(['success' => 'Data Berhasil Disimpan!']);
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

    function rules($request){
        $request->validate([
            'period_id' => 'required|unique:realizations,period_id',
            'realization_id' => 'required',
            'value' => 'required',
        ]);
    }
}
