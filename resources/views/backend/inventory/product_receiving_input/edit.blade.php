@extends('layouts.admin_app')

@section('title', 'Add Received Product')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('receive.index')}}">Product Receiving Input</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('receive.create')}}">Edit</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Start Main Content -->
<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Add Slider -->
        <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit Received Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('receive.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="receive_date">Receiving Date</label>
                                    <input type="date" class="form-control" id="receive_date" name="receive_date" value="{{ $inventory->receive_date }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="vendor_id">Select a Vendor</label>
                                    <select name="vendor_id" id="vendor_id" class="form-control">
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tracking_number">BOL/Tracking Number</label>
                                    <input type="text" class="form-control @error('tracking_number') is-invalid @enderror" id="phone" name="tracking_number" value="{{ $inventory->tracking_number }}">
                                    @error('tracking_number')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="sku">SKU</label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" value="{{ $inventory->product->sku }} }}">
                                    @error('sku')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="product_id">Product Name</label>
                                    <input type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id" value="{{ $inventory->product->product_name }}">
                                    @error('product_id')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="quantity">Quantity</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ $inventory->quantity }}">
                                    @error('quantity')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="cost">Cost</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost" value="{{ $inventory->cost }}">
                                    @error('cost')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection