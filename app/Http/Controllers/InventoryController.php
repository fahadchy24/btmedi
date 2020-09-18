<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.inventory.index', compact('products'));
    }
}
