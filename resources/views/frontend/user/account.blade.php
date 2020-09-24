@extends('layouts.app')

@section('title', '')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">My Account</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h2 class="title">My Account</h2>
            <p class="lead">Hello, <strong>{{ Auth::user()->first_name }}</strong> - To update your account information.</p>
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="personal-details">
                            <legend>Personal Details</legend>
                            <div class="form-group required">
                                <label for="input-firstname" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="{{ Auth::user()->first_name }}" name="firstname">
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="{{ Auth::user()->last_name }}" name="lastname">
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="control-label">E-Mail</label>
                                <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="{{ Auth::user()->email }}" name="email">
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="control-label">Telephone</label>
                                <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="{{ Auth::user()->telephone }}" name="telephone">
                            </div>
                            <div class="form-group">
                                <label for="input-fax" class="control-label">Fax</label>
                                <input type="text" class="form-control" id="input-fax" placeholder="Fax" value="{{ Auth::user()->fax }}" name="fax">
                            </div>
                        </fieldset>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Change Password</legend>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Old Password</label>
                                <input type="password" class="form-control" placeholder="Old Password" value="" name="old-password">
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">New Password</label>
                                <input type="password" class="form-control" placeholder="New Password" value="" name="password">
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">New Password Confirm</label>
                                <input type="password_confrimation" class="form-control" id="input-confirm" placeholder="New Password Confirm" value="" name="new-confirm">
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Newsletter</legend>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
                                <div class="col-md-10 col-sm-9 col-xs-9">
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="newsletter"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" checked="checked" value="0" name="newsletter"> No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="address">
                            <legend>Payment Address</legend>
                            <div class="form-group">
                                <label for="input-company" class="control-label">Company</label>

                                <input type="text" class="form-control" placeholder="Company" value="{{ Auth::user()->company }}" name="company">

                            </div>
                            <div class="form-group required">
                                <label for="input-address-1" class="control-label">Address 1</label>
                                <input type="text" class="form-control" placeholder="Address 1" value="{{ Auth::user()->address_1 }}" name="address_1">
                            </div>
                            <div class="form-group required">
                                <label for="input-postcode" class="control-label">Post Code</label>
                                <input type="text" class="form-control" placeholder="Post Code" value="{{ Auth::user()->postcode }}" name="postcode">
                            </div>
                            <div class="form-group required">
                                <label for="input-country" class="control-label">Country</label>
                                <select class="form-control" name="country">
                                    <option value="{{ Auth::user()->country }}" selected="">{{ Auth::user()->country }}</option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="control-label">State</label>
                                <select class="form-control" name="state">
                                    <option value="{{ Auth::user()->state }}" selected="">{{ Auth::user()->state }}</option>
                                    <option value="3513">Aberdeen</option>
                                    <option value="3514">Aberdeenshire</option>
                                    <option value="3515">Anglesey</option>
                                    <option value="3516">Angus</option>
                                    <option value="3517">Argyll and Bute</option>
                                    <option value="3518">Bedfordshire</option>
                                    <option value="3519">Berkshire</option>

                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="control-label">City</label>
                                <select class="form-control" name="city">
                                    <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->state }}</option>
                                    <option value="Aberdeenshire">Aberdeenshire</option>
                                    <option value="Anglesey">Anglesey</option>
                                    <option value="Anglesey">Anglesey</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset id="shipping-address">
                            <legend>Shipping Address</legend>
                            <div class="form-group">
                                <label for="input-company" class="control-label">Company</label>
                                <input type="text" class="form-control" id="input-company" placeholder="Company" value="{{ Auth::user()->company }}" name="company">
                            </div>
                            <div class="form-group required">
                                <label for="input-address-1" class="control-label">Address 1</label>
                                <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="{{ Auth::user()->address_1 }}" name="address_1">
                            </div>
                            <div class="form-group required">
                                <label for="input-city" class="control-label">City</label>
                                <input type="text" class="form-control" id="input-city" placeholder="City" value="{{ Auth::user()->city }}" name="city">
                            </div>
                            <div class="form-group required">
                                <label for="input-postcode" class="control-label">Post Code</label>
                                <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="{{ Auth::user()->postcode }}" name="postcode">
                            </div>
                            <div class="form-group required">
                                <label for="input-country" class="control-label">Country</label>
                                <select class="form-control" id="input-country" name="country">
                                    <option value="{{ Auth::user()->country }}" selected="">{{ Auth::user()->country }}</option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="control-label">Region / State</label>
                                <select class="form-control" id="input-zone" name="state">
                                    <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->state }}</option>
                                    <option value="Aberdeenshire">Aberdeenshire</option>
                                    <option value="Anglesey">Anglesey</option>
                                    <option value="Anglesey">Anglesey</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End-->
        <!--Right Part Start -->
        <aside class="col-sm-3 hidden-xs" id="column-right">
            <h2 class="subtitle">Account</h2>
            <div class="list-group">
                <ul class="list-item">
                    <li><a href="#">Forgotten Password</a>
                    </li>
                    <li><a href="#">Address Books</a>
                    </li>
                    <li><a href="{{ route('wish.list', Auth::user()->id) }}">Wish List</a>
                    </li>
                    <li><a href="{{ route('order.history', Auth::user()->id) }}">Order History</a>
                    </li>
                    <li><a href="return.html">Returns</a>
                    </li>
                    <li><a href="#">Newsletter</a>
                    </li>
                </ul>
            </div>
        </aside>
        <!--Right Part End -->
    </div>
</div>
<!-- //Main Container -->

@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush
