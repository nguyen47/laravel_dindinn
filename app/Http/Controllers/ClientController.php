<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Vendor;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $vendors = Vendor::all();
        return view('clients.index', compact('clients', 'vendors'));
    }
}
