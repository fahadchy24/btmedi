<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::/* with('orders')-> */get();
    	// echo "<pre>";
    	// print_r(json_decode(json_encode($customers)));
    	// echo "</pre>";
        return view('backend.customer.index', compact('customers'));
    }
    
    public function create()
    {
        return view('backend.customer.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $success = User::create($data);

        if ($success) {
            $notification=array(
            'message' => 'Customer Added Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    
}
