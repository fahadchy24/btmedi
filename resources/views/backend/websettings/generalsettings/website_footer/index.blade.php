@extends('layouts.admin_app')

@section('title', 'Website Footer')

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
                            <li class="breadcrumb-item active" aria-current="page">Website Footer</li>
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
            <h3 class="mb-0">Website Footer</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('website-footer') }}" method="POST">
            @csrf
                <div class="form-group">
                    <textarea class="form-control" id="website_footer" rows="2" name="website_footer" resize="none">{{ $website_footer->website_footer }}</textarea>
                </div>
                <div class="col mt-3">
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

