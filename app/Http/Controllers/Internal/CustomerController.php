<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Revenue;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $revenue = Revenue::get();
        $customer = Customer::get();

        return view('internaldashboard.show.solahart', compact('revenue','customer'));
    }
}
