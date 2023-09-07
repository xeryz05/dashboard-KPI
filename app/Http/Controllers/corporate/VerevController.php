<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\corporate\Verev;
use App\Models\corporate\Event;

class VerevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verevs = Verev::get();
        // $formattedStartDate = $verevs->event['start']->format('d-m-Y');
        // @dd($formattedStartDate);

        return view('admin.corporate.verevs.index', compact('verevs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::get();
        return view('admin.corporate.verevs.create', compact('events'));
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

        $verevs = new Verev();
        $verevs->event_id = $request->event_id;
        $verevs->type_job = $request->type_job;
        $verevs->value = $request->value;
        $verevs->physical_availability = $request->physical_availability;
        $verevs->profit = $request->profit;
        $verevs->save();
        
        return redirect()->route('verevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $item = Verev::findOrFail($id);
        $item->delete();

        return redirect()->route('verevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function rules($request){
        $request->validate([
            'event_id' => 'required',
            'type_job' => 'required',
            'value' => 'required',
            'profit' => 'required',
            'physical_availability' => 'required'
        ]);
    }
}
