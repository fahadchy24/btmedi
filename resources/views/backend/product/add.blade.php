
@extends('layouts.admin_app')

@section('title', 'Add Product')

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
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<div class="container-fluid mt--6">
    <form action="{{ route('product.save') }}" role="form" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Start Page Content -->
        <div class="row">
            <!-- Add Product -->
            <div class="col-8">
                <div class="card-wrapper">
                    <!-- Custom form validation -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0 float-left">Add New Product</h3>
                            <button class="btn btn-primary float-right" type="submit">Publish</button>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="product_name">Product Name*</label>
                                    <input title="Enter Product Name" type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" autocomplete="on" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="short_description">Short Description* <small>(*Beside Image)</small></label>
                                        <textarea title="Enter Product Short Description" class="form-control" id="summary-ckeditor" name="short_description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="full_description">Full Description*</label>
                                        <textarea title="Enter Product Full Description" class="form-control" id="summary-ckeditor2" name="full_description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="specification">Specifications</label>
                                        <textarea title="Enter Product Specification" class="form-control" id="summary-ckeditor3" name="specification"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="video_url">Video URL <small>(Ex: https://youtube.com)</small> </label>
                                    <input title="Enter Product Name" type="url" class="form-control" id="video_url" name="video_url" placeholder="Video URL" autocomplete="on">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="docs">Docs <small>(*Max: 5MB)</small></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileLang" name="docs" accept="application/pdf">
                                            <label class="custom-file-label" for="customFileLang">Select a docs</label>
                                        </div>
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
                                <input title="Enter Manufactory" type="number" class="form-control" min="0" id="manufactory" name="manufactory" placeholder="Manufactory" autocomplete="on">
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="cost">Cost*</label>
                                <input title="Enter Cost" type="text" class="form-control" id="cost" name="cost" placeholder="Cost" autocomplete="on" required>
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="unit_per_cost">Unit Per Cost*</label>
                                <input title="Enter Unit Per Cost" type="text" class="form-control" id="unit_per_cost" name="unit_per_cost" placeholder="Unit Per Cost" autocomplete="on" required>
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="regular_price">Regular Price*</label>
                                <input title="Enter Regular Price" type="text" class="form-control" id="regular_price" name="regular_price" placeholder="Regular Price" autocomplete="on" required>
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="sale_price">Sale Price</label>
                                <input title="Enter Sale Price" type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Sale Price" autocomplete="off">
                            </div>
                            <div class="form-row mt-3 mb-2">
                                <div class="col-md-6 ">
                                    <label class="form-control-label" for="sale_price_start_date">Sale Price Start Date <small>(Optional: If there is a deal)</small></label>
                                    <input type="date" class="form-control" id="sale_price_start_date" name="sale_price_start_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label" for="sale_price_end_date">Sale Price End Date <small>(Optional: If there is a deal)</small></label>
                                    <input type="date" class="form-control" id="sale_price_end_date" name="sale_price_end_date">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="form-control-label" for="internal_remark">Internal Remark</label>
                                <input title="Enter Internal Remark" type="text" class="form-control" id="internal_remark" name="internal_remark" placeholder="Internal Remark" autocomplete="on">
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
                                <label class="form-control-label" for="mpn">MPN</label>
                                <input title="Enter MPN" type="number" class="form-control" min="0" id="mpn" name="mpn" placeholder="MPN" autocomplete="on">
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="stock_quantity">Stock Quantity* <small>(*If there is no attribute quantity available)</small></label>
                                <input title="Enter Stock Quantity" type="number" class="form-control" min="0" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" autocomplete="on">
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="backorders">Allow Backorders*</label>
                                <select class="form-control" name="backorders" id="backorders" required>
                                    <option selected disabled>Select a option</option>
                                    <option value="Allow">Allow</option>
                                    <option value="Disallow">Do Not Allow</option>
                                </select>
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="low_stock_thershold">Low Stock Thershold</label>
                                <input type="number" class="form-control" id="low_stock_thershold" name="low_stock_thershold" placeholder="2" min="2" autocomplete="off">
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
                                <input type="number" class="form-control" min="0" id="weight" name="weight" placeholder="Weight" autocomplete="on">
                            </div>
                            <div class="form-row mt-4">
                                <span class="col-md-12 mt-2">
                                    <label class="form-control-label" for="dimensions">Dimensions (in):</label>
                                </span>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="length" min="0" name="length" placeholder="Length" autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="width" min="0" name="width" placeholder="Width" autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="height" min="0" name="height" placeholder="Height" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="form-control-label" for="shipping_class">Shipping Class</label>
                                <select class="form-control" name="shipping_class" id="shipping_class">
                                    <option selected disabled>Select a class</option>
                                    <option value="class1">Class 1</option>
                                    <option value="class2">Class 2</option>
                                    <option value="class3">Class 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h4>Attributes</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9 mt--2">
                                    <label for="status">Select a type </label>
                                    <select class="form-control" id="product_attributes" name="product_attributes">
                                        <option disabled selected>Select a option</option>
                                        @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <button class="btn btn-primary">Go</button>
                                </div>
                            </div>
                            </div>
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
                    </div> --}}
                </div>
            </div>
            <div class="col-4">
                <div class="card-wrapper">
                    <!-- Custom form validation -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Product Categories*</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5>All Categories</h5>
                                    <div class="form-group row">
                                        <ul>
                                            @if(!empty($categories))
                                            @foreach($categories as $row)
                                            <li>
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="category_id[]" value="{{ $row->id }}">
                                                <label class="form-check-label" for="exampleCheck1">{{ $row->category_name }}</label>
                                                <ul>
                                                    @if(!empty($row['subcategories']))
                                                    @foreach($row['subcategories'] as $subcategory)
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="subcategory_id[]" value="{{ $subcategory->id}}">
                                                        <label class="form-check-label" for="exampleCheck1">{{ $subcategory->subcategory_name}}</label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Brand -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Product Brand*</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <ul style="list-style: none;">
                                            @foreach($brands as $brand)
                                            <li>
                                                <input type="radio" id="customRadio5" name="brand_id" value="{{ $brand->id}}">
                                                <label for="customRadio5">{{ $brand->title }}</label>
                                            </li>
                                            @endforeach
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
                                                    <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                                </div>
                                                <input class="form-control" name="wholesale_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="wholesale_percent" placeholder="Percent" type="number" min="0">
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
                                                <input class="form-control" name="retail_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="retail_percent" placeholder="Percent" type="number" min="0">
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
                                                <input class="form-control" name="medical_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="medical_percent" placeholder="Percent" type="number" min="0">
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
                                                <input class="form-control" name="school_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="school_percent" placeholder="Percent" type="number" min="0">
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
                                                <input class="form-control" name="government_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="government_percent" placeholder="Percent" type="number" min="0">
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
                                                <input class="form-control" name="nonprofit_price" placeholder="Fixed" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                </div>
                                                <input class="form-control" name="nonprofit_percent" placeholder="Percent" type="number" min="0">
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
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_featured" value="1">
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
                            {{-- <form> --}}
                                <input type="text" class="form-control" name="product_tags" placeholder="Enter tags here" data-toggle="tags" />
                            {{-- </form> --}}
                        </div>
                    </div>
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Product Image*</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="main_image" onchange="readURL(this);" required>
                                <label class="custom-file-label" for="customFileLang">Select a image</label>
                                <div class="mt-2" style=" display: flex;">
                                    <img src="#" id="main_image" alt="" style="margin-left:50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Image Gallery</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Multiple -->
                            <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="http://">
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" name="product_images[]" class="custom-file-input" id="customFileUploadMultiple" multiple>
                                        <label class="custom-file-label" for="customFileUploadMultiple">Choose file</label>
                                    </div>
                                </div>
                                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <img class="avatar-img rounded" src="..." alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                            <div class="col ml--3">
                                                <h4 class="mb-1" data-dz-name>...</h4>
                                                <p class="small text-muted mb-0" data-dz-size>...</p>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item" data-dz-remove>
                                                            Remove
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Image Gallery</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="product_images[]" multiple>
                                <label class="custom-file-label" for="customFileLang">Select a image</label>
                                {{-- <div class="mt-2" style=" display: flex;">
                                    <img src="#" id="main_image" alt="" style="margin-left:50px;">
                                </div> --}}
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
                                        <input class="custom-control-input" id="customCheck1" type="checkbox" name="quantity_limit" value="1">
                                        <label class="custom-control-label" for="customCheck1">Enable</label>
                                    </div>
                                    <div class="form-row mt-2 ml-1">
                                        <label class="form-control-label" for="min_quantity">Min Quantity</label>
                                        <input type="number" class="form-control" id="min_quantity" min="0" name="min_quantity" placeholder="Min Quantity" autocomplete="off">
                                    </div>
                                    <div class="form-row mt-2 ml-1">
                                        <label class="form-control-label" for="max_quantity">Max Quantity</label>
                                        <input type="number" class="form-control" id="max_quantity" min="0" name="max_quantity" placeholder="Max Quantity" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#main_image')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input id="label[]"type="text"name="label[]"value=""name="label[]"placeholder="Label"><input class="" id="color[]"type="color"name="color[]"value="#5e72e4"name="color[]"><input class="" id ="stock[]" type="text" name="stock[]"value=""name="stock[]" placeholder="Stock"><input class="" id ="price[]" type="text" name="price[]" value="" name="price[]" placeholder="Price"><a href="javascript:void(0);"class="remove_button btn-sm btn-danger">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('summary-ckeditor');

</script>
<script>
    CKEDITOR.replace('summary-ckeditor2');

</script>
<script>
    CKEDITOR.replace('summary-ckeditor3');

</script>


@endpush