<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Str;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $subcategory = SubCategory::with('category')->get();
        $categories = Category::all();

        if ($request->isMethod('post')){
            
            $rules = [
                'subcategory_name' => 'unique:sub_categories|string',
                'subcategory_url' => 'unique:sub_categories|string',
                'cover_image' => 'image|mimes:jpeg,jpg,png,gif',
                'status' => 'required',
            ];
            $customMessages = [
                'subcategory_name.unique' => 'This Category Name has been used already.',
                'subcategory_name.string' => 'This Category Name must have a word.',
                'subcategory_url.unique' => 'This Category URL has been used already.',
                'subcategory_url.string' => 'This Category URL must have a word.',
                'cover_image.image' => 'Upload a valid Image',
                'cover_image.mimes' => 'Upload a valid Image',
                'status.required' => 'Status is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $subcategory = new SubCategory;
            $subcategory->subcategory_name = strtoupper($request->subcategory_name);
            $subcategory->subcategory_url = Str::slug($request->subcategory_url);
            $subcategory->category_id = $request->category_id;

            if (is_null($subcategory->status)) {
                $status = 0;
           }
           else {
                $status = 1;
           }
           $subcategory->status = $request->status;

            if ($request->hasFile('cover_image')) {
                $cover_image = $request->file('cover_image');
                if ($cover_image->isValid()){
                    $image = time().$cover_image->getClientOriginalName();
                    $path = 'uploads/frontend/image/subcategory/cover/'. $image;
                    Image::make($cover_image)->resize(1350, 500)->save($path);
                }
            }
            $subcategory->cover_image = $image;

            $success = $subcategory->save();
            if ($success) {
                $notification=array(
                'message' => 'SubCategory Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }

        return view('backend.categories.subcategory.index', compact('subcategory', 'categories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
