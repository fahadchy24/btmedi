<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Order Report
    // public function todaysOrder()
    // {
    //     $today = created_at('y-m-d');
    //     $orders = Order::where('created_at', $today)->get();
    //     return view('backend.reports.neworder', compact('orders'));
    // }
}
