<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Visitor;
use Illuminate\Support\Str;

class VisitorController extends Controller
{
    public function trackVisitor(Request $request){
        $visitor = new Visitor();
        $visitor->ip_address = $request->ip();
        $visitor->user_agent = $request->header('User-Agent');
        $visitor->visited_at = now();
        $visitor->unique_token = Str::uuid();
        $visitor->user_id = auth()->user()->id;
        $visitor->save();

        return view('internaldashboard.dashboardcor');
    }
}
