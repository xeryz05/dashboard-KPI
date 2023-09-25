<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Aging;
use App\Models\periode\Event;
use App\Http\Requests\Corporate\AgingRequest;

class AgingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agings = Aging::get();

        return view('admin.corporate.agings.index', compact('agings'));
    }

     public function create(){
        $event = Event::get();
        return view('admin.corporate.agings.create', compact('event'));
    }
    public function store(AgingRequest $request){
        Aging::create($request->all());
        
        return redirect()->route('agings.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Aging $aging){
        $event = Event::get();

        return view('admin.corporate.agings.edit', compact('aging','event'));
    }

    public function update(AgingRequest $request, Aging $aging){
        $aging->update($request->all());

        return redirect()->route('agings.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroy(Aging $aging){
        $aging->delete();

        return redirect()->route('agings.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
