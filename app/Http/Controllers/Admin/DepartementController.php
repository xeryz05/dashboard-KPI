<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('admin.departements.index', compact('departements', 'departements'));
    }

    public function create()
    {
        return view('admin.departements.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departements|max:20',
        ]);

        Departement::create([
            'name'     => $request->name,
        ]);

        return redirect()->route('departements.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $departement = Departement::findOrFail($id);
        return view('admin.departements.show', compact('departement'));
    }

    public function edit(Departement $departement)
    {
        return view('admin.departements.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        
        $request->validate([
            'name' => 'required',
        ]);
    
        $departement->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('departements.index')->with('success'  ,'Product updated successfully');

    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
    
        return redirect()->route('departements.index')->with('success','Product deleted successfully');
    }
}
