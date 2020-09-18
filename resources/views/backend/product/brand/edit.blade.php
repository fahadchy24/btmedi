@extends('layouts.admin_app')

@section('title', 'Brand')

@section('content')
<!-- Start Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brand</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
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
                        <h3>Edit Brand</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/product/brands/update/'.$editBrand->id)}}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{ $editBrand->id }}">
                        <div class="form-group">
                            <label class="form-control-label" for="Slider_title">Brand Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $editBrand->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select New Brand Image</label><br>
                            <img src="#" alt="" id="image">
                            <input type="file" name="image" accept="image/*" class="upload" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('uploads/frontend/image/brand/'.$editBrand->image) }}" style="width:80px;height:80px;">
                            <input type="hidden" name="old_photo" value="{{$editBrand->image}}">
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input class="custom-control-input checked" id="customCheck1" type="checkbox" name="status" value="1" @if($editBrand->status ==1) checked @endif>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endpush
