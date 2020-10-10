@extends('layouts.admin_app')

@section('title', 'Call Logs')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Call Logs</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('call-log')}}">Call Logs List</a></li>
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
                    <h3 class="mb-0">Call Logs</h3>
                </div>
                <div class="col-12">
                <a href="{{route('call-log-add')}}" class="btn btn-sm btn-success mt-2 mr-3 text-white float-right">Add New</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>No of Cases</th>
                                <th>Company</th>
                                <th>Issue Date</th>
                                <th>Created By</th>
                                <th>Note</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $callLog as $row)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td>{{ $row->first_name ." ". $row->last_name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->noc }}</td>
                                <td>{{ $row->company }}</td>
                                <td>{{ $row->issue_date }}</td>
                                <td>{{ $row->created_by == 1 ? "Super Admin" : '' }}</td>
                                <td>
                                {{ \Illuminate\Support\Str::limit(strip_tags($row->note), 20) }}
                                @if (strlen(strip_tags($row->note)) > 20)
                                <a href="{{ url('admin/call-log/edit/'.$row->id)}}" class="btn btn-sm btn-primary-outline read-more">Read More</a>
                                @endif
                                </td>
                                <td>{{ $row->userType }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('admin/call-log/edit/'.$row->id)}}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ url('admin/call-log/delete/'.$row->id)}}"><i class="fa fa-trash"></i></a>
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
                    © {{ date('Y') }} <a href="#" class="font-weight-bold ml-1">BTCare Supply</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
<!-- End Main Content -->
@endsection