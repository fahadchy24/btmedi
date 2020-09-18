@extends('layouts.admin_app')

@section('title', 'Deactivated Products')

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
                            <li class="breadcrumb-item active"><a href="{{route('product.index')}}">All Products</a></li>
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
                    <h3 class="mb-0">Deactivated Product List</h3>
                </div>
                <div class="col-12">
                <a href="{{route('product.create')}}" class="btn btn-sm btn-success mt-2 mr-3 text-white float-right">Add New</a>
            </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl No.</th>
                                <th>Product No.</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>SKU</th>
                                <th>Inventory</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Cost</th>
                                <th>Store Price</th>
                                <th>Discount Price</th>
                                <th>Special Price</th>
                                <th>Wholesale Price</th>
                                <th>Brand</th>
                                <th>Sub Category</th>
                                <th>Category</th>
                                <th>Menu</th>
                                <th>API</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $product as $row)
                            <tr>
                                <td> {{$loop->index+1}} </td>
                                <td>TCH-{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <img src="{{asset('public/frontend/images/product/'.$row->image) }}" width="80" height="60" alt="">
                                </td>
                                <td>{{$row->sku}}</td>
                                <td>0</td>
                                <td>{{$row->details}}</td>
                                <td>
                                    <label class="custom-toggle  custom-toggle-white">
                                    <input type="checkbox" id="status" data-id={{ $row->id }} {{ $row->status == 0 ? 'unchecked' : '' }}>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                                <td>{{$row->cost}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->discount == NULL ? '-' : $row->discount }}</td>
                                <td>{{$row->special_price == NULL ? '-' : $row->special_price }}</td>
                                <td>{{$row->wholesale_price}}</td>
                                <td>{{$row->brand == NULL ? '-' : $row->brand }}</td>
                                <td>{{$row->subcategory_id == 0 ? '-' : $row->subcategory->name}}</td>
                                <td>{{$row->category->name}}</td>
                                <td>{{$row->menu->name}}</td>
                                <td>{{$row->api == NULL ? '-' : $row->api }}</td>
                                <td>{{$row->note == NULL ? '-' : $row->note }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('admin/products/view/'.$row->id)}}">View</a>
                                    <a class="btn btn-sm btn-info" id="edit" href="{{ url('admin/products/edit/'.$row->id)}}">Edit</a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ url('admin/products/delete/'.$row->id)}}">Delete</a>
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
            url : 'product/status/'+id+'/'+status,
            method : 'get',
            success : function(data) {
                toastr.success("{{ Session::get('message', 'Status has been updated') }}");
            }
        });

    });
</script>
@endpush