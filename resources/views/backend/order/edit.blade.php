@extends('layouts.admin_app')

@section('title', 'Edit Order')

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
                            <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
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
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">View Order</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                        @foreach($order as $row)
                            <form action="{{ route('update.order', $row->id)}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="name">Order Number</label>
                                        <p>{{ $row->order_number }}</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="sku">Order Date</label>
                                        <p> {{ $row->created_at->format('d M y') }} </p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="sku">Invoice Number</label>
                                        <p> {{ $row->invoice_number }} </p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="sku">SKU</label>
                                        <p> {{ $row->product->sku }} </p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="sku">Order Type</label>
                                        <p> {{ $row->order_type }} </p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="sku">Customer Name</label>
                                        @if($row->user_id>0)
                                        <p>{{ $row->user->first_name }} {{ $row->user->last_name }}</p>
                                        @endif
                                        
                                        @if($row->guest_id>0)
                                        <p> {{ $row->guest->first_name }} {{ $row->guest->last_name }} </p>
                                        @endif
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="cost">Quantity</label>
                                        <p> {{ $row->quantity }} </p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-control-label" for="price">Sub Total</label>
                                        <p>{{ $row->sub_total }}</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="tx">Tax</label>
                                        <p>{{ $row->tax }} </p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="discount">Shipping Charge</label>
                                        <p> {{ $row->shipping_fee }} </p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="discount">All Total</label>
                                        <p> {{ $row->total*$row->quantity }} </p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-control-label" for="status">Order Status</label>
                                        <select class="form-control" name="status" id="status">
                                            @if($row->status=="Pending")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Order Processing")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Ready to Pack and Ship")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Finished")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Back")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Canceled")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Hold">Hold</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Hold")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Refund">Refund</option>
                                            @endif
                                            @if($row->status=="Refund")
                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Order Processing">Order Processing</option>
                                            <option value="Ready to Pack and Ship">Ready to Pack and Ship</option>
                                            <option value="Finished">Finished </option>
                                            <option value="Back">Back</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Hold">Hold</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-5 offset-md-1 mb-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="payment">Payment Status</label>
                                            <select class="form-control" name="payment" id="payment">
                                                @if($row->payment=="Pending")
                                                <option value="{{ $row->payment }}" selected>{{ $row->payment }}</option>
                                                <option value="Paid">Paid</option>
                                                @else
                                                <option value="{{ $row->payment }}" selected>{{ $row->payment }}</option>
                                                <option value="Pending">Pending</option>
                                                @endif
                                        </select>
    					                </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Order
                                </button>
                            </form>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection