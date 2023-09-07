<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\PA;
use Illuminate\Http\Request;

class PAController extends Controller
{
    public function index()
    {
        $PAs = PA::get();
        return view('admin.PA.index', compact('PAs'));
    }
}
