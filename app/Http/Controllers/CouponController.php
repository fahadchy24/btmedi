<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
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

        if (is_null($request->status)) {
            $status = "0";
        }
        else {
            $status = "1";
        }
        $data['status'] = $request->status;

        $success = Coupon::create($data);

        if ($success) {
            $notification = array(
                'message' => 'Coupon has been added',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $couponEdit = Coupon::find($coupon->id);

        return view('backend.coupon.edit', compact('couponEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {

        $couponUpdate = Coupon::find($coupon->id);

        // dd($request->all());
        
        $couponUpdate->coupon_code = $request->coupon_code;
        $couponUpdate->coupon_type = $request->coupon_type;
        $couponUpdate->coupon_amount = $request->coupon_amount;
        $couponUpdate->expiry_date = $request->expiry_date;
        
        if (is_null($couponUpdate->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $couponUpdate->status = $request->status;

        // dd($status);
        // dd($couponUpdate->status);

        $success = $couponUpdate->save();
            if ($success) {
                    $notification=array(
                     'message' => 'Coupon has been Updated',
                     'alert-type' => 'success'
                    );
                return redirect()->route('coupons.index')->with($notification);
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
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
