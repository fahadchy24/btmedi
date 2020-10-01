<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.inventory.vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.inventory.vendor.create');
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
            'vendor_id' => 'unique:vendors|string',
            'name' => 'unique:vendors|required|string',
            'email' => 'unique:vendors|email',
            'phone' => 'unique:vendors|string',
            'address' => 'unique:vendors|string',
        ];
        $customMessages = [
            'name.unique' => 'This Name has been used already.',
            'name.required' => 'Name is required.',
            'name.string' => 'Name must have a word.',
            'email.unique' => 'This Email has been used already.',
            'email.string' => 'Provide a valid email address',
            'phone.unique' => 'This Phone Number has been used already.',
            'phone.string' => 'This Phone Number is not valid.',
            'address.unique' => 'This Address has been used already.',
            'address.string' => 'This Address must be valid.',
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();

        $config = [
            'table' => 'vendors',
            'field' => 'vendor_id',
            'length' => 7,
            'prefix' => 'VN-'
        ];

        $data['vendor_id'] = IdGenerator::generate($config);
        

        $success = Vendor::create($data);

        if ($success) {
            $notification=array(
                'message' => 'Vendor Added Successfully ',
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
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $editVendor = Vendor::findOrFail($vendor->id);

        return view('backend.inventory.vendor.edit', compact('editVendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $success = Vendor::find($vendor->id)->update($request->all());

        if ($success) {
            $notification=array(
                'message' => 'Vendor Updated Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('vendor.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltVendor = Vendor::findOrFail($id)->delete();

        if ($dltVendor) {
            $notification=array(
            'message' => 'Vendor Deleted Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->route('vendor.index')->with($notification);
        }
    }
}
