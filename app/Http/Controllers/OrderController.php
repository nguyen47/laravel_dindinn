<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewOrderHasRegisteredEvent;

class OrderController extends Controller
{
    public function sendOrder(Request $request)
    {
        $data = $request->all();
        event(new NewOrderHasRegisteredEvent($data));
        return redirect()->route('clients.index');
    }
}
