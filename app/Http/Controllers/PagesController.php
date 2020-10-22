<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\OtherPage;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function OtherPage($url)
    {
        $otherPageDetails = OtherPage::where('page_url',$url)->first();
        $meta_title = $otherPageDetails->meta_title;
        $meta_description = $otherPageDetails->meta_description;
        return view('frontend.pages.other_page', compact('otherPageDetails', 'meta_title', 'meta_description'));
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }
}
