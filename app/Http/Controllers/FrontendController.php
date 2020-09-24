<?php

namespace App\Http\Controllers;

use App\AdBanner;
use App\GeneralSetting;
use App\Slider;
use App\Category;
use App\Menu;
use App\ProductCategory;
use App\Product;
use App\Subscriber;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Homepage Functions
    public function index() {

        $productCategory = Category::orderBy('priority', 'asc')->where('status', 1)->paginate(5);
        $sliders = Slider::orderBy('priority','asc')->where('status',1)->get();
        $dealProduct = Product::where('status',1)->paginate(1);
        $ad_banner = AdBanner::find(1);
        $popup_banner = GeneralSetting::find(1);

        $bestsalers = Product::orderBy('created_at', 'DESC')->inRandomOrder()->get();

        $latestproducts = Product::orderBy('created_at', 'DESC')->get();

        $featuredproducts = Product::orderBy('created_at', 'DESC')->where('is_featured',1)->get();
        
        return view('frontend.index', compact('productCategory', 'sliders', 'dealProduct', 'ad_banner', 'popup_banner',
        'latestproducts', 'featuredproducts', 'bestsalers'));
    }
    public function test() {

        return Menu::with('subcategory')->get();
    }


    public function productDetailsByID($id)
    {
        $productdetail = Product::where('id',$id)->first();
        return view('frontend.pages.product_details', compact('productdetail'));
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
        
        if($category){
            $products = ProductCategory::where('category_id', $id)->with('products')->get(); 
            return view('frontend.pages.product_category_page', compact(['category', 'products']));
        }else{
            return redirect()->route('home');
        }
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
}
