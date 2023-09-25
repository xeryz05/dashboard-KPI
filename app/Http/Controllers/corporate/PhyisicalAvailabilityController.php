<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\PhysicalAvailability;
use App\Models\periode\Event;
use App\Http\Requests\Corporate\PhysicalAvailabilityRequest;

class PhyisicalAvailabilityController extends Controller
{
    public function index()
    {
        $pa = PhysicalAvailability::get();
        // @dd($pa);
        return view('admin.corporate.physical_availability.index', compact('pa'));
    }

     public function create(){
        $event = Event::get();
        return view('admin.corporate.physical_availability.create', compact('event'));
    }
    public function store(PhysicalAvailabilityRequest $request){
        PhysicalAvailability::create($request->all());
        
        return redirect()->route('physicalavailability.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(PhysicalAvailability $physicalavailability){

        // @dd($physicalAvailability);
        $event = Event::get();

        return view('admin.corporate.physical_availability.edit', compact('physicalavailability','event'));
    }

    public function update(PhysicalAvailabilityRequest $request, PhysicalAvailability $physicalavailability){
        $physicalavailability->update($request->all());

        return redirect()->route('physicalavailability.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroy(PhysicalAvailability $physicalavailability){
        $physicalavailability->delete();

        return redirect()->route('physicalavailability.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
