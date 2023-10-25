<?php

namespace App\Http\Controllers\Departement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement\veitem;
use App\Models\Departement;
use App\Models\periode\Event;
use App\Models\Period;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VeitemImport;

use Illuminate\Support\Facades\Auth;


class veitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departement = Departement::all();
        $event = Event::all();
        $query = veitem::query()->with('event','departement');

        if ($request->ajax()) {
            if (empty($request->departement)) {
                $veitems = $query->with('departement')->get();
            }else {
                $veitems = $query->where(['departement_id'=>$request->departement])->get();
            }
            return response()->json(['veitems'=>$veitems]);
        }
        $veitems = $query->get();
        return view('kpi_departement.item.ve.index', compact('veitems','departement','event'));

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
        $this->rules($request);

        $veitem = new veitem();
        $veitem->departement_id = $request->departement_id;
        $veitem->event_id = $request->event_id;
        $veitem->area = $request->area;
        $veitem->kpi = $request->kpi;
        $veitem->calculation = $request->calculation;
        $veitem->target = $request->target;
        $veitem->weight = $request->weight;
        $veitem->realization = $request->realization;
        $veitem->save();
        
        return redirect()->route('veitem.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(veitem $veitem)
    {
        return view('kpi_departement.item.ve.edit', compact('veitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, veitem $veitem)
    {
        $this->validate($request, [
            'area' => 'required',
            'kpi' => 'required',
            'calculation' => 'required',
            'target' => 'required',
            'weight' => 'required|max:100',
            'realization' => 'numeric',
            
        ]);

        $veitem->update([
            'area' => $request->area,
            'kpi' => $request->kpi,
            'calculation' => $request->calculation,
            'target' => $request->target,
            'weight' => $request->weight,
            'realization' => $request->realization,
        ]);

      return redirect()->route('veitem.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = veitem::findOrFail($id);
        $item->delete();

        return redirect()->route('veitem.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function rules($request){
        $request->validate([
            'area' => 'required',
            'kpi' => 'required',
            'calculation' => 'required',
            'target' => 'required',
            'weight' => 'required|max:100',
            'departement_id' => 'required',
            'event_id' => 'required'
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new VeitemImport, $request->file('file'));
        // dd($request->file('file'));
        return redirect()->back()->with('success', 'All good!');
    }

}
