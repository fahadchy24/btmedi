<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;
use Form;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute = Attribute::all();

        return view('backend.product.attributes.index' , compact('attribute'));
    }

    public function create()
    {
        return view('backend.product.attributes.add');
    }


    public function colorStore(Request $request)
    {
        $attribute = Attribute::create($request->all());

            if ($attribute) {
                $notification=array(
                'message' => 'Attribute Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
    }

    public function colorDestroy($id)
    {
        $attributeDelete = Attribute::find($id);

        $dlt = $attributeDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Attribute Deleted Successfully',
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
    public function sizeStore(Request $request)
    {
        $attribute = Attribute::create($request->all());

            if ($attribute) {
                $notification=array(
                'message' => 'Attribute Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
    }

    public function sizeDestroy($id)
    {
        $attributeDelete = Attribute::find($id);

        $dlt = $attributeDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Attribute Deleted Successfully',
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
    public function otherStore(Request $request)
    {
        $attribute = Attribute::create($request->all());

            if ($attribute) {
                $notification=array(
                'message' => 'Attribute Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
    }

    public function otherDestroy($id)
    {
        $attributeDelete = Attribute::find($id);

        $dlt = $attributeDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Attribute Deleted Successfully',
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
