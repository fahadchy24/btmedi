@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Checkout</a></li>
    </ul>
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h2 class="title">Checkout</h2>
            <form action="{{ route('store.order') }}" method="POST">@csrf
                <div class="so-onepagecheckout row">
                    <div class="col-left col-sm-7">
                        @if (Auth::user())
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">First Name</label>
                                        <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="{{ Auth::user()->first_name }}" name="first_name">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">Last Name</label>
                                        <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="{{ Auth::user()->last_name }}" name="last_name">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label">E-Mail</label>
                                        <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="{{ Auth::user()->email }}" name="email">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">Telephone</label>
                                        <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="{{ Auth::user()->phone }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-fax" class="control-label">Fax</label>
                                        <input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="{{ Auth::user()->fax }}" name="fax">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="address" class="required">
                                    <div class="form-group">
                                        <label for="input-payment-company" class="control-label">Company</label>
                                        <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="{{ Auth::user()->company }}" name="company">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">Address 1</label>
                                        <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="{{ Auth::user()->address_1 }}" name="address_1">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-address-2" class="control-label">Address 2</label>
                                        <input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="{{ Auth::user()->address_2 }}" name="address_2">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="control-label">City</label>
                                        <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="{{ Auth::user()->city }}" name="city">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-postcode" class="control-label">Post Code</label>
                                        <input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="{{ Auth::user()->postcode }}" name="postcode">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-country" class="control-label">Country</label>
                                        <select class="form-control" id="input-payment-country" name="country">
                                            <option value="{{ Auth::user()->country }}" selected disabled>{{ Auth::user()->country }}</option>

                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-zone" class="control-label">Region / State</label>
                                        <select class="form-control" id="input-payment-zone" name="state">
                                            <option value="{{ Auth::user()->state }}" selected disabled>{{ Auth::user()->state }}</option>
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="checked" value="1" name="shipping_address">
                                            My delivery and billing addresses are the same.
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-right col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or Voucher?</h4>
                                        </div>
                                        <div class="panel-body row">
                                            <div class="col-sm-12 ">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                                                    <span class="input-group-btn">
                                                        <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                                                    </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delivary -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default no-padding">
                                        <div class="col-sm-12 checkout-shipping-methods">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                                            </div>
                                            <div class="panel-body ">
                                                <p>Please select the preferred shipping method to use on this order.</p>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked="checked" name="Free Shipping">
                                                        Free Shipping - $0.00</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="Flat Shipping Rate">
                                                        Flat Shipping Rate - $7.50
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="p-4 mb-4 checkout-table">
                                                <!-- Title -->
                                                <div class="border-bottom border-color-1 mb-5">
                                                    <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                                </div>
                                                <!-- End Title -->

                                                <!-- Product Content -->
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($content as $row)
                                                        <tr class="cart_item">
                                                            <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                            <input type="hidden" name="quantity" value="{{ Cart::count() }}">
                                                            <td>{{ $row->name }}&nbsp;<strong class="product-quantity">× {{ $row->qty }}</strong></td>
                                                            <td>{{ "$". $row->price }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>{{ "$".Cart::subtotal() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping</th>
                                                            <td>Flat rate $300.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total</th>
                                                            <td><strong>{{ "$".Cart::total() }}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- End Product Content -->
                                                <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                                    <!-- Basics Accordion -->
                                                    <div id="basicsAccordion1">

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingTwo">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="secondStylishRadio1" data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                                                        Cash on Dalivary
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                                                <div class="p-4">
                                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingThree">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="thirdstylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="thirdstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false" aria-controls="basicsCollapseThree">
                                                                        Card Payment
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingFour">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="FourstylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="FourstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false" aria-controls="basicsCollapseFour">
                                                                        PayPal <a href="#" class="text-blue">What is PayPal?</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="basicsCollapseFour" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingFour" data-parent="#basicsAccordion1">
                                                                <div class="p-4">
                                                                    Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->
                                                    </div>
                                                    <!-- End Basics Accordion -->
                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required data-msg="Please agree terms and conditions." data-error-class="u-has-error" data-success-class="u-has-success">
                                                        <label class="form-check-label form-label" for="defaultCheck10">
                                                            I have read and agree to the website <a href="#" class="text-blue">terms and conditions </a>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Place order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                	    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="register" name="account">
                                        Register Account</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="guest" name="account">
                                        Guest Checkout</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="returning" name="account">
                                        Returning Customer</label>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">First Name</label>
                                        <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="" name="first_name">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">Last Name</label>
                                        <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="last_name">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label">E-Mail</label>
                                        <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="" name="email">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">Telephone</label>
                                        <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-fax" class="control-label">Fax</label>
                                        <input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="" name="fax">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="address" class="required">
                                    <div class="form-group">
                                        <label for="input-payment-company" class="control-label">Company</label>
                                        <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="" name="company">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">Address 1</label>
                                        <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="" name="address_1">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-address-2" class="control-label">Address 2</label>
                                        <input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="" name="address_2">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="control-label">City</label>
                                        <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-postcode" class="control-label">Post Code</label>
                                        <input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="" name="postcode">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-country" class="control-label">Country</label>
                                        <select class="form-control" id="input-payment-country" name="country">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="United States of America">United States of America</option>

                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-zone" class="control-label">Region / State</label>
                                        <select class="form-control" id="input-payment-zone" name="state">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="Aberdeen">Aberdeen</option>
                                            <option value="Aberdeenshire">Aberdeenshire</option>
                                            <option value="Anglesey">Anglesey</option>
                                            <option value="Angus">Angus</option>
                                            <option value="Argyll and Bute">Argyll and Bute</option>
                                            <option value="Bedfordshire">Bedfordshire</option>
                                            <option value="Berkshire">Berkshire</option>
                                            <option value="Blaenau Gwent">Blaenau Gwent</option>
                                            <option value="Bridgend">Bridgend</option>
                                            <option value="Bristol">Bristol</option>
                                            <option value="New York">New York</option>
                                            <option value="New Jersey">New Jersey</option>
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="checked" value="1" name="shipping_address">
                                            My delivery and billing addresses are the same.
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-right col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or Voucher?</h4>
                                        </div>
                                        <div class="panel-body row">
                                            <div class="col-sm-12 ">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                                                    <span class="input-group-btn">
                                                        <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                                                    </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delivary -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default no-padding">
                                        <div class="col-sm-12 checkout-shipping-methods">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                                            </div>
                                            <div class="panel-body ">
                                                <p>Please select the preferred shipping method to use on this order.</p>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked="checked" name="Free Shipping">
                                                        Free Shipping - $0.00</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="Flat Shipping Rate">
                                                        Flat Shipping Rate - $7.50
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="p-4 mb-4 checkout-table">
                                                <!-- Title -->
                                                <div class="border-bottom border-color-1 mb-5">
                                                    <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                                </div>
                                                <!-- End Title -->

                                                <!-- Product Content -->
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($content as $row)
                                                        <tr class="cart_item">
                                                            <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                            <input type="hidden" name="quantity" value="{{ Cart::count() }}">
                                                            <td>{{ $row->name }}&nbsp;<strong class="product-quantity">× {{ $row->qty }}</strong></td>
                                                            <td>{{ "$". $row->price }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>{{ "$".Cart::subtotal() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping</th>
                                                            <td>Flat rate $300.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total</th>
                                                            <td><strong>{{ "$".Cart::total() }}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- End Product Content -->
                                                <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                                    <!-- Basics Accordion -->
                                                    <div id="basicsAccordion1">

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingTwo">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="secondStylishRadio1" data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                                                        Cash on Dalivary
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                                                <div class="p-4">
                                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingThree">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="thirdstylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="thirdstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false" aria-controls="basicsCollapseThree">
                                                                        Card Payment
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->

                                                        <!-- Card -->
                                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                                            <div class="p-3" id="basicsHeadingFour">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="FourstylishRadio1" name="stylishRadio">
                                                                    <label class="custom-control-label form-label" for="FourstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false" aria-controls="basicsCollapseFour">
                                                                        PayPal <a href="#" class="text-blue">What is PayPal?</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="basicsCollapseFour" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingFour" data-parent="#basicsAccordion1">
                                                                <div class="p-4">
                                                                    Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Card -->
                                                    </div>
                                                    <!-- End Basics Accordion -->
                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required data-msg="Please agree terms and conditions." data-error-class="u-has-error" data-success-class="u-has-success">
                                                        <label class="form-check-label form-label" for="defaultCheck10">
                                                            I have read and agree to the website <a href="#" class="text-blue">terms and conditions </a>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Place order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
            <!--Middle Part End -->
        </div>
    </div>
    <!-- //Main Container -->



    @include('layouts.front-inc.footer')

    @endsection

    @push('scripts')

    @endpush
