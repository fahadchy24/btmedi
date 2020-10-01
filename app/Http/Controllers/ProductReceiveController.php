<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductReceive;
use App\Vendor;
use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportInventory;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class ProductReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productReceive = ProductReceive::with('product', 'vendor')->get();

        return view('backend.inventory.product_receiving_input.index', compact('productReceive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        
        return view('backend.inventory.product_receiving_input.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $success = ProductReceive::create($data);

        if ($success) {
            $notification=array(
            'message' => 'Product Received Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReceive  $productReceive
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReceive $productReceive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReceive  $productReceive
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReceive $productReceive)
    {
        $productReceiveEdit = ProductReceive::with('product', 'vendor')->findOrFail($productReceive->id);
        $vendors = Vendor::all();

        return view('backend.inventory.product_receiving_input.edit', compact('productReceiveEdit', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReceive  $productReceive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReceive $productReceive)
    {
        $success = ProductReceive::find($productReceive->id)->update($request->all());

        if ($success) {
            $notification=array(
                'message' => 'Product Receive Updated Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('product-receive.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReceive  $productReceive
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReceive $productReceive)
    {
        $dltproductReceive = ProductReceive::findOrFail($productReceive->id)->delete();

        if ($dltproductReceive) {
            $notification=array(
            'message' => 'Product Receive Deleted Successfully ',
            'alert-type' => 'error'
            );
            return redirect()->route('product-receive.index')->with($notification);
        }
    }

    // Inventory Receive by Excel sheet
    public function import(Request $request) 
    {
        $file = $request->file('file');
        Excel::import(new ImportInventory, $file);
        $notification=array(
            'message' => 'Product Receive Import Successfully ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }

    // Auto Complete Product Name
    public function getAutocompleteData(Request $request){
        if($request->has('term')){
            return Product::where('product_name','like','%'.$request->input('term').'%')->get();
        }
    }

}
