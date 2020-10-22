<?php

namespace App\Http\Controllers;

use App\AdBanner;
use App\GeneralSetting;
use App\Slider;
use App\Category;
use App\Comment;
use App\Menu;
use App\ProductCategory;
use App\Product;
use App\ProductAttributes;
use App\ShippingMethod;
use App\Subscriber;
use App\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Homepage Functions
    public function index() {

        $products = Product::where('status', 1)->get();
        $productCategory = Category::orderBy('priority', 'asc')->where('status', 1)->paginate(4);
        $productSubCategory = SubCategory::orderBy('id', 'asc')->where('status', 1)->paginate(1);
        $sliders = Slider::orderBy('priority','asc')->where('status',1)->get();
        $dealProduct = Product::orderBy('created_at', 'asc')->where('status',1)->paginate(1);
        $ad_banner = AdBanner::find(1);
        $popup_banner = GeneralSetting::find(1);

        $bestsalers = Product::orderBy('created_at', 'DESC')->inRandomOrder()->get();

        $latestproducts = Product::orderBy('created_at', 'DESC')->get();

        $featuredproducts = Product::orderBy('created_at', 'DESC')->where('is_featured',1)->get();
        
        return view('frontend.index', compact('products','productCategory', 'sliders', 'dealProduct', 'ad_banner', 'popup_banner',
        'latestproducts', 'featuredproducts', 'bestsalers', 'productSubCategory'));
    }
    
    public function test() {
        return url('uploads/frontend/image/category/thumbnail/15999994304.jpg');
        return Menu::with('subcategory')->get();
    }


    public function productDetailsByID($id)
    {
        $productdetail = Product::with('allImages', 'attributes')->where('id',$id)->first();
        $relatedProducts = Product::where('id', '!=', $id)->/* where(['category_id'=>$productdetail->category_id])-> */get();

        $latestproducts = Product::orderBy('created_at', 'DESC')->get();

        $productComments = Comment::where('product_id', $id)->where('status', 1)->get();


        return view('frontend.pages.product_details', compact('productdetail', 'relatedProducts', 'latestproducts', 'productComments'));
    }

    // Quickview of Products
    public function productQuickview($id)
    {
        $productdetail = Product::where('id',$id)->first();
        return view('frontend.pages.quickview', compact('productdetail'));
    }


    public function category($id)
    {
        $category = Category::where('id', $id)->first();

        $allCategory = Category::all();

        $latestproducts = Product::orderBy('created_at', 'DESC')->paginate(5);
        
        if($category){
            $products = ProductCategory::where('category_id', $id)->with('products')->get(); 
            return view('frontend.pages.product_category_page', compact(['category', 'products', 'allCategory', 'latestproducts']));
        }else{
            return redirect()->route('home');
        }
    }

    public function subcategory($id)
    {
        $subcategory = SubCategory::with('category')->where('id', $id)->first(); 
        
        if($subcategory){
            $products = ProductCategory::where('category_id', $id)->with('products')->get(); 
            return view('frontend.pages.product_subcategory_page', compact(['subcategory', 'products']));
        }else{
            return redirect()->route('home');
        }
    }

    // Display All Products
    public function getAllProducts()
    {
        $products = ProductCategory::/* where('category_id', $id)-> */with('products')->get();

        return view('frontend.pages.allproduct', compact('products'));
    }
    
    // Display All Featured Products
    public function getAllFeaturedProducts()
    {
        $products = Product::/* where('category_id', $id)-> */where('is_featured', 1)->get();

        return view('frontend.pages.featuredproduct', compact('products'));
    }

    // Get Subscriber Email from Frontend
    public function subscribe(Request $request)
	{

        $rules = [
            'email'=>'unique:subscribers',
        ];
        $customMessages = [
            'email.unique' => 'This email has been subscribed already.',
        ];
        $this->validate($request,$rules,$customMessages);


        $subscribe = new Subscriber();
        $subscribe->fill($request->all());
        $success = $subscribe->save();
        if ($success) {
            $notification=array(
             'message' => 'You are subscribed Successfully.',
             'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    // Shipping Methods Implements
    // public function FrontshippingMethod()
    // {
    //     $frontshippingMethod = ShippingMethod::all();

    //     return view('frontend.pages.checkout', compact('frontshippingMethod'));
    // }

}
