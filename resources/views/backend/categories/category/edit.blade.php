@extends('layouts.admin_app')

@section('title', 'Product | Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
    <div class="row">
        <div class="col-xl-12">
            <!-- Add Category -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Catagory</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('update-category', $editCategory->id) }}" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name*</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $editCategory->category_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="text" class="form-control" name="category_url" value="{{ $editCategory->category_url }}">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Category_Thumbnail_Image">Category Thumbnail Image &nbsp;<small>(Default size:210x270px)</small></label>
                                <input type="file" name="thumbnail_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <img src="{{ $editCategory->thumbnail_image }}" style="width:200;height:150px;">
                                <input type="hidden" name="old_thumbnail" value="{{$editCategory->thumbnail_image}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Category_Cover_Image">Category Cover Image &nbsp;<small>(Default size:870x220px)</small></label>
                                <input type="file" name="cover_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <img src="{{ $editCategory->cover_image }}" style="width:200px;height:150px;">
                                <input type="hidden" name="old_cover" value="{{ $editCategory->cover_image }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Priority*</label>
                            <input type="text" class="form-control" name="priority" value="{{$editCategory->priority}}">
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input checked" id="customCheck1" type="checkbox" name="status" value="1" @if($editCategory->status ==1) checked @endif>
                            <label class="custom-control-label" for="customCheck1">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush