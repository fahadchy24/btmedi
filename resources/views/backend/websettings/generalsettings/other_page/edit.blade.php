@extends('layouts.admin_app')

@section('title', 'Edit Page')

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
                            <li class="breadcrumb-item"><a href="{{route('other-page')}}">Other Page</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
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
                    <div class="text-muted">
                        <h3>Edit Page</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('update-other-page',$editPage->id)}}" role="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $editPage->meta_title }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Description">Meta Description</label>
                            <textarea class="form-control" name="meta_desciption" id="meta_desciption">{{ $editPage->meta_desciption }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="page_type">Page Template</label>
                            <select class="form-control" id="page_type" name="page_type">
                                @if($editPage->page_type == 'Basic Page' )
                                    <option value="{{$editPage->page_type}}" selected>{{$editPage->page_type}}</option>
                                    <option value="About Page">About Page</option>
                                    <option value="Product Page">Product Page</option>
                                @endif
                                @if($editPage->page_type == 'About Page' )
                                    <option value="{{$editPage->page_type}}" selected>{{$editPage->page_type}}</option>
                                    <option value="Basic Page">Basic Page</option>
                                    <option value="Product Page">Product Page</option>
                                @endif
                                @if($editPage->page_type == 'Product Page' )
                                    <option value="{{$editPage->page_type}}" selected>{{$editPage->page_type}}</option>
                                    <option value="Basic Page">Basic Page</option>
                                    <option value="About Page">About Page</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="page_url">Slug</label>
                            <input id="page_url" type="text" class="form-control" name="page_url" value="{{ $editPage->page_url }}">
                        </div>
                        <div class="form-group"><label for="description" class="form-control-label">Page Content</label>
                            <textarea class="form-control" id="summary-ckeditor" name="page_content">{{ $editPage->page_content }}</textarea>
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input class="custom-control-input" id="customCheck1" type="checkbox" name="status" value="1" @if($editPage->status ==1) checked @endif>
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

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('summary-ckeditor');

    </script>

@endpush