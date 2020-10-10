@extends('layouts.admin_app')

@section('title', 'Edit RMA')

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
                            <li class="breadcrumb-item"><a href="{{route('rma.index')}}">All RMA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit RMA</li>
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
            <div class="col">
                <div class="card-wrapper">
                    <!-- Custom form validation -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit RMA</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action ="{{url('admin/rma/update/'.$rma_edit->id)}}" role="form" method="POST">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label class="form-control-label" for="name">RMA Number</label>
                                        <p>{{ $rma_edit->rma_number }}</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="sku">Ordered Date</label>
                                        <p>{{ $rma_edit->order->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="cost">Order Number</label>
                                        <p> {{ $rma_edit->order_number }}</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="price">Contact Email</label>
                                        <p> {{ $rma_edit->order->contact_email }} </p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="wholesale_price">Issued By</label>
                                        <p> {{ $rma_edit->issued_by == 7 ? 'Super Admin' : Auth::user()->id }}</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="remark">Remark</label>
                                        <input type="text" class="form-control" id="discount" name="remark" value="{{ $rma_edit->remark }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label" for="restocking_fee">Restocking Fee</label>
                                        <input type="text" class="form-control" id="restocking_fee" name="restocking_fee" value="{{ $rma_edit->restocking_fee }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    	<div class="form-group">
						                    <label class="form-control-label" for="status">Status</label>
                                            @if ($rma_edit->status == 'Waiting for approval')
                                            <select class="form-control" id="status" name="status" required>
                                              <option value="{{ $rma_edit->status }}" selected>{{ $rma_edit->status }} </option>
                                              <option value="Completed">Completed </option>
                                              <option value="Canceled">Canceled</option>
                                            </select>
                                            @endif
                                            @if ($rma_edit->status == 'Completed' )
						                    <select class="form-control" id="status" name="status" required>
                                                <option value="{{ $rma_edit->status }}" selected>{{ $rma_edit->status }} </option>
						                        <option value="Waiting for approval">Waiting for approval</option>
                                                <option value="Canceled">Canceled</option>
                                            </select>
                                            @endif
                                            @if ($rma_edit->status == 'Canceled' )
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="{{ $rma_edit->status }}" selected>{{ $rma_edit->status }} </option>
                                                <option value="Waiting for approval" selected>Waiting for approval</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                            @endif
						                </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update RMA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection