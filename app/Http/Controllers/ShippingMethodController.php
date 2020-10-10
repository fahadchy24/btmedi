<?php

namespace App\Http\Controllers;

use App\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = ShippingMethod::all();
        return view('backend.order.shipping.index', compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'unique:shipping_methods|string',
            'price' => 'unique:shipping_methods|numeric',
        ];
        $customMessages = [
            'title.unique' => 'This Title has been used already.',
            'title.string' => 'Title must have a word.',
            'price.unique' => 'This Shipping Price has been used already.',
            'price.numeric' => 'Price must have numbers.',
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();

        $success = ShippingMethod::create($data);

        if ($success) {
            $notification=array(
                'message' => 'Shipping Method Added Successfully ',
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

    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingMethod $shippingMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingMethod $shippingMethod)
    {
        $editShipping = ShippingMethod::findOrFail($shippingMethod->id);


        return view('backend.order.shipping.edit', compact('editShipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        $success = ShippingMethod::findOrFail($shippingMethod->id)->update($request->all());

        if ($success) {
            $notification=array(
                'message' => 'Shipping Method Updated Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('shipping-methods.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltShipping = ShippingMethod::findOrFail($id)->delete();

        if ($dltShipping) {
            $notification=array(
            'message' => 'Shipping Method Deleted Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->route('shipping-methods.index')->with($notification);
        }
    }
}
