@extends('layouts.admin_app')

@section('title', 'Create New Order')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Create New Order</a></li>
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
                            <h3 class="mb-0">Create a new order</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.new.orders') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="last_name">Customer Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="first_name">Customer First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Customer Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Customer Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address_1">Customer Address</label>
                                    <textarea name="address_1" id="address_1" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="state">State</label>
                                    <select name="state" id="state" class="form-control" data-toggle="select">
                                        <option selected disabled>Select a state</option>
                                            @foreach ($states as $state)
                                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="city">City</label>
                                    <select name="city" id="city" class="form-control" data-toggle="select">
                                        <option selected disabled>Select a city</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="postcode">Post Code</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="product_id">Order Item</label>
                                    <select name="product_id" id="product_id" class="form-control" data-toggle="select">
                                        <option selected disabled>Select a product</option>
                                        @foreach ($productList as $row)
                                            <option value="{{$row->id}}">{{$row->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="quantity">Order Quantity</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" min="1" name="quantity" autocomplete="off" required>
                                    @error('quantity')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="payment_method">Payment Method</label>
                                    <select name="payment_method" id="payment_method" class="form-control" data-toggle="select">
                                            <option selected disabled>Select a payment method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Card Payment">Card Payment</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="shipping_method">Shipping Method</label>
                                    <select name="shipping_method" id="shipping_method" class="form-control" data-toggle="select">
                                            <option selected disabled>Select a shipping method</option>
                                            <option value="class-1">class-1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="note">Special Request or Note</label>
                                    <textarea name="note" id="note" class="form-control"></textarea>
                                    @error('note')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="mt-5 mb-5">
                                        <label class="form-control-label mr-4" for="taxable">Taxable:</label>
                                        <input type="radio" class="form-control-input" id="taxable" name="taxable" value="1">
                                        Yes
                                        &nbsp;
                                        &nbsp;
                                        <input type="radio" class="form-control-input" id="taxable" name="taxable" value="0">
                                        No    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Remark</label>
                                    {{-- <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku"> --}}
                                    <textarea name="remark" id="remark" class="form-control"></textarea>
                                    @error('remark')
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

@push('scripts')



@endpush