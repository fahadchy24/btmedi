@extends('layouts.admin_app')

@section('title', 'Brand')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Brand</li>
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
                    <h3 class="mb-0">Brand</h3>
                </div>
                <div class="col-12">
                    <a href="{{route('brand.create')}}" class="btn btn-sm btn-success mt-2 mr-3 text-white float-right">ADD</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="">

                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Brand Title</th>
                                <th>Brand Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_brands as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->title}}</td>
                                <td>
                                    @if($row->image >NULL) 
                                    <img src="{{asset('uploads/frontend/image/brand/'.$row->image) }}" width="100" height="60" alt="">
                                    @else 
                                    No Image Available
                                    @endif
                                </td>
                                <td>
                                    <label class="custom-toggle  custom-toggle-red">
                                        <input type="checkbox" id="status" data-id={{ $row->id }} {{ $row->status ==1 ? 'checked' : '' }}>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ url('admin/product/brands/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>

                                    <a href="{{ url('admin/product/brands/delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Tech88</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- End Main Content -->

@endsection

@push('scripts')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

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
            url : 'brands/status/'+id+'/'+status,
            method : 'get',
            success : function(data) {
                toastr.success("{{ Session::get('message', 'Status has been updated') }}");
            }
        });

    });
</script>

@endpush
