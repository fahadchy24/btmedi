@extends('layouts.admin_app')

@section('title', 'View Comment')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Comments</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">View Customer</a></li>
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
                            <h3 class="mb-0">View Comment</h3>
                            <a class="btn btn-sm btn-success float-right" href="{{ route('comment.index') }}">Go back</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-control-label" for="last_name">Product Name</label>
                                <input type="text" class="form-control" value="{{ $comments->product->product_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="first_name">Customer Name</label>
                                <input type="text" class="form-control" value="{{ $comments->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Customer Email</label>
                                <input class="form-control" value="{{ $comments->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="address_1">Comment Details</label>
                                <textarea class="form-control" readonly>{{ $comments->details }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="expiration_date">Comment Date</label>
                                <input type="text" class="form-control" value="{{ $comments->created_at->format('d M Y') }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection