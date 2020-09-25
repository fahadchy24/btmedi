@extends('layouts.admin_app')

@section('title', 'View Product')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('product.index')}}">All Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
{{-- <div class="container-fluid mt--6"> --}}
    <!-- Start Page Content -->
    {{-- <div class="row"> --}}
        <!-- Add Slider -->
        {{-- <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <div class="card"> --}}
                        <!-- Card header -->
                        {{-- <div class="card-header">
                            <h3 class="mb-0 float-left">View Product</h3>
                            <a href="{{route('product.create')}}" class="btn btn-sm btn-success text-white float-right">Add New</a>
                        </div> --}}
                        <!-- Card body -->
                        {{-- <div class="card-body"> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Product Name</label>
                                    <p> {{ $product->product_name }} </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-control-label" for="mpn">MPN</label>
                                    <p> {{ $product->mpn }} </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-control-label" for="sku">SKU</label>
                                    <p> {{ $product->sku }} </p>
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="manufactory">Manufactory</label>
					                    <p>{{ $product->manufactory }}</p>
					                </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="price">Regular Price</label>
                                    <p>{{ $product->regular_price }}</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="special_price">Sale Price</label>
                                    <p>  {{ $product->sale_price>'' ? $product->sale_price : '-' }}</p>
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="unit_per_cost">Unit Per Cost</label>
                                    <p>{{ $product->unit_per_cost }} </p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="cost">Cost</label>
                                    <p> {{ $product->cost }} </p>
                                </div>
                                <div class="col-md-4 mb-3">
                                	<div class="form-group">
					                    <label class="form-control-label" for="status">Status</label>
                                        @if($product->status == '1')
					                      <p>Active</p>
                                        @else
                                           <p>Inactive</p>
                                        @endif
					                </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="short_description">Short Description</label>
					                    <p>{!! $product->short_description !!}</p>
					                </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="full_description">Full Description</label>
                                        <p>{!! $product->full_description !!}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="internal_remark">Internal Remark</label>
					                    <p>{{ $product->internal_remark }}</p>
					                </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="brand_id">Product Brand</label>
					                    <p>
					                      {{ $product->brand->title }}
					                    </p>
					                </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="menu_id">Product Menu</label>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="category_id">Product Category</label>
                                        <p> {{ $categories }} </p>
					                </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
					                    <label class="form-control-label" for="subcategory_id">Product Sub Category</label>
					                </div>
                                </div>
                                <div class="col-md-4 mb-3 mt-4" style="margin-top: 31px!important;margin-left: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Image:&nbsp;&nbsp;&nbsp;</label>
                                        <img src="{{asset('uploads/frontend/image/product/'.$product->main_image) }}" style="width:230px;height:230px;">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="brand_id">Featured</label>
                                        <p>
                                          {{ $product->is_featured>0 ? 'Yes' : 'No' }}
                                        </p>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <a class="btn btn-primary" href="{{ url('admin/products/edit/'.$product->id)}}">Edit Product --}}
                            {{-- </a> --}}
                        {{-- </div> --}}
                    {{-- </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Add Product -->
        <div class="col-8">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0 float-left">View Product</h3>
                        <a class="btn btn-primary float-right" href="{{ url('admin/products/edit/'.$product->id)}}">Edit</a>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-control-label" for="product_name">Product Name</label>
                                <p title="{{ $product->product_name }}">{{ $product->product_name }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-control-label" for="MPN">MPN</label>
                                <p title="{{ $product->mpn }}">{{ $product->mpn }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="short_description">Short Description <small>(*Beside Image)</small></label>
                                    <p>{!! $product->short_description !!}</p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="full_description">Full Description</label>
                                    <p>{!! $product->full_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4>General</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <label class="form-control-label" for="manufactory">Manufactory</label>
                            <input title="{{ $product->manufactory }}" class="form-control" value="{{ $product->manufactory }}" disabled>
                        </div>
                        <div class="form-row">
                            <label class="form-control-label" for="cost">Cost</label>
                            <input title="{{ $product->cost }}" class="form-control" value="{{ $product->cost }}" disabled>
                        </div>
                        <div class="form-row">
                            <label class="form-control-label" for="unit_per_cost">Unit Per Cost</label>
                            <input title="{{ $product->unit_per_cost }}" class="form-control" value="{{ $product->unit_per_cost }}" disabled>
                        </div>
                        <div class="form-row">
                            <label class="form-control-label" for="regular_price">Regular Price</label>
                            <input title="{{ $product->regular_price }}" class="form-control" value="{{ $product->regular_price }}" disabled>
                        </div>
                        <div class="form-row mt-3">
                            <label class="form-control-label" for="sale_price">Sale Price</label>
                            <input title="{{ $product->sale_price }}" class="form-control" value="{{ $product->sale_price }}" disabled>
                        </div>
                        <div class="form-row mt-3 mb-2">
                            <div class="col-md-6 ">
                                <label class="form-control-label" for="sale_price_start_date">Sale Price Start Date <small>(Optional: If there is a deal)</small></label>
                                <input title="{{ $product->sale_price_start_date }}" class="form-control" value="{{ $product->sale_price_start_date }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="sale_price_end_date">Sale Price End Date <small>(Optional: If there is a deal)</small></label>
                                <input title="{{ $product->sale_price_end_date }}" class="form-control" value="{{ $product->sale_price_end_date }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="form-control-label" for="internal_remark">Internal Remark</label>
                            <input title="{{ $product->internal_remark }}" class="form-control" value="{{ $product->internal_remark }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4>Inventory</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <label class="form-control-label" for="sku">SKU</label>
                            <input title="{{ $product->sku }}" class="form-control" value="{{ $product->sku }}" disabled>
                        </div>
                        <div class="form-row mt-3">
                            <label class="form-control-label" for="stock_quantity">Stock Quantity</label>
                            <input title="{{ $product->stock_quantity }}" class="form-control" value="{{ $product->stock_quantity }}" disabled>
                        </div>
                        <div class="form-row mt-3">
                            <label class="form-control-label" for="backorders">Allow Backorders</label>
                            <input title="{{ $product->backorders }}" class="form-control" value="{{ $product->backorders }}" disabled>
                        </div>
                        <div class="form-row mt-3">
                            <label class="form-control-label" for="low_stock_thershold">Low Stock Thershold</label>
                            <input title="{{ $product->low_stock_thershold }}" class="form-control" value="{{ $product->low_stock_thershold }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <label class="form-control-label" for="weight">Weight(lbs)</label>
                            <input title="{{ $product->weight }}" class="form-control" value="{{ $product->weight }}" disabled>
                        </div>
                        <div class="form-row mt-4">
                            <span class="col-md-12 mt-2">
                                <label class="form-control-label" for="dimensions">Dimensions (in):</label>
                            </span>
                            <div class="col-md-4">
                                <input title="{{ $product->length }}" class="form-control" value="{{ $product->length }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <input title="{{ $product->width }}" class="form-control" value="{{ $product->width }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <input title="{{ $product->height }}" class="form-control" value="{{ $product->height }}" disabled>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <label class="form-control-label" for="shipping_class">Shipping Class</label>
                            <input title="{{ $product->shipping_class }}" class="form-control" value="{{ $product->shipping_class }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4>Attributes</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        {{-- <div class="col-md-12"> --}}
                        <div class="row">
                            <div class="col-md-9 mt--2">
                                <label for="status">Select a type </label>
                                <select class="form-control" id="product_attributes" name="product_attributes">
                                    <option disabled selected>Select a option</option>
                                    {{-- @foreach($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button class="btn btn-primary">Go</button>
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Values</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="field_wrapper">
                            <div>
                                <input class="form-control-input" id ="label[]" type="text" name="label[]" value="" name="label[]" placeholder="Label">
                                <input class="form-control-input" id ="color[]" type="color" name="color[]" value="#5e72e4" name="color[]" placeholder="">
                                <input class="form-control-input" id ="stock[]" type="number" name="stock[]" value="" name="stock[]" placeholder="Stock">
                                <input class="form-control-input" id ="price[]" type="number" name="price[]" value="" name="price[]" placeholder="Price">
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="add_button btn btn-primary mt-2 ml--3" title="Add field">Add New Row</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Product Categories</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <ul>
                                        <li>
                                            @foreach($product->categories as $category)
                                                <span class="badge badge-primary">{{ $category->category_name }}</span>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Brand -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Product Brand</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <ul style="list-style: none;">
                                        <li>
                                            @if ($product->brand_id == NULL)
                                            <p>This Product has no brand selected.</p> 
                                            @else
                                            <label for="">{{ $product->brand->title }}</label>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Price Level -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Price Level</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>Wholesale :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>&nbsp;
                                            </div>
                                            <input title="{{ $product->wholesale_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->wholesale_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->wholesale_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->wholesale_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>Retail :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                            </div>
                                            <input title="{{ $product->retail_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->retail_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->retail_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->retail_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>Medical Industry :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                            </div>
                                            <input title="{{ $product->medical_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->medical_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->medical_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->medical_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>School :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                            </div>
                                            <input title="{{ $product->school_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->school_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->school_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->school_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>Government :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                            </div>
                                            <input title="{{ $product->government_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->government_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->government_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->government_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <span>Non-Profit :</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                            </div>
                                            <input title="{{ $product->nonprofit_price }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->nonprofit_price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                            </div>
                                            <input title="{{ $product->nonprofit_percent }}" class="form-control" value="&nbsp;&nbsp;&nbsp;{{ $product->nonprofit_percent }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Featured Product -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Featured Product</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <ul>
                                        <li>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_featured" value="1" {{$product->is_featured>0 ? 'checked' : ''}}>
                                            <label class="form-check-label" for="exampleCheck1">Featured</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Tags -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Product Tags</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <input title="{{ $product->product_tags }}" class="form-control" value="{{ $product->product_tags }}" disabled>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Product Image</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="custom-file">
                            {{-- <input type="file" class="custom-file-input" id="customFileLang" name="main_image" onchange="readURL(this);" required>
                            <label class="custom-file-label" for="customFileLang">Select a image</label> --}}
                            <div class="mt-2" style=" display: flex;">
                                <img src="{{asset('uploads/frontend/image/product/'.$product->main_image) }}" id="main_image" alt="" height="200" width="200">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Image Gallery</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="custom-file">
                            @foreach($product->allImages as $row)
                            <img src="{{asset('uploads/frontend/image/product/alternative/'.$row->product_image) }}" id="main_image" alt="" height="20" width="20">
                            @endforeach
                            {{-- <img src="{{ $product->allImages->product_image }}" id="main_image" alt="" height="20" width="20"> --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Min Max Quantity</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="customCheck1" type="checkbox" name="quantity_limit" value="1"{{$product->quantity_limit>0 ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="customCheck1">Enable</label>
                                </div>
                                <div class="form-row mt-2 ml-1">
                                    <label class="form-control-label" for="min_quantity">Min Quantity</label>
                                    <input class="form-control" id="min_quantity" name="min_quantity" value="{{$product->min_quantity}}" disabled>
                                </div>
                                <div class="form-row mt-2 ml-1">
                                    <label class="form-control-label" for="max_quantity">Max Quantity</label>
                                    <input  class="form-control" id="max_quantity" name="max_quantity" value="{{$product->max_quantity}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
