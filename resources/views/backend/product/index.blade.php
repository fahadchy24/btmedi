@extends('layouts.admin_app')

@section('title', 'All Products')

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
                    <h3 class="mb-0 float-left">Product List</h3>
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-success text-white float-right">Add New</a>
                </div>
                <!-- Excel product -->
                <div class="card-header">
                    <h3 class="mb-0 float-left">Product Upload By Excel Sheet</h3>
                    <form action="{{ route('product.import') }}" method="POST" name="importform"
                        enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-success">Import Product</button>
                     </form>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl No.</th>
                                <th>Category</th>
                                <th>MPN</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>SKU</th>
                                <th>UPC</th>
                                <th>Manufactory</th>
                                <th>Brand</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Inventory</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $products as $row)
                            <tr>
                                <td> {{$loop->index+1}} </td>
                                <td>
                                    @foreach($row->categories as $category)
                                      <span class="badge badge-primary">{{ $category->category_name }}</span>
                                    @endforeach
                                </td>
                                <td>{{$row->mpn}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>
                                    <img src="{{asset('uploads/frontend/image/product/'.$row->main_image) }}" width="80" height="60" alt="">
                                </td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->unit_per_cost}}</td>
                                <td>{{$row->manufactory}}</td>
                                @if ($row->brand_id == NULL)
                                <td>-</td>
                                @else
                                <td>{{ $row->brand->title}}</td>
                                @endif
                                <td>{{$row->cost}}</td>
                                <td>{{$row->regular_price}}</td>
                                <td>{{$row->stock_quantity}}</td>
                                <td>
                                    <label class="custom-toggle  custom-toggle-red">
                                    <input type="checkbox" id="status" data-id={{ $row->id }} {{ $row->status ==1 ? 'checked' : '' }}>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a title="Add Attribute" class="btn btn-sm btn-warning" href="{{ url('admin/products/add-attributes/'.$row->id)}}"><i class="fas fa-plus"></i></a>
                                    <a title="View Product" class="btn btn-sm btn-primary" href="{{ url('admin/products/view/'.$row->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a title="Edit Product" class="btn btn-sm btn-info" id="edit" href="{{ url('admin/products/edit/'.$row->id)}}"><i class="fas fa-edit"></i></a>
                                <a title="Delete Product" class="btn btn-sm btn-danger" id="delete" href="{{ url('admin/products/delete/'.$row->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
