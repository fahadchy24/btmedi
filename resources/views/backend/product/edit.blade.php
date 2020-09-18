@extends('layouts.admin_app')

@section('title', 'Edit Product')

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
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Add Slider -->
        <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <!-- Custom form validation -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit Product</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action ="{{url('admin/products/update/'.$product->id)}}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label class="form-control-label" for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="sku">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="cost">Cost</label>
                                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $product->cost }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="price">Store Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="special_price">Special Price</label>
                                        <input type="text" class="form-control" id="special_price" name="special_price" value="{{ $product->special_price }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="wholesale_price">Wholesale Price</label>
                                        <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" value="{{ $product->wholesale_price }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="discount">Discounted Price</label>
                                        <input type="text" class="form-control" id="discount" name="discount" value="{{ $product->discount }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    	<div class="form-group">
						                    <label class="form-control-label" for="status">Status</label>
                                            @if ($product->status == 1 )
						                    <select class="form-control" id="status" name="status" required>
						                      <option value="1" selected>Active</option>
                                              <option value="0">Inactive</option>
                                            </select>
                                            @endif
                                            @if ($product->status == 0 )
                                            <select class="form-control" id="status" name="status" required>
                                              <option value="0" selected>Inactive</option>
                                              <option value="1">Active</option>
                                            </select>
                                            @endif
						                </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="short_details">Short_Details</label>
						                    <textarea class="form-control" id="short_details" rows="2" name="short_details" required>{{ $product->short_details }}</textarea>
						                </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="full_details">Full Details</label>
                                            <textarea class="form-control" id="full_details" rows="2" name="full_details" required>{{ $product->full_details }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="api">API</label>
						                    <textarea class="form-control" id="api" rows="2" name="api" value="{{ $product->api }}" resize="none"></textarea>
						                </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="note">Note</label>
						                    <textarea class="form-control" id="note" rows="2" name="note" resize="none">{{ $product->note }}</textarea>
						                </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="brand_id">Product Brand</label>
						                    <select class="form-control" id="brand_id" name="brand_id">
						                      <option disabled="" selected="">Select a brand</option>
						                      <option value="1">Tech880</option>
						                      <option value="2">Tech881</option>
						                    </select>
						                </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="menu_id">Product Menu</label>
						                    <select class="form-control" id="menu_id" name="menu_id" id="MenuName" required>
                                                <option disabled="" selected="">Select a menu</option>
                                                @foreach($menus as $row)
                                                <option {{$row->id == $product->menu_id ? 'selected' : '' }} value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
						                </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="category_id">Product Category</label>
						                    <select class="form-control" name="category_id" id="category_id" required>
                                                <option disabled="" selected="">Select a category</option>
                                                @foreach($categories as $row)
                                                <option {{$row->id == $product->category_id ? 'selected' : '' }} value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
						                </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
						                    <label class="form-control-label" for="subcategory_id">Product Sub Category</label>
						                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option disabled="" selected="">Select a Sub Category</option>
                                                @foreach($subcategories as $row)
                                                <option {{$row->id == $product->subcategory_id ? 'selected' : '' }} value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
						                </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-4" style="margin-top: 31px!important;margin-left: 20px;">
                                        <div class="form-group">
                                            <img src="#" alt="" id="image">
                                            <label for="exampleInputEmail1">Select New Photo</label>
                                            <input type="file" name="image" accept="image/*" class="upload" onchange="readURL(this);">
                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset('public/frontend/images/product/'.$product->image) }}" style="width:80px;height:80px;">
                                            <input type="hidden" name="old_photo" value="{{$product->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck1" type="checkbox" name="featured" value="Yes" @if($product->featured =='Yes') checked @endif>
                                            <label class="custom-control-label" for="customCheck1">Featured</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image')
          .attr('src' , e.target.result)
          .width(200)
          .height(200);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
@endpush