<?php

namespace App\Http\Controllers;

use App\Order;
use App\Wishlist;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;
// use Cart;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    // My Account 
    public function account($id)
    {
        $user = User::where('id', $id)->get();
        // $order = Order::where('user_id', $id)->get();
        // $wishlists = Wishlist::with('user' , 'product')->where('user_id',$id)->get();
    	// return view('user.account', compact('user', 'order', 'wishlists' ));
    	return view('frontend.user.account', compact('user'));
    }

    // Order History
    public function viewOrder($id)
    {
        $order = Order::with('product', 'user')->where('id', $id)->get();

        return view('frontend.user.view_order_history', compact('order'));
    }

    // Show wishlisted products
    public function showWishlist($id)
    {
        $wishlists = Wishlist::with('user', 'product')->where('user_id', $id)->get();

        // $wishlist_product = Product::with('wishlist')/*->where('id', $product_id)*/->get();
        // echo "<pre>"; print_r($wishlists); die;

        return view('frontend.user.wishlist', compact('wishlists'));
    }

    // Add products to wishlists
    public function add_to_wishlist(Request $request)
    {
        // $user_id = Auth::user()->id;
        $id = $request->id;

        $product_info = Product::where('id', $id)->first();

        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $product_info->id;

        if (Wishlist::insert($data)) {
            $notification = array(
                'message' => 'Product Added to Wishlist ',
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
}
