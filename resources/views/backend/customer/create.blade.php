@extends('layouts.admin_app')

@section('title', 'Create New Customer')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Customers</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Create New Customer</a></li>
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
                            <h3 class="mb-0">Create New Customer</h3>
                        </div>
                        <div class="card-body">
                        <form action="{{route('customer.store')}}" method="POST">
                        @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="form-control-label" for="userType">Account Type*</label>
                                <select class="form-control" id="userType" name="userType" required>
                                    <option disabled selected>Select a type</option>
                                    <option value="Wholesale">Wholesale</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Medical Industry">Medical Industry</option>
                                    <option value="School">School</option>
                                    <option value="Government">Government</option>
                                    <option value="Non-Profit">Non-Profit</option>
                                    <option value="General">General User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="last_name">Last Name*</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="first_name">First Name*</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="company">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="address_1">Address*</label>
                                <textarea class="form-control" name="address_1" id="address_1" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="city">City*</label>
                                <input type="text" class="form-control" id="city" name="city" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="state">State*</label>
                                <input type="text" class="form-control" id="state" name="state" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="postcode">Zip Code*</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Phone Number*</label>
                                <input type="tel" class="form-control" id="phone" name="phone" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="fax">Fax Number</label>
                                <input type="tel" class="form-control" id="fax" name="fax" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email Address*</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="reseller_permit_number">Reseller Permit Number</label>
                                <input type="text" class="form-control" id="reseller_permit_number" name="reseller_permit_number" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="expiration_date">Expiration Date</label>
                                <input type="text" class="form-control datepicker" id="expiration_date" name="expiration_date" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="mt-5 mb-5">
                                    <label class="form-control-label mr-4" for="exampleCheck1">Taxable:</label>
                                    <input type="radio" class="form-control-input" id="exampleCheck1" name="taxable" value="1">
                                    Yes
                                    &nbsp;
                                    &nbsp;
                                    <input type="radio" class="form-control-input" id="exampleCheck1" name="taxable" value="0">
                                    No    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="note">Note</label>
                                <textarea class="form-control" name="note" id="note"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection