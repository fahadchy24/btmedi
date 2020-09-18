@extends('layouts.admin_app')

@section('title', 'Coupons')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Coupons</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('coupons.index')}}">Coupons</a></li>
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
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Coupon List</h3>
                    <a href="{{route('coupons.create')}}" class="btn btn-sm btn-success text-white float-right">Add New</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>SL.</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Amount</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $coupons as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->coupon_code}}</td>
                                <td>{{$row->coupon_type}}</td>
                                <td>{{ $row->coupon_amount }}</td>
                                <td>{{ $row->expiry_date }}</td>
                                <td>{{ $row->status }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('coupons.edit', $row->id)}}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ url('admin/comment/delete/'.$row->id)}}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
    <!-- Footer -->
    <footer class="footer pt-0 pl-2">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center text-lg-left text-muted">
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BT Medi</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
<!-- End Main Content -->
@endsection