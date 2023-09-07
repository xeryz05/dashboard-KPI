<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies', 'companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departements',
        ]);

        Company::create([
            'name' => $request->name,
        ]);

        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        // $company = Company::findOrFail($id);
        // return view('admin.companies.show', compact('dcompany'));
    }

    public function edit(Departement $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        
        $request->validate([
            'name' => 'required',
        ]);
    
        $departement->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('companies.index')->with('success'  ,'Product updated successfully');

    }

    public function destroy(Company $company)
    {
        $comapny->delete();
    
        return redirect()->route('companies.index')->with('success','Product deleted successfully');
    }
}
