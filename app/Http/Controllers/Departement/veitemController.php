<?php

namespace App\Http\Controllers\Departement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement\veitem;
use App\Models\Departement;
use App\Models\Period;

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
        $period = Period::all();
        $query = veitem::query()->with('period','departement');

        if ($request->ajax()) {
            if (empty($request->departement)) {
                $veitems = $query->with('departement')->get();
            }else {
                $veitems = $query->where(['departement_id'=>$request->departement])->get();
            }
            return response()->json(['veitems'=>$veitems]);
        }
        $veitems = $query->get();
        return view('kpi_departement.item.ve.index', compact('veitems','departement','period'));

    }

    // public function filter(Request $request){
    //     $query = Veitem::query()->with('period', 'departement');

    //     // Lakukan proses filter berdasarkan $request->input()
    //     // Contoh: if ($request->has('nama')) { $query->where('nama', $request->input('nama')); }
    //     if ($request->ajax()) {
    //         if (empty($request->period)) {
    //             $veitems = $query->get();
    //         }else {
    //             $veitems = $query->where(['period_id'=>$request->period])->get();
    //         }
    //     }
    //     $veitems = $query->get();
    //     // @dd($veitems);

    //     return response()->json(['veitems' => $veitems]);
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
        $this->rules($request);

        $veitem = new veitem();
        $veitem->departement_id = $request->departement_id;
        $veitem->period_id = $request->period_id;
        $veitem->area = $request->area;
        $veitem->kpi = $request->kpi;
        $veitem->calculation = $request->calculation;
        $veitem->target = $request->target;
        $veitem->weight = $request->weight;
        $veitem->realization = $request->realization;
        $veitem->created_by = Auth::user()->id;
        $veitem->updated_by = Auth::user()->id;
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
            'departement_id' => [
                    'required', 
                    function ($attribute, $value, $fail) use ($request) {
                        $exists = veitem::where('departement_id', $value)
                                        ->where('kpi', $request->input('kpi'))
                                        ->exists();

                                if ($exists) {
                                    $fail('Ada data yang sama');
                                }
                            }],
            'period_id' => 'required'
        ]);
    }

}
