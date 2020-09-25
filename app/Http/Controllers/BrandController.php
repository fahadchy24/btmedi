<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brands = Brand::all();

        return view('backend.product.brand.index', compact('all_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.brand.add');
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
            'title' => 'unique:brands|string',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ];
        $customMessages = [
            'title.unique' => 'This Category Name has been used already.',
            'title.string' => 'This Category Name must have a word.',
            'image.image' => 'Upload a valid Image',
            'image.mimes' => 'Upload a valid Image',
        ];
        $this->validate($request, $rules, $customMessages);

        $brand = new Brand;
        $brand->title = strtoupper($request->title);

        if (is_null($brand->status)) {
                $status = 0;
        }
        else {
                $status = 1;
        }
        $brand->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()){
                $imageName = time().$image->getClientOriginalName();
                $imagePath = 'uploads/frontend/image/brand/'. $imageName;
                Image::make($image)->resize(210, 270)->save($imagePath);
                
                $brand->image = $imageName;
            }
        }

        $success = $brand->save();
        if ($success) {
            $notification = array(
                'message' => 'Brand Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editBrand = Brand::find($id);

        return view('backend.product.brand.edit', compact('editBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brandUpdate = Brand::find($id);
        $brandUpdate->title = $request->title;

        if (is_null($brandUpdate->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $brandUpdate->status = $request->status;

        if ($request->hasFile('image')) {

            if (File::exists('uploads/frontend/image/brand/'.$brandUpdate->image)) {
                File::delete('uploads/frontend/image/brand/'.$brandUpdate->image);
            }
            
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $imagePath = 'uploads/frontend/image/brand/'. $imageName;
            Image::make($image)->resize(210, 270)->save($imagePath);
            $brandUpdate->image = $imageName;
        }

        $success = $brandUpdate->save();
        if ($success) {
            $notification=array(
            'message' => 'Brand Updated Successfully ',
            'alert-type' => 'success'
            );
        return redirect()->route('brand.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandDelete = Brand::find($id);
        if (!is_null($brandDelete)) {
            if (File::exists('uploads/frontend/image/brand/'.$brandDelete->image)) {
                File::delete('uploads/frontend/image/brand/'.$brandDelete->image);
            }

        $dlt = $brandDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Brand Deleted Successfully',
                     'alert-type' => 'success'
                    );
                    return redirect()->route('brand.index')->with($notification);
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

    // Activa Status Functions
    public function status($id, $status)
    {
        $brand = Brand::find($id);
        $brand->status = $status;

        $brand->save();

        return response()->json();

    }
}
