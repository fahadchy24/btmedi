@extends('layouts.admin_app')

@section('title', 'Office Address')

@section('content')
<!-- Start Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Settings</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">General Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Office Address</li>
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
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Office Address</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('office-address') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label class="control-label col-3" for="street">Street Address *</label>
                    <div class="col-8">
                        <textarea name="street" id="street_address" class="form-control" placeholder="Enter Street Address" style="resize: vertical;">{{$address->street}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="phone_one">Phone 1 *</label>
                    <div class="col-8">
                        <input class="form-control" name="phone_one" id="phone_one" placeholder="Enter Phone 1" required="" type="text" value="{{$address->phone_one}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="phone_two">Phone 2</label>
                    <div class="col-8">
                        <input class="form-control" name="phone_two" id="phone_two" placeholder="Enter Phone 2" type="text" value="{{$address->phone_two}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-3" for="email">Email *</label>
                    <div class="col-8">
                        <input class="form-control" name="email" id="email" placeholder="Enter Email" required="" type="email" value="{{$address->email}}">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
    <!-- Footer -->
    <footer class="footer pt-0 pl-2">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center text-lg-left text-muted">
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BT Medi</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- End Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush