@extends('layouts.app')

@section('title', 'Your Shopping Cart')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h2 class="title">Shopping Cart</h2>
            <div class="table-responsive form-group">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $row)
                        <tr>
                            <td class="text-center"><a href="{{ url('product/view', $row->id) }}"><img width="70px" src="{{ $row->options->main_image }}" alt="{{ $row->name }}" title="{{ $row->name }}" class="img-thumbnail" /></a></td>
                            <td class="text-left"><a href="{{ url('product/view', $row->id) }}">{{ $row->name }}</a><br />
                            </td>
                            <td class="text-left" width="200px">
                            <form action="{{ url('cart/update') }}" method="POST">@csrf
                                <div class="input-group btn-block quantity">
                                        <input type="hidden" name="rowId" value="{{ $row->rowId }}">
                                        <input type="number" name="qty" value="{{ $row->qty }}" size="1" min="1" class="form-control" />
                                        <span class="input-group-btn">
                                                <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i>
                                                </button>
                                                <a type="button" href="{{ url('cart/delete', $row->rowId) }}" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></a>
                                        </span>
                                </div>
                            </form>
                            </td>
                            <td class="text-right">{{ "$".$row->price() }}</td>
                            <td class="text-right">{{ "$".$row->subtotal() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel-group" id="accordion">
                <table class="table_total">
                    <tbody>
                        <tr>
                            <td class="text-right">
                                <strong>Sub-Total:</strong>
                            </td>
                            <td class="text-right">{{ "$".Cart::subtotal() }}</td>
                        </tr>
                        {{--  <tr>
                            <td class="text-right">
                                <strong>Shipping Rate:</strong>
                            </td>
                            <td class="text-right">$4.69</td>
                        </tr>  --}}
                        <tr>
                            <td class="text-right">
                                <strong>Tax:</strong>
                            </td>
                            <td class="text-right">{{ "$".Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <strong>Total:</strong>
                            </td>
                            <td class="text-right">{{ "$".Cart::total() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
            </div>
        </div>
        <div class="buttons">
            <div class="pull-left"><a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a></div>
            <div class="pull-right"><a href="{{ route('order.checkout') }}" class="btn btn-primary">Checkout</a></div>
        </div>
    </div>
    <!--Middle Part End -->

</div>
</div>
<!-- //Main Container -->


@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush