<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;
use DB;

class CategoryController extends Controller
{
    
    public function index(Request $request) {

        $category = Category::with('subcategories')->get();  
        
        // $category = $request->all();

        // $category = json_decode(json_encode($category));
        // echo "<pre>";
        // print_r($category);
        // die;

        if ($request->isMethod('post')){
            \Log::info('$success 1');
            $rules = [
                'category_name' => 'unique:categories|string',
                'category_url' => 'unique:categories|string',
                'thumbnail_image' => 'image|mimes:jpeg,jpg,png,gif',
                'cover_image' => 'image|mimes:jpeg,jpg,png,gif',
                'priority' => 'unique:categories|integer',
                'status' => 'required',
            ];
            \Log::info('$success 2');
            $customMessages = [
                'category_name.unique' => 'This Category Name has been used already.',
                'category_name.string' => 'This Category Name must have a word.',
                'category_url.unique' => 'This Category URL has been used already.',
                'category_url.string' => 'This Category URL must have a word.',
                'thumbnail_image.image' => 'Upload a valid Image',
                'cover_image.image' => 'Upload a valid Image',
                'thumbnail_image.mimes' => 'Upload a valid Image',
                'cover_image.mimes' => 'Upload a valid Image',
                'priority.unique' => 'Pririty has been set already, try a different one.',
                'priority.integer' => 'Pririty must be a number',
                'status.required' => 'Status is required',
            ];
            \Log::info('$success 3');
            $this->validate($request, $rules, $customMessages);
            \Log::info('$success 4');
            $category = new Category;
            $category->category_name = strtoupper($request->category_name);
            $category->category_url = Str::slug($request->category_url);
            $category->priority = $request->priority;
            \Log::info('$success 5');
            if (is_null($category->status)) {
                $status = 0;
           }
           else {
                $status = 1;
           }
           $category->status = $request->status;
           \Log::info('$success 6');
            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');
                if ($thumbnail_image->isValid()){
                    // $extension = $thumbnail_image->getClientOriginalExtension();
                    $imageName = time().$thumbnail_image->getClientOriginalName();
                    $imagePath = 'uploads/frontend/image/category/thumbnail/'. $imageName;
                    Image::make($thumbnail_image)->resize(210, 270)->save($imagePath);
                    $category->thumbnail_image = url($imagePath);
                }
            }
            \Log::info('$success 7');
            if ($request->hasFile('cover_image')) {
                $cover_image = $request->file('cover_image');
                if ($cover_image->isValid()){
                    // $extension = $thumbnail_image->getClientOriginalExtension();
                    $image = time().$cover_image->getClientOriginalName();
                    $path = 'uploads/frontend/image/category/cover/'. $image;
                    Image::make($cover_image)->resize(1350, 500)->save($path);
                    $category->cover_image = url($path);
                }
            }
            \Log::info('$success 8');
            
            \Log::info('$success 9');
            $success = $category->save();
            \Log::info('$success 10');
            \Log::info('$success');
            \Log::info($success);
            if ($success) {
                $notification=array(
                'message' => 'Product Category Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }

        return view('backend.categories.category.index', compact('category'));
    }

    public function edit($id) {

        $editCategory = Category::find($id);

        return view('backend.categories.category.edit', compact('editCategory'));
    }


    public function update(Request $request, $id) {

        $categoryUpdate = Category::find($id);
        $categoryUpdate->category_name = $request->category_name;
        $categoryUpdate->category_url = $request->category_url;
        $categoryUpdate->priority = $request->priority;

        if (is_null($categoryUpdate->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $categoryUpdate->status = $request->status;

        if ($request->hasFile('thumbnail_image')) {

            if (File::exists('uploads/frontend/image/category/thumbnail/'.$categoryUpdate->thumbnail_image)) {
                File::delete('uploads/frontend/image/category/thumbnail/'.$categoryUpdate->thumbnail_image);
            }
            
            $thumbnail_image = $request->file('thumbnail_image');
            $imageName = time().$thumbnail_image->getClientOriginalName();
            $imagePath = 'uploads/frontend/image/category/thumbnail/'. $imageName;
            Image::make($thumbnail_image)->resize(210, 270)->save($imagePath);
            $categoryUpdate->thumbnail_image = url($imagePath);
        }

        if ($request->hasFile('cover_image')) {

            if (File::exists('uploads/frontend/image/category/cover/'.$categoryUpdate->cover_image)) {
                File::delete('uploads/frontend/image/category/cover/'.$categoryUpdate->cover_image);
            }

            $cover_image = $request->file('cover_image');
            $image = time().$cover_image->getClientOriginalName();
            $path = 'uploads/frontend/image/category/cover/'. $image;
            Image::make($cover_image)->resize(870, 220)->save($path);
            $categoryUpdate->cover_image = url($path);
        }

        $success = $categoryUpdate->save();
        if ($success) {
            $notification=array(
            'message' => 'Product Category Updated Successfully ',
            'alert-type' => 'success'
            );
        return redirect()->route('all-category')->with($notification);
        }

    }

    public function destroy($id)
    {
        $productId = DB::table('product_categories')->where('category_id', $id)->pluck('product_id');

        Product::whereIn('id', $productId)->delete();

        $categoryDelete = Category::find($id);
        if (!is_null($categoryDelete)) {
            if (File::exists('uploads/frontend/image/category/thumbnail/'.$categoryDelete->thumbnail_image)) {
                File::delete('uploads/frontend/image/category/thumbnail/'.$categoryDelete->thumbnail_image);
            }
            if (File::exists('uploads/frontend/image/category/cover/'.$categoryDelete->cover_image)) {
                File::delete('uploads/frontend/image/category/cover/'.$categoryDelete->cover_image);
            }

        $dlt = $categoryDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Product Category Deleted Successfully',
                     'alert-type' => 'success'
                    );
                    return redirect()->route('all-category')->with($notification);
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
        $category_url = Str::slug($request->category_name);

        return response()->json(['category_url' => $category_url]);
    }
}
