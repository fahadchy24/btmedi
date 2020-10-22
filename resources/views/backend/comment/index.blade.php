@extends('layouts.admin_app')

@section('title', 'All Comment')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Comments</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('comment.index')}}">All Comment</a></li>
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
                    <h3 class="mb-0">Comment List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>SL.</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                {{--  <th>Customer Rating</th>  --}}
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $comments as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->product->product_name}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{ $row->email }}</td>
                                {{--  <td>{{ $row->rating }}</td>  --}}
                                <td>
                                    <label class="custom-toggle  custom-toggle-red">
                                        <input type="checkbox" id="status" data-id={{ $row->id }} {{ $row->status ==1 ? 'checked' : '' }}>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('admin/comment/view/'.$row->id)}}">View</a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ url('admin/comment/delete/'.$row->id)}}">Delete</a>
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
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BTCare</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
<!-- End Main Content -->
@endsection

@push('scripts')

<script>
    $('body').on('change', '#status', function(){
        var id = $(this).attr('data-id');
        if(this.checked) {
            var status = 1;
        }
        else {
            var status = 0;
        }

        $.ajax({
            url : 'status/'+id+'/'+status,
            method : 'get',
            success : function(data) {
                toastr.success("{{ Session::get('message', 'Status has been updated') }}");
            }
        });

    });
</script>

@endpush