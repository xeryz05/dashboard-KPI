<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verevenue;
use App\Models\Period;
use Illuminate\Http\Request;

class VerevenueController extends Controller
{
    public function index()
    {
        $verevenues = Verevenue::get();
        $periods = Period::paginate(6);
        return view('admin.revenuesVE.index', compact('verevenues','periods'));
    }
}
