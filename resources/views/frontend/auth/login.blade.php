@extends('layouts.app')

@section('title', 'Login')

@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Login</a></li>
    </ul>

    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="page-login">

                <div class="account-border">
                    <div class="row">
                        <div class="col-sm-6 new-customer">
                            <div class="well">
                                <h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            </div>
                            <div class="bottom-form">
                                <a href="{{ route('user.register') }}" class="btn btn-default pull-right">Continue</a>
                            </div>
                        </div>

                        <form action="{{ route('login') }}" method="post">@csrf
                            <div class="col-sm-6 customer-login">
                                <div class="well">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
                                    <p><strong>I am a returning customer</strong></p>
                                    <div class="form-group">
                                        <label class="control-label " for="input-email">E-Mail Address</label>
                                        <input type="text" name="email" value="" id="input-email" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label " for="input-password">Password</label>
                                        <input type="password" name="password" value="" id="input-password" class="form-control" />
                                    </div>
                                </div>
                                <div class="bottom-form">
                                    <a href="#" class="forgot">Forgotten Password</a>
                                    <input type="submit" value="Login" class="btn btn-default pull-right" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->

@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush
