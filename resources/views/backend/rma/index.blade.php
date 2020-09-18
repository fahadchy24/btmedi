@extends('layouts.admin_app')

@section('title', 'RMA')

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
                            <li class="breadcrumb-item active"><a href="{{route('rma.index')}}">RMA</a></li>
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
                            <h3 class="mb-4">Create an RMA</h3>
                            <form action="{{ route('rma.save') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="order_id">Input a order number</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="note">Reason of RMA</label>
                                    <input type="text" class="form-control" id="note" name="note" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Remark</label>
                                    <select class="form-control" id="remark" name="remark" required>
                                      <option disabled selected>Select a type</option>
                                      <option value="Refund">Refund</option>
                                      <option value="Replacement">Replacement</option>
                                      <option value="Store Credit">Store Credit</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All RMA</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>RMA Number</th>
                                <th>Created Date</th>
                                <th>Order No.</th>
                                <th>Contact Email</th>
                                <th>Issued By</th>
                                <th>Remark</th>
                                <th>Restocking Fee</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th style="width: 10px!important;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $rma as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td> {{ $row->rma_number }} </td>
                                <td>{{$row->created_at}}</td>
                                <td>{{ "BT-#". $row->order_id}}</td>
                                {{--  <td>{{$row->order->email}}</td>  --}}
                                <td>{{$row->email}}</td>
                                <td>{{ $row->issued_by == 7 ? 'Super Admin' : Auth::user()->id }}</td>
                                <td>{{$row->remark}}</td>
                                <td>{{$row->restocking_fee}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->note}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" id="edit" href="#">Complete</a>
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
<!-- End Main Content -->
@endsection