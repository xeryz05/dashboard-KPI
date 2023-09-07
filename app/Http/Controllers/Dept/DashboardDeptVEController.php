<?php

namespace App\Http\Controllers\Dept;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Period;

class DashboardDeptVEController extends Controller
{
    function index(){

        $departements = Departement::get();
        $periods = Period::get();
        return view('kpidept.VE.dashboarddeptve', compact('departements', 'periods'));
    }

    function additem(){
        $departements = Departement::get();
        $periods = Period::paginate(5);
        return view('kpidept.VE.additemve', compact('departements', 'periods'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        Departement::create([
            'name'     => $request->name,
        ]);

        return redirect()->route('departements.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
