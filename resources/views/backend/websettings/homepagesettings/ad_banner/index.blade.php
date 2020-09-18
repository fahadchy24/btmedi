@extends('layouts.admin_app')

@section('title', 'Ad Banner Setting')

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
                            <li class="breadcrumb-item"><a href="#">Homepage Settings</a></li>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Ad Banner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Add Slider -->
        <div class="col-12">
            <div class="card bg-secondary">
                <div class="card-header bg-transparent">
                    <div class="text-muted text-center">
                        <h3>Add New Ad Banner</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('ad-banner')}}" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="first_image">Banner First Image</label>
                            <input type="file" class="form-control" name="first_image" onchange="readURL1(this);">
                            <img src="{{asset('uploads/frontend/image/ad-banner/'.$ad_banners->first_image) }}" alt="">
                            <br>
                            <img style="margin:4px;" src="#" id="first_image" alt="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="second_image">Banner Second Image</label>
                            <input type="file" class="form-control" name="second_image" onchange="readURL2(this);">
                            <img src="{{asset('uploads/frontend/image/ad-banner/'.$ad_banners->second_image) }}" alt="">
                            <br>
                            <img style="margin:4px;" src="#" id="second_image" alt="">
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input class="custom-control-input" id="customCheck1" type="checkbox" name="status" value="1" {{ $ad_banners->status == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck1">Enable</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#first_image')
                    .attr('src', e.target.result)
                    .width(570)
                    .height(220);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#second_image')
                    .attr('src', e.target.result)
                    .width(570)
                    .height(220);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endpush
