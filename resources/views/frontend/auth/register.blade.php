@extends('layouts.app')

@section('title', 'Register')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Register</a></li>
    </ul>

    <div class="row">
        <div id="content" class="col-sm-12">
            <h2 class="title">Register Account</h2>
            <p>If you already have an account with us, please login at the <a href="{{ route('login') }}"> <b>login page</b></a>.</p>
            <form action="{{ route('user.register') }}" method="post" class="form-horizontal account-register clearfix">@csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">User Type</label>
                        <div class="col-sm-8">
                            <select name="userType" id="input-country" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                <option value="Wholesale">Wholesale</option>
                                <option value="Retail">Retail</option>
                                <option value="Medical Industry">Medical Industry</option>
                                <option value="School">School</option>
                                <option value="Government">Government</option>
                                <option value="Non-Profit">Non-Profit</option>
                                <option value="General User">General User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="first_name" value="" placeholder="First Name" id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="last_name" value="" placeholder="Last Name" id="input-lastname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                        <div class="col-sm-8">
                            <input type="tel" name="phone" value="" placeholder="Telephone" id="input-telephone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-fax">Fax</label>
                        <div class="col-sm-8">
                            <input type="text" name="fax" value="" placeholder="Fax" id="input-fax" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>Your Address</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-company">Company</label>
                        <div class="col-sm-8">
                            <input type="text" name="company" value="" placeholder="Company" id="input-company" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
                        <div class="col-sm-8">
                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-address-1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
                        <div class="col-sm-8">
                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-address-2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                        <div class="col-sm-8">
                            <select name="country" id="input-country" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                <option value="United States of America">United States of America</option>
                            </select>
                        </div>
                    </div>
                    @php  $states = App\State::all(); $cities = App\City::all(); @endphp
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-state">State</label>
                        <div class="col-sm-8">
                            <select name="state" id="input-state" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-city">City</label>
                        <div class="col-sm-8">
                            <select name="city" id="input-city" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                        <div class="col-sm-8">
                            <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-password">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Reseller <small>(*If you are a reseller)</small></legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="reseller_permit_number">Reseller Permit Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="reseller_permit_number" value="" placeholder="Reseller Permit Number" id="reseller_permit_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="expiration_date">Expiration Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date" autocomplete="off">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Newsletter</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subscribe</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="0" checked="checked"> No
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend></legend>
                    <div class="form-group">
                        {{--  <form action="?" method="POST">
                            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                            <br/>
                            <input type="submit" value="Submit">
                          </form>  --}}
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a href="/page/term-of-service" class="agree"><b>Terms of Service</b></a>
                        <input class="box-checkbox" type="checkbox" name="agree" value="1" required> &nbsp;
                        <input type="submit" value="Continue" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //Main Container -->

@include('layouts.front-inc.footer')

@endsection

@push('scripts')


@endpush
