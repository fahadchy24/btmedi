<?php

namespace App\Http\Controllers;

use App\Guestuser;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Cart;

class OrderController extends Controller
{
    public function newOrders()
    {
        $new_orders = Order::where('status', 'Pending')->get();
        return view('backend.order.new_order', compact('new_orders'));
    }

    public function ordersProcessing()
    {
        $orders_processing = Order::where('status', 'Order Processing')->get();
        return view('backend.order.order_processing', compact('orders_processing'));
    }

    public function ordersReady()
    {
        $ready_orders = Order::where('status', 'Ready to Pack and Ship')->get();
        return view('backend.order.ready_order', compact('ready_orders'));
    }

    public function finishedOrders()
    {
        $finished_orders = Order::where('status', 'Finished')->get();
        return view('backend.order.finished_order', compact('finished_orders'));
    }

    public function backOrders()
    {
        $back_orders = Order::where('status', 'Back')->get();
        return view('backend.order.back_order', compact('back_orders'));
    }

    public function canceledOrders()
    {
        $canceled_orders = Order::where('status', 'Canceled')->get();
        return view('backend.order.canceled_order', compact('canceled_orders'));
    }

    public function holdOrders()
    {
        $hold_orders = Order::where('status', 'Hold')->get();
        return view('backend.order.hold_order', compact('hold_orders'));
    }

    public function refundOrders()
    {
        $refund_orders = Order::where('status', 'Refund')->get();
        return view('backend.order.refund_order', compact('refund_orders'));
    }

    public function wholesaleOrders()
    {
        $wholesale_orders = Order::where('order_type', 'Wholesale')->get();
        return view('backend.order.wholesale_order', compact('wholesale_orders'));
    }

    // Plave Order from Frontend
    public function storeOrder(Request $request)
    {
        $data = $request->all();

        $data['order_number'] = IdGenerator::generate(['table' => 'orders', 'field' =>'order_number', 'length' => 7, 'prefix' =>'BT-100']);

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

        // Set Order Type
        if(!Auth::user()) {
            $data['order_type'] = 'General';
        }
        elseif(Auth::user()->userType == 'Wholesale') {
            $data['order_type'] = 'Wholesale';
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

    // Create Custom Orders from Admin Panel
    public function createNewOrder()
    {
        $productList = Product::where('status', 1)->get();
        return view('backend.order.create_new_order', compact('productList'));
    }

    // Store Custom Order from Admin Panel
    public function storeCustomOrder(Request $request)
    {
        $data = $request->all();

        $data['order_number'] = IdGenerator::generate(['table' => 'orders', 'field' =>'order_number', 'length' => 7, 'prefix' =>'BT-100']);

        // Insert Users 
        if(Auth::user()){
            $data['user_id'] = Auth::user()->id;
            $data['userType'] = 'Registered User';
        }
        else{
            $guest = Guestuser::create($data);
            $data['guest_id'] = $guest->id;
            $data['userType'] = 'Guest';
        }

        // Order Type
        $data['order_type'] = "Custom";

        // Custom Invoice Number
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999).mt_rand(10000, 99999).$characters[rand(0, strlen($characters) - 1)];

        $data['invoice_number'] = '#'.str_shuffle($pin);

        $data['product_id'] = $request->product_id;

        $product_info = Product::where('id', $request->product_id)->first();

        $data['total'] = $product_info->regular_price;
        $data['sub_total'] = $product_info->regular_price;


        $success = Order::create($data);

        if ($success) {
            $notification=array(
            'message' => 'Order Added Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    // View All Orders
    public function viewOrders($id)
    {
      $order = Order::with('user','guest', 'product')->where('id',$id)->whereNotIn('userType', ['wholesale'])->get();

      return view('backend.order.view', compact('order'));
    }

    // Edit All Orders
    public function editOrder($id)
    {
      $order = Order::with('user','guest','product')->where('id',$id)/* ->whereNotIn('userType', ['wholesale']) */->get();

      return view('backend.order.edit', compact('order'));
    }

    // Update All Orders
    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->payment = $request->payment;

        $success = $order->save();
            if ($success) {
                $notification=array(
                'message' => 'Order Updated Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else
            {
                $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }

    }

    // Delete Order
    public function deleteOrder($id)
    {
        $order = Order::find($id);

        $dlt = $order->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Order Deleted Successfully',
                     'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
            else
                {
                    $notification=array(
                    'message' => 'Something Went wrong!',
                    'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
    }

    public function PaidUnpaidOrder(Request $request, $id)
    {
        // return $id;
        $order = Order::find($id);

        if($order->payment == "Pending"){
            $order->payment = "Paid";
        }

        else{
            $order->payment = "Pending";
        }

        $success = $order->save();
            if ($success) {
                $notification=array(
                'message' => 'Payment Status Updated Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else
            {
                $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
    }
}
