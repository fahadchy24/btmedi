@extends('layouts.admin_app')

@section('title', 'Customer List')

@push('css')

<style>
    .hello
    {
        font-family: Open Sans, sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;

        margin: 0;

        text-align: left;

        color: #525f7f;
        background-color: #f8f9fe;
    }
</style>

@endpush

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Customers</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('customer.index')}}">Customer List</a></li>
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
                    <h3 class="mb-0">Customer List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl</th>
                                <th>Account Type</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Company</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip Code</th>
                                <th>Phone Number</th>
                                <th>Fax Number</th>
                                <th>Email Address</th>
                                <th>Reseller Permit Number</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $customers as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $row->userType }}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->company}}</td>
                                <td>{{ $row->address_1 }}</td>
                                <td>{{ $row->city }}</td>
                                <td>{{ $row->state }}</td>
                                <td>{{ $row->postcode }}</td>
                                <td>{{ $row->telephone }}</td>
                                <td>{{ $row->fax }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->reseller_permit_number }}</td>
                                <td>{{ $row->isActive ==0 ? 'Inactive' : 'Active' }}</td>
                                {{-- <td>{{ $row->note }}</td> --}}
                                <td>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($row->note), 20) }}
                                    @if (strlen(strip_tags($row->note)) > 50)
                                    ... <a href="#" class="btn btn-info btn-sm read-more">Read More</a>
                                    @endif
                                <td>
                                    <a title="Edit Customer" class="btn btn-sm btn-primary" href="{{ route('customer.edit' ,$row->id)}}"><i class="fas fa-edit"></i></a>
                                    <a title="Delete Customer" class="btn btn-sm btn-danger" id="delete" href="{{ route('customer.delete' ,$row->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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