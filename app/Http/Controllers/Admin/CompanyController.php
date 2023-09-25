<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(CompanyRequest $request)
    {
        Company::create($request->all());

        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        // $company = Company::findOrFail($id);
        // return view('admin.companies.show', compact('dcompany'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        
        $company->update($request->all());
    
        return redirect()->route('companies.index')->with('success'  ,'Product updated successfully');

    }

    public function destroy(Company $company)
    {
        $company->delete();
    
        return redirect()->route('companies.index')->with('success','Product deleted successfully');
    }
}
