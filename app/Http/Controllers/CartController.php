<?php

namespace App\Http\Controllers;

use App\Guestuser;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        // $data = $request->all();

        // echo "<pre>"; print_r($data); die;

        $id = $request->id;
        // $qty = $request->qty;

        $product_info = Product::where('id', $id)->first();

        $data['qty'] = $request->qty;
        $data['id'] = $product_info->id;
        $data['name'] = $product_info->product_name;
        
        if ($product_info->sale_price == NULL) {
           $data['price'] = $product_info->regular_price;
        }
        else {
            $data['price'] = $product_info->sale_price;
        }
        
        $data['weight'] = $product_info->id;
        $data['options']['main_image'] = $product_info->main_image;

        // echo "<pre>"; print_r($data); die;

        if (Cart::add($data)) {
            $notification = array(
                'message' => 'Product Added to Cart ',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function show_cart()
    {
        $content = Cart::content();
        // return response()->json($content);
        return view('frontend.pages.cart', compact('content'));
    }

    public function update_cart(Request $request)
    {

        $rowId = $request->rowId;
        $qty = $request->qty;

        $update_cart = Cart::update($rowId, $qty);
        if ($update_cart) {
            $notification = array(
                'message' => 'Cart has been updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    // Go to Checkout Page
    public function checkout()
    {
        $content = Cart::content();

        return view('frontend.pages.checkout', compact('content'));
    }

    // Plave Order
    public function storeOrder(Request $request)
    {
        $data = $request->all();

        // Insert Users 
        if(Auth::user()) {
            $data['user_id'] = Auth::user()->id;
            $data['userType'] = 'Registered User';
        }
        else {
            $guest = GuestUser::create($data);
            $data['guest_id'] = $guest->id;
            $data['userType'] = 'Guest';
        }

        // Insert Cart 
	   	$data['total'] = Cart::total();
        $data['sub_total'] = Cart::total();

        // Custom Invoice Number
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999).mt_rand(10000, 99999).$characters[rand(0, strlen($characters) - 1)];

        $data['invoice_number'] = '#'.str_shuffle($pin);
           
        $order = Order::create($data);
        if ($order) {
        Cart::destroy();
                $notification=array(
                    'message' => 'Your Order has been placed',
                    'alert-type' => 'success'
                );
            return redirect()->route('home')->with($notification);
        }
        else{
            $notification=array(
            'message' => 'Something Went wrong!',
            'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
