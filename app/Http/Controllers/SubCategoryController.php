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
                'thumbnail_image' => 'image|mimes:jpeg,jpg,png,gif',
                'cover_image' => 'image|mimes:jpeg,jpg,png,gif',
                // 'status' => 'required',
            ];
            $customMessages = [
                'subcategory_name.unique' => 'This Category Name has been used already.',
                'subcategory_name.string' => 'This Category Name must have a word.',
                'subcategory_url.unique' => 'This Category URL has been used already.',
                'subcategory_url.string' => 'This Category URL must have a word.',
                'thumbnail_image.image' => 'Upload a valid Image',
                'thumbnail_image.mimes' => 'Upload a valid Image',
                'cover_image.image' => 'Upload a valid Image',
                'cover_image.mimes' => 'Upload a valid Image',
                // 'status.required' => 'Status is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $subcategory = new SubCategory;
            $subcategory->subcategory_name = strtoupper($request->subcategory_name);
            $subcategory->subcategory_url = Str::slug($request->subcategory_url);
            $subcategory->category_id = $request->category_id;

           $subcategory->status = 1;

            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');
                if ($thumbnail_image->isValid()){
                    $thumb_image = time().$thumbnail_image->getClientOriginalName();
                    $thumb_path = 'uploads/frontend/image/subcategory/thumbnail/'. $thumb_image;
                    Image::make($thumbnail_image)->resize(210, 270)->save($thumb_path);
                    $subcategory->thumbnail_image = url($thumb_path);
                }
            }

            if ($request->hasFile('cover_image')) {
                $cover_image = $request->file('cover_image');
                if ($cover_image->isValid()){
                    $image = time().$cover_image->getClientOriginalName();
                    $path = 'uploads/frontend/image/subcategory/cover/'. $image;
                    Image::make($cover_image)->resize(870, 220)->save($path);
                    $subcategory->cover_image = url($path);
                }
            }

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
    public function edit($id)
    {
        $editSubCategory = SubCategory::find($id);
        $categories = Category::all();

        return view('backend.categories.subcategory.edit', compact('editSubCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategoryUpdate = SubCategory::find($id);
        $subcategoryUpdate->subcategory_name = $request->subcategory_name;
        $subcategoryUpdate->subcategory_url = $request->subcategory_url;
        $subcategoryUpdate->category_id = $request->category_id;

        if (is_null($subcategoryUpdate->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $subcategoryUpdate->status = $request->status;

        if ($request->hasFile('thumbnail_image')) {

            if (File::exists('uploads/frontend/image/subcategory/thumbnail/'.$subcategoryUpdate->thumbnail_image)) {
                File::delete('uploads/frontend/image/subcategory/thumbnail/'.$subcategoryUpdate->thumbnail_image);
            }
            
            $thumbnail_image = $request->file('thumbnail_image');
            $imageName = time().$thumbnail_image->getClientOriginalName();
            $imagePath = 'uploads/frontend/image/subcategory/thumbnail/'. $imageName;
            Image::make($thumbnail_image)->resize(210, 270)->save($imagePath);
            $subcategoryUpdate->thumbnail_image = url($imagePath);
        }

        if ($request->hasFile('cover_image')) {

            if (File::exists('uploads/frontend/image/subcategory/cover/'.$subcategoryUpdate->cover_image)) {
                File::delete('uploads/frontend/image/subcategory/cover/'.$subcategoryUpdate->cover_image);
            }

            $cover_image = $request->file('cover_image');
            $image = time().$cover_image->getClientOriginalName();
            $path = 'uploads/frontend/image/subcategory/cover/'. $image;
            Image::make($cover_image)->resize(870, 220)->save($path);
            $subcategoryUpdate->cover_image = url($path);
        }

        $success = $subcategoryUpdate->save();
        if ($success) {
            $notification=array(
            'message' => 'Product SubCategory Updated Successfully ',
            'alert-type' => 'success'
            );
        return redirect()->route('sub.category')->with($notification);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoryDelete = SubCategory::find($id);
        if (!is_null($subcategoryDelete)) {
            if (File::exists('uploads/frontend/image/subcategory/thumbnail/'.$subcategoryDelete->thumbnail_image)) {
                File::delete('uploads/frontend/image/subcategory/thumbnail/'.$subcategoryDelete->thumbnail_image);
            }
            if (File::exists('uploads/frontend/image/subcategory/cover/'.$subcategoryDelete->cover_image)) {
                File::delete('uploads/frontend/image/subcategory/cover/'.$subcategoryDelete->cover_image);
            }

        $dlt = $subcategoryDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Product Category Deleted.',
                     'alert-type' => 'danger'
                    );
                    return redirect()->route('sub.category')->with($notification);
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

    public function checkSlug(Request $request)
    {
        $subcategory_url = Str::slug($request->subcategory_name);

        return response()->json(['subcategory_url' => $subcategory_url]);
    }
}
