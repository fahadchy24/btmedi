@extends('layouts.admin_app')

@section('title', 'Menu')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Settings</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">All Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
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
        <div class="col-xl-4">
            <!-- Add menu -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Menu</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('menu.store') }}" role="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Display Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Display Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="text" class="form-control" name="url" placeholder="Enter Menu URL">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- All Menu -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All Menu</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Menu</th>
                                <th>Slug</th>
                                <th style="width: 10px!important;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $all_menu as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->url}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" id="edit" href="{{ route('edit-menu',$row->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary" id="delete" href="{{ route('menu.destroy', $row->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection