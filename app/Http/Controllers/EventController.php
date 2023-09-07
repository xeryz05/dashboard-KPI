<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\corporate\Event;
use App\Models\corporate\Verev;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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

        $veitem = new Event();
        $veitem->start = $request->start;
        $veitem->end = $request->end;
        $veitem->save();
        
        return redirect()->route('events.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $item = Event::findOrFail($id);
            if ($item->Verev()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus event yang memiliki data terkait.');
        }
        $item->delete();

        return redirect()->route('events.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function rules($request){
        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
    }
}
