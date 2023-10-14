<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\corporate\Verev;
use App\Models\periode\Event;
use App\Models\corporate\Job;
use App\Imports\VerevImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Corporate\RevenueRequest;

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
        $job = Job::get();
        return view('admin.corporate.verevs.create', compact('events','job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevenueRequest $request)
    {
        Verev::create($request->all());
        
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
    public function edit(Verev $verev)
    {
        $event = Event::get();
        $job = Job::get();

        return view('admin.corporate.verevs.edit', compact('verev','job','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RevenueRequest $request, Verev $verev)
    {
        $verev->update($request->all());

        return redirect()->route('verevs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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

    public function import(Request $request)
    {
        Excel::import(new VerevImport, $request->file('file'));
        
        return redirect()->back()->with('success', 'All good!');
        // dd($request->file('file'));
    }
}
