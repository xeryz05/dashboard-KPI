<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\corporate\Virev;
use App\Models\periode\Event;
use App\Models\corporate\Job;
use App\Http\Requests\Corporate\RevenueRequest;
use App\Imports\VirevImport;
use Maatwebsite\Excel\Facades\Excel;

class VirevController extends Controller
{
    public function index(){
        $virevs = Virev::get();

        return view('admin.virevs.index', compact('virevs'));
    }
    public function create(){
        $events = Event::get();
        $job = Job::get();
        return view('admin.virevs.create', compact('events','job'));
    }
    public function store(RevenueRequest $request){
        Virev::create($request->all());
        
        return redirect()->route('virevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Virev $virev){
        $event = Event::get();
        $job = Job::get();

        return view('admin.virevs.edit', compact('virev','job','event'));
    }

    public function update(RevenueRequest $request, Virev $virev){
        $virev->update($request->all());

        return redirect()->route('virevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Virev $virev){
        $virev->delete();

        return redirect()->route('virevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function import(Request $request)
    {
        Excel::import(new VirevImport, $request->file('file'));
        
        return redirect()->back()->with('success', 'All good!');
        // dd($request->file('file'));
    }
}
