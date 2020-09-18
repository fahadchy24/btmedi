@extends('layouts.admin_app')

@section('title', 'Add Vendor')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('vendor.index')}}">Vendor</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('manage.role')}}">Add New</a></li>
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
                            <h3 class="mb-0">Add Vendor</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vendor.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required>
                                    @error('name')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input type="email" class="form-control @error('name') is-invalid @enderror" id="email" name="email" autocomplete="off" required>
                                    @error('email')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Phone Number</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="phone" name="phone" autocomplete="off" required>
                                    @error('phone')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address">Address</label>
                                    <textarea class="form-control @error('name') is-invalid @enderror" name="address" id="address"></textarea>
                                    @error('address')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Remark</label>
                                    <textarea class="form-control" name="remark" id="remark"></textarea>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection