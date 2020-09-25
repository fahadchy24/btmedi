<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Brand;
use App\Category;
use App\Menu;
use App\Product;
use App\ProductAttributes;
use App\ProductImages;
use App\SubCategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Imports\ImportProduct;

class ProductController extends Controller
{
    public function index()
    {
        $data = array(
            'products' =>  Product::with('categories')->get()
        );
        return view('backend.product.index', $data);
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::with('subcategories')->get();
        $brands = Brand::where('status', 1)->get();
        $attributes = Attribute::all();

        // $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;

        $subcategories = SubCategory::with('category')->first();
        return view('backend.product.add', compact('products', 'categories', 'subcategories', 'attributes', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);
        
        $data['status'] = 0;

        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            if ($main_image->isValid()){
                $imageName = time().$main_image->getClientOriginalName();
                $imagePath = 'uploads/frontend/image/product/'. $imageName;
                Image::make($main_image)->resize(451, 451)->save($imagePath);
            }
        }
        $data['main_image'] = $imageName;

        if ($request->hasFile('docs')) {
            $docs = $request->file('docs');
            $docsName = time().'.'.$docs->getClientOriginalExtension();
            // $docsPath = 'uploads/frontend/image/product/docs/'.$docsName;
            $docs->move('uploads/frontend/image/product/docs/').$docsName;

            $data['docs'] = $docsName;
        }

        // Custom SKU
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999).mt_rand(10000, 99999).$characters[rand(0, strlen($characters) - 1)];

        $data['sku'] = '#'.str_shuffle($pin);

        // dd($request->all());

        $product =  Product::create($data);

        //Adding Multiple Categories
        $product->categories()->attach($request->category_id);

        // Alternative Images
        if ($request->hasFile('product_images')) {
            $product_image = $request->file('product_images');
            foreach ($product_image as $images) {
                $altImage = new ProductImages;
                Image::make($images);
                $name = time().$images->getClientOriginalName();
                $path = 'uploads/frontend/image/product/alternative/'.$name;
                Image::make($images)->resize(451, 451)->save($path);

                $altImage->product_id = $product->id;
                $altImage->product_image = $name;
                $altImage->save();

            }
        }
        if ($product) {
            $notification=array(
            'message' => 'Product Added Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('categories','brand', 'allImages')->where('id',$id)->first();

        $menus = Menu::all();

        // $categories = Category::all();
        $categories = DB::table('product_categories')->where('product_id', $id)->get();

        // echo "<pre>"; print_r($categories); die;

        $subcategories = SubCategory::all();

        return view('backend.product.view', compact('product','categories','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $dltproduct = Product::find($id);
        if (!is_null($product)) {
            if (File::exists('uploads/frontend/image/product/'.$dltproduct->main_image)) {
                File::delete('uploads/frontend/image/product/'.$dltproduct->main_image);
            }
            if (File::exists('uploads/frontend/image/product/alternative/'.$dltproduct->product_images)) {
                File::delete('uploads/frontend/image/product/alternative/'.$dltproduct->product_images);
            }
        $dlt = $dltproduct->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Product Deleted Successfully',
                     'alert-type' => 'success'
                    );
                    return redirect()->route('product.index')->with($notification);
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
        $product = Product::find($id);
        $product->status = $status;

        $product->save();

        return response()->json();

    }


    // Adding Attributes
    public function addAttributes(Request $request, $id)
    {
        $productDetails = Product::select('id', 'product_name', 'main_image')->with('attributes')->findOrFail($id);

        // echo "<pre>"; print_r($productDetails); die;

        if ($request->isMethod('post')) {
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;

            foreach ($data['label'] as $key => $value) {
                if (!empty($value)) {

                    // Label of product already taken
                    $attrCountLabel = ProductAttributes::where(['label'=>$value])->count();
                    if($attrCountLabel>0) {
                        $notification=array(
                            'message' => 'This Label Already Exists',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    // Price of product already taken
                    $attrCountPrice = ProductAttributes::where(['product_id'=>$id, 'price'=>$data['price'][$key]])->count();
                    if($attrCountPrice>0) {
                        $notification=array(
                            'message' => 'This Price Already Exists',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    // Color of product already taken
                    $attrCountColor = ProductAttributes::where(['product_id'=>$id, 'color'=>$data['color'][$key]])->count();
                    if($attrCountColor>0) {
                        $notification=array(
                            'message' => 'This Color Already Exists',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    // Stock of product already taken
                    $attrCountStock = ProductAttributes::where(['product_id'=>$id, 'stock'=>$data['stock'][$key]])->count();
                    if($attrCountStock>0) {
                        $notification=array(
                            'message' => 'This Stock Already Exists',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }

                    $productAttribute = new ProductAttributes;
                    $productAttribute->product_id = $id;
                    $productAttribute->label = $value;
                    $productAttribute->color = $data['color'][$key];
                    $productAttribute->stock = $data['stock'][$key];
                    $productAttribute->price = $data['price'][$key];

                    $success = $productAttribute->save();
                    if ($success) {
                        $notification=array(
                        'message' => 'Product Attribute Added Successfully ',
                        'alert-type' => 'success'
                        );
                    }
                }
            }
            return redirect()->back()->with($notification);
        }

        return view('backend.product.add_attribute', compact('productDetails'));
    }

    public function DeleteAddedAttribute($id)
    {
        $deleteAddedAttribute = ProductAttributes::findOrFail($id);

        $dlt = $deleteAddedAttribute->delete();
        if ($dlt) {
            $notification=array(
            'message' => 'Product Attribute Deleted Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    // Product Import By Excel Sheet ==========
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ImportProduct, $file);
        $notification=array(
            'message' => 'Product Import Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
