<?php

namespace App\Http\Controllers;

use App\Guestuser;
use App\Order;
use App\RMA;
use App\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RMAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rma = RMA::with('order')->get();

        // dd($rma);
        return view('backend.rma.index', compact('rma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->session()->has('users') == NULL){
            $data['issued_by'] = 007;
            $data['email'] = "admin@gmail.com";
        }
        else{
            $data['issued_by'] = Auth::user()->id;
            $data['email'] = Auth::user()->email;
        }

        $data['rma_number'] = IdGenerator::generate(['table' => 'r_m_a_s', 'field' =>'rma_number', 'length' => 10, 'prefix' =>'RMA-']);
        //output: INV-000001


        $order_info = Order::where('order_number', $request->order_number)->first();
            if ($request->order_number = $order_info) {
                $data['order_number'] = $order_info->order_number;
                $ins = RMA::create($data);
                if ($ins) {
                    $notification=array(
                     'message' => 'RMA has been placed',
                     'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }  
            }
            else{
                $notification=array(
                    'message' => 'Sorry, no order found.',
                    'alert-type' => 'error'
                   );
                   return redirect()->back()->with($notification);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RMA  $rMA
     * @return \Illuminate\Http\Response
     */
    public function show(RMA $rMA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RMA  $rMA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rma_edit = RMA::with('order')->findOrFail($id);

        // $order = Order::with('user', 'guest')->get();
        // // foreach($order->guest as $row){
        // //     $user_email = $row->email;
        // // }

        // $user_email = $order->guest->email;

        // dd($user_email);
        // // dd($user_email);

        return view('backend.rma.edit', compact('rma_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RMA  $rMA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rma = RMA::find($id);
        $rma->remark = $request->remark;
        $rma->restocking_fee = $request->restocking_fee;
        $rma->status = $request->status;

        $success = $rma->save();
            if ($success) {
                    $notification=array(
                     'message' => 'RMA has been Updated',
                     'alert-type' => 'success'
                    );
                return redirect()->route('rma.index')->with($notification);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RMA  $rMA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rma = RMA::find($id);

        $success = $rma->delete();

        if ($success) {
            $notification=array(
             'message' => 'RMA Deleted Successfully',
             'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function waiting()
    {
        $rma = RMA::where('status', 'Waiting for approval')->get();
        return view('backend.rma.waiting_rma', compact('rma'));
    }
    public function completed()
    {
        $rma = RMA::where('status', 'Completed')->get();
        return view('backend.rma.completed_rma', compact('rma'));
    }

    public function canceled()
    {
        $rma = RMA::where('status', 'Canceled')->get();
        return view('backend.rma.canceled_rma', compact('rma'));
    }

    public function completeRMA($id)
    {
        // return $id;
        $rma = RMA::findOrFail($id);

        if($rma->status == NULL){
            $rma->status = "Completed";
        }

        $success = $rma->save();
            if ($success) {
                $notification=array(
                'message' => 'RMA Status Updated Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
    }
}
