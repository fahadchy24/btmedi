<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\Product;
use App\User;
use App\CallLog;
use App\Category;
use App\Http\Controllers\Controller;
use App\RMA;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard() {

        $sales_count = Order::whereMonth('created_at', '=', date('m'))->sum('total');
        $shipped_order = Order::where('status', 'Finished')->sum('total');
        $monthly_rma = RMA::count();
        $total_callLogs = CallLog::count();

        $total_categories = Category::count();
        $product_count = Product::count();
        $todays_products = Product::whereDay('created_at', '=', date('d'))->count();

        $active_products = Product::where('status', 1)->count();
        $inactive_products = Product::where('status', 0)->count();
        $low_inventorty = Product::where('stock_quantity', 2)->count();

    	// $stock_count = Product::where('stock',0)->count();
    	$customer_count = User::count();
    	$active_accounts = User::where('isActive', 1)->count();
    	$inactive_accounts = User::where('isActive', 0)->count();
    	$today_customers = User::whereDay('created_at', '=', date('d'))->count();
    	$latest_customers = User::whereMonth('created_at', '=', date('m'))->count();
        
    	$today_order = Order::whereDay('created_at', '=', date('d'))->count();
    	$week_order = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();
        $month_order = Order::whereMonth('created_at', '=', date('m'))->count();
    	$today_order_amount = Order::whereDay('created_at', '=', date('d'))->sum('total');
    	$week_order_amount = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('total');
        $month_order_amount = Order::whereMonth('created_at', '=', date('m'))->sum('total');
        
    	$recent_orders = Order::orderBy('created_at', 'DESC')->limit(10)->get();

        $recent_products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        
        $callLogs = CallLog::all();

        return view('backend.admin_dashboard', compact('sales_count', 'shipped_order', 'monthly_rma' , 'total_callLogs' , 'total_categories', 'todays_products', 'active_products', 'inactive_products' , 'low_inventorty', 'product_count', 'customer_count', 'active_accounts', 'inactive_accounts', 'today_customers', 'latest_customers', 'today_order', 'week_order', 'month_order', 'today_order_amount', 'week_order_amount', 'month_order_amount', 'recent_orders', 'recent_products', 'callLogs'));
    }

    /* Manage Roles functions */

    public function manageRoles() {

        $viewRoles = Admin::whereNotIn('type', ['Superadmin'])->get();
        return view('backend.admins.index' , compact('viewRoles'));
    }
}
