@extends('layouts.app')

@section('title', '')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">My Wish List</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <h2 class="title">My Wish List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Color</td>
                            <td class="text-right">Size</td>
                            <td class="text-right">Stock</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlists as $row)
                        <tr>
                        
                            <td class="text-center">
                                <a href="{{ url('view-product/'.$row->product->id) }}">
                                <img width="70px" src="{{asset('uploads/frontend/image/product/'.$row->product->main_image)}}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
                                </a>
                            </td>
                            <td class="text-left"><a href="{{ url('view-product/'.$row->product->id) }}">{{ $row->product->product_name }}</a>
                            </td>
                            <td class="text-left">-</td>
                            <td class="text-right">-</td>
                            <td class="text-right">In Stock</td>
                            <td class="text-right">
                                <div class="price"> <span class="price-new">{{ "$".$row->product->sale_price }}</span> <span class="price-old">{{ "$".$row->product->regular_price }}</span></div>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-primary" title="" data-toggle="tooltip" onclick="cart.add('48');" type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
                                </button>
                                <a class="btn btn-danger" title="" data-toggle="tooltip" href="" data-original-title="Remove"><i class="fa fa-times"></i></a>
                            </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Middle Part End-->
        <aside class="col-sm-3 hidden-xs" id="column-right">
            <h2 class="subtitle">Account</h2>
            <div class="list-group">
                <ul class="list-item">
                    {{-- <li><a href="login.html">Login</a>
                    </li>
                    <li><a href="register.html">Register</a>
                    </li> --}}
                    <li><a href="#">Wholesale Register</a>
                    </li>
                    <li><a href="#">Forgotten Password</a>
                    </li>
                    <li><a href="#">My Account</a>
                    </li>
                    <li><a href="#">Address Books</a>
                    </li>
                    <li><a href="#">Order History</a>
                    </li>
                    <li><a href="#">Returns</a>
                    </li>
                    <li><a href="#">Newsletter</a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>
<!-- //Main Container -->


@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush
