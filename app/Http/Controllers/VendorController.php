<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }

    public function show($id)
    {
        $orders = Order::where('vendor_id', $id)->get();
        return view('vendors.show', compact('orders'));
    }
}
