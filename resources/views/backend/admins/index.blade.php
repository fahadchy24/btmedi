@extends('layouts.admin_app')

@section('title', 'Manage Roles')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Staffs</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('manage.role')}}">Manage Roles</a></li>
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
                            <h3 class="">Add Role</h3>
                            <form action="#" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="status"> </label>
                                    <select class="form-control" id="status" name="order_type" required>
                                      <option disabled selected>Select a type</option>
                                      <option value="Admin">Admin</option>
                                      <option value="Subadmin">Sub Admin</option>
                                      <option value="Manager">Manager</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">First Name</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">last Name</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">Username</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">Email</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">Input a number</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">INPUT ITEM</button>
                            </form>
                            </div>
                        </div>
                    </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All Roles</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>First Name</th>
                                <th>last Name</th>
                                <th>Username</th>
                                <th>Email By</th>
                                <th>Status</th>
                                {{-- @if(Auth::guard('admin')->user()->type=='Superadmin') --}}
                                <th style="width: 10px!important;">Actions</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $viewRoles as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->type}}</td>
                                <td>{{$row->firstName}}</td>
                                <td>{{$row->lastName}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->status}}</td>
                                {{-- @if(Auth::guard('admin')->user()->type=='Superadmin') --}}
                                <td>
                                    <a class="btn btn-sm btn-primary" id="edit" href="#">Edit</a>
                                    <a class="btn btn-sm btn-primary" id="delete" href="#">Delete</a>
                                </td>
                                {{-- @endif --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection