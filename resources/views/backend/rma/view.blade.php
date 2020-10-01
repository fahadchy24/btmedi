@extends('layouts.admin_app')

@section('title', 'View Order')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">New Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('order.index')}}">New Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Order</li>
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
                            @foreach($order as $row)
                            <h3 class="">Invoice No. TCH#{{ $row->id }} </h3>
                            <div class="col-auto float-right">
                                <a href="{{ route('home') }}"><button type="button" class="btn btn-sm btn-primary">Print</button></a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            @foreach($order as $row)
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-control-label" for="name">Order Number</label>
                                    <p>{{ $row->order_number }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-control-label" for="sku">Order Date</label>
                                    <p> {{ $rma_edit->order->created_at->format('d M Y') }} </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="details">Payment</label>
                                        <p>{{ $row->payment }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-control-label" for="status">Status</label>
                                    <p> {{ $row->status }} </p>
                                </div>
                            </div>
                            <div class="card-deck flex-column flex-xl-row">
                                <!-- Members list group card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <!-- Title -->
                                        <h5 class="h3 mb-0">Billing Address</h5>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <!-- List group -->
                                        <ul class="list-group list-group-flush list my--3">
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center">
                                                    <div class="col ml--2">
                                                        <h4 class="mb-0">
                                                            <a href="#!">
                                                                @if($row->user_id>0)
                                                                {{ $row->user->firstName }} {{ $row->user->lastName }}
                                                                @else
                                                                {{ $row->guest->firstName }} {{ $row->guest->lastName }}
                                                                @endif
                                                            </a>
                                                        </h4>
                                                        <p>
                                                            @if($row->user_id>0)
                                                            {{ $row->user->address }},
                                                            {{ $row->user->street }}
                                                            {{ $row->user->apt }} <br>
                                                            {{ $row->user->state }} <br>
                                                            {{ $row->user->city }},&nbsp&nbsp{{ $row->user->zip }}<br>
                                                            {{ $row->user->country }}
                                                            @else
                                                            {{ $row->guest->address }},
                                                            {{ $row->guest->street }}
                                                            {{ $row->guest->apt }} <br>
                                                            {{ $row->guest->state }},&nbsp
                                                            {{ $row->guest->city }},&nbsp&nbsp{{ $row->guest->zip }} <br>
                                                            {{ $row->guest->country }}
                                                            @endif
                                                        </p>
                                                        @if($row->user_id>0)
                                                        <h5 class="mb-1">Email:</h5>
                                                        <a class="text-red" href="mailto:{{ $row->user->email }}">
                                                            {{ $row->user->email }}
                                                        </a>
                                                        <h5 class="mt-2 mb-0">Phone:</h5>
                                                        <a class="text-red" href="#">
                                                            {{ $row->user->contact }}
                                                        </a>
                                                        @else
                                                        <h5 class="mb-1">Email:</h5>
                                                        <a class="text-red" href="mailto:{{ $row->guest->email }}">
                                                            {{ $row->guest->email }}
                                                        </a>
                                                        <h5 class="mt-2 mb-0">Phone:</h5>
                                                        <a class="text-red" href="#">
                                                            {{ $row->guest->phone }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Checklist -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <!-- Title -->
                                        <h5 class="h3 mb-0">Shipping Address</h5>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <!-- List group -->
                                        <ul class="list-group list-group-flush list my--3">
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center">
                                                    <div class="col ml--2">
                                                        <h4 class="mb-0">
                                                            <a href="#!">
                                                                @if($row->user_id>0)
                                                                {{ $row->user->firstName }} {{ $row->user->lastName }}
                                                                @else
                                                                {{ $row->guest->firstName }} {{ $row->guest->lastName }}
                                                                @endif
                                                            </a>
                                                        </h4>
                                                        <p>
                                                            @if($row->user_id>0)
                                                            {{ $row->user->address }},
                                                            {{ $row->user->street }}
                                                            {{ $row->user->apt }} <br>
                                                            {{ $row->user->state }} <br>
                                                            {{ $row->user->city }},&nbsp&nbsp{{ $row->user->zip }}<br>
                                                            {{ $row->user->country }}
                                                            @else
                                                            {{ $row->guest->address }},
                                                            {{ $row->guest->street }}
                                                            {{ $row->guest->apt }} <br>
                                                            {{ $row->guest->state }},&nbsp
                                                            {{ $row->guest->city }},&nbsp&nbsp{{ $row->guest->zip }} <br>
                                                            {{ $row->guest->country }}
                                                            @endif
                                                        </p>
                                                        @if($row->user_id>0)
                                                        <h5 class="mb-1">Email:</h5>
                                                        <a class="text-red" href="mailto:{{ $row->user->email }}">
                                                            {{ $row->user->email }}
                                                        </a>
                                                        <h5 class="mt-2 mb-0">Phone:</h5>
                                                        <a class="text-red" href="#">
                                                            {{ $row->user->contact }}
                                                        </a>
                                                        @else
                                                        <h5 class="mb-1">Email:</h5>
                                                        <a class="text-red" href="mailto:{{ $row->guest->email }}">
                                                            {{ $row->guest->email }}
                                                        </a>
                                                        <h5 class="mt-2 mb-0">Phone:</h5>
                                                        <a class="text-red" href="#">
                                                            {{ $row->guest->phone }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <!-- Card header 2 -->
                        <div class="card-header">
                            <h3>Items</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            @foreach($order as $row)
                            <div class="table-responsive">
                                <table class="table table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Image</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ url('public/frontend/images/product/'.$row->product->image) }}" width="40" height="40" alt=""></td>
                                            <td><span class="" style="font-size: 18px;font-weight: bold">{{ $row->product->name }}</span> <br> SKU: {{ $row->product->sku }} </td>
                                            <td>${{ $row->product->price }}</td>
                                            <td>{{ $row->quantity }}</td>
                                            <td>${{ $row->total_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-11">
                                    <div class="float-right">
                                        <p>Sub Total :&nbsp<span> ${{ $row->sub_total}}</span></p>
                                        <p>Shipping : <span>{{$row->shipping_price}}</span></p>
                                        <p>Tax &nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp<span>{{$row->tax}}</span></p>
                                        <hr class="mt-2 mb-2">
                                        <p>Total:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span>${{ $row->total_price }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary" href="{{ url('admin/order/edit/'.$row->id)}}">Edit Order
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection