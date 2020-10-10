@extends('layouts.admin_app')

@section('title', 'Canceled RMA')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">RMA</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('canceled.rma')}}">Canceled RMA</a></li>
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
                <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All Canceled RMA</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>RMA</th>
                                <th>Created Date</th>
                                <th>Order No.</th>
                                <th>Contact Email</th>
                                <th>Issued By</th>
                                <th>Created By</th>
                                <th>Remark</th>
                                <th style="width: 10px!important;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $rma as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->rma_number}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{ $row->order_number}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{ $row->issued_by == 7 ? 'Super Admin' : Auth::user()->id }}</td>
                                <td>{{ $row->issued_by == 7 ? 'Super Admin' : Auth::user()->id }}</td>
                                <td>{{$row->remark}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" id="edit" href="{{ url('admin/rma/edit/'.$row->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary" id="delete" href="{{ url('admin/rma/delete/'.$row->id) }}">Delete</a>
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
    </div>
</div>
<!-- End Main Content -->
@endsection