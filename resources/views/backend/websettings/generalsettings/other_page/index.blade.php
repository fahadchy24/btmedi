@extends('layouts.admin_app')

@section('title', 'Add Page')

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
                            <li class="breadcrumb-item active" aria-current="page">Add Page</li>
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
                        <h3>Add New Page</h3>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('other-page')}}" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="Menu Name">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Description">Meta Description</label>
                            <input type="text" class="form-control" name="meta_desciption">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="page_type">Page Template</label>
                            <select class="form-control" id="page_type" name="page_type">
                              <option disabled selected>Select a type</option>
                              <option value="Basic Page">Basic Page</option>
                              <option value="About Page">About Page</option>
                              <option value="Product Page">Product Page</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="URL Link">Slug</label>
                            <input type="text" class="form-control" name="page_url">
                        </div>
                        <div class="form-group"><label for="description" class="form-control-label">Page Content</label>
                            <textarea class="form-control" id="summary-ckeditor" name="page_content" placeholder="Description"></textarea>
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input class="custom-control-input" id="customCheck1" type="checkbox" name="status" value="1">
                            <label class="custom-control-label" for="customCheck1">Enable</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="card bg-secondary">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Other Pages</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th class="text-center">Meta Title</th>
                                <th class="text-center">Page Type</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($otherPage) > 0)
                            @foreach($otherPage as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td class="text-center">{{$row->meta_title}}</td>
                                <td class="text-center">{{$row->page_type}}</td>
                                <td class="text-center">{{$row->page_url}}</td>
                                <td class="text-center">
                                    @if($row->status==1)
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                <td class="text-center">
                                    <a href="{{ route('edit-other-page',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-other-page',$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No entries in table</td>
                            </tr>     
                        @endif
                        </tbody>
                    </table>
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