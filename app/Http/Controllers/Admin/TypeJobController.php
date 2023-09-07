<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TypeJob;
use App\Http\Requests\Admin\TypeJobRequest;

class TypeJobController extends Controller
{
    public function index()
    {
        $type_jobs = TypeJob::get();
        return view('admin.type_jobs.index', compact('type_jobs'));
    }

    public function create()
    {
        return view('admin.type_jobs.create');
    }

    public function store(TypeJobRequest $request)
    {
        $datajob_type = $request->all();

        TypeJob::create($datajob_type);

        return redirect()->route('type_jobs.index');
    }
}
