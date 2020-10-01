<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\Product;
use App\User;
use App\CallLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {

        $sales_count = Order::sum('total');
    	$order_count = Order::whereMonth('created_at', '=', date('m'))->count();
    	$product_count = Product::count();
    	// $stock_count = Product::where('stock',0)->count();
    	$customer_count = User::count();
    	$latest_customers = User::whereMonth('created_at', '=', date('m'))->count();

    	$recent_orders = Order::orderBy('created_at', 'DESC')->limit(10)->get();

        $recent_products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        
        $callLogs = CallLog::all();

        return view('backend.admin_dashboard', compact('sales_count', 'order_count', 'product_count', /* 'stock_count', */ 'customer_count', 'latest_customers', 'recent_orders', 'recent_products', 'callLogs'));
    }

    /* Manage Roles functions */

    public function manageRoles() {

        $viewRoles = Admin::whereNotIn('type', ['Superadmin'])->get();
        return view('backend.admins.index' , compact('viewRoles'));
    }
}
