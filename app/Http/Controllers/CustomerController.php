<?php

namespace App\Http\Controllers;

use App\Customer;
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
        $rules = [
            'phone' => 'regex:/[(+1)][0-9]/|not_regex:/[a-z]/|min:11',
            'fax' => 'nullable|regex:/[(+1)][0-9]/|not_regex:/[a-z]/|min:11',
            'postcode' => 'integer',
            'reseller_permit_number' => 'nullable|integer',
            'taxable' => 'required',
        ];
        $customMessages = [
            // +1 (476) 182-1612
            'phone.regex' => 'Provide a valid phone number.',
            'phone.min' => 'Phone number must have at least 11 digits.',
            'fax.regex' => 'Provide a valid fax number.',
            'fax.min' => 'Fax number must have at least 11 digits.',
            'postcode.integer' => 'Provide a valid Zip Code.',
            'reseller_permit_number.integer' => 'Provide a valid permit number.',
            'taxable.required' => 'Taxable is required.',

        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();

        $data['password'] = bcrypt('123456');

        $success = User::create($data);

        if ($success) {
            $notification=array(
            'message' => 'Customer Added Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editCustomer = User::findOrFail($id);

        return view('backend.customer.edit', compact('editCustomer'));
    }

    public function update(Request $request, $id)
    {
        $success = User::findOrFail($id)->update($request->all());

        if ($success) {
            $notification=array(
                'message' => 'Customer Updated Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $customers = User::findOrFail($id);

        $dlt = $customers->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Customer Deleted Successfully',
                     'alert-type' => 'error'
                    );
                    return redirect()->route('customer.index')->with($notification);
                }
    }
    
}
