@extends('layouts.admin_app')

@section('title', 'Social Links')

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
                            <li class="breadcrumb-item active" aria-current="page">Social Links</li>
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
            <h3 class="mb-0">Social Links</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('social-links', $socialdata->id) }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label class="control-label col-2" for="facebook">Facebook *</label>
                    <div class="col-6">
                        <input class="form-control" name="facebook" id="facebook" placeholder="http://facebook.com/" required="" type="text" value="{{$socialdata->facebook}}">
                    </div>
                    <div class="col-4">
                        <label class="custom-toggle custom-toggle-red mt-2">
                            <input type="checkbox" name="f_status" value="1" {{$socialdata->f_status==1 ? "checked":""}}>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-2" for="instagram">Instagram *</label>
                    <div class="col-6">
                        <input class="form-control" name="instagram" id="instagram" placeholder="http://instagram.com/" required="" type="text" value="{{$socialdata->instagram}}">
                    </div>
                    <div class="col-4">
                        <label class="custom-toggle custom-toggle-red mt-2">
                            <input type="checkbox" name="i_status" value="1" {{$socialdata->i_status==1 ? "checked":""}}>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-2" for="twitter">Twitter *</label>
                    <div class="col-6">
                        <input class="form-control" name="twitter" id="twitter" placeholder="http://twitter.com/" required="" type="text" value="{{$socialdata->twitter}}">
                    </div>
                    <div class="col-4">
                        <label class="custom-toggle custom-toggle-red mt-2">
                            <input type="checkbox" name="t_status" value="1" {{$socialdata->t_status==1 ? "checked":""}}>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-2" for="pinterest">Pinterest *</label>
                    <div class="col-6">
                        <input class="form-control" name="pinterest" id="pinterest" placeholder="http://pinterest.com/" required="" type="text" value="{{$socialdata->pinterest}}">
                    </div>
                    <div class="col-4">
                        <label class="custom-toggle custom-toggle-red mt-2">
                            <input type="checkbox" name="p_status" value="1" {{$socialdata->p_status==1 ? "checked":""}}>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
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