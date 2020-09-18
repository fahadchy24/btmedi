@extends('layouts.admin_app')

@section('title', 'Edit Coupon')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Coupons</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Edit Coupon</a></li>
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
        <!-- Add Coupon -->
        <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit Coupon</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('coupons.update', $couponEdit->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="userType">Coupon Type</label>
                                    <select class="form-control" id="coupon_type" name="coupon_type" required>
                                        <option value="{{ $couponEdit->coupon_type }}" selected>{{ $couponEdit->coupon_type }}</option>
                                      <option value="Fixed">Fixed</option>
                                      <option value="Percentage">Percentage</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="coupon_code">Coupon Code</label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ $couponEdit->coupon_code }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="coupon_amount">Coupon Amount</label>
                                    <input type="number" class="form-control" id="coupon_amount" name="coupon_amount" value="{{ $couponEdit->coupon_amount }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="expiry_date">Expiry Date</label>
                                    <input type="text" class="form-control datepicker" id="expiry_date" name="expiry_date" value="{{ $couponEdit->expiry_date }}">
                                </div>
                                <div class="form-group">
                                    <div class="mt-5 mb-5">
                                        <label class="form-control-label mr-4" for="status">Status:</label>
                                        <input type="checkbox" class="form-control-input" id="status" name="status" value="1" @if($couponEdit->status ==1) checked @endif>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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

<script>
    $("#expiry_date").datepicker({ 
        minDate: 0,
        dateFormat: 'yy-mm-dd'
    });
</script>

@endpush