<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorMainController extends Controller
{
    public function index(){
        return view('vendor.dashboard');
    }

    public function orderhistory(){
        return view('vendor.orderhistory');
    }
}
