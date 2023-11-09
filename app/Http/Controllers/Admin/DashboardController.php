<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Visitor;

class DashboardController extends Controller
{
    public function index(){

        $CountUsers = User::get()->count();
        // $visitors = Visitor::get()->count();
        // $online = User::get();
        // $CountRoles = Role::get()->count();

        // @dd($online);

        return view('admin.admin_dashboard', compact('CountUsers'));
    }
}
