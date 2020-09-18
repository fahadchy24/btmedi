@extends('layouts.admin_app')

@section('title', 'Inventory List')

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
                    <h3 class="mb-0 float-left">Inventory List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl No.</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Inventory</th>
                                <th>Location</th>
                                <th>RFID</th>
                                <th>Sale (Week 1)</th>
                                <th>Sale (Week 2)</th>
                                <th>Sale (Week 3)</th>
                                <th>Sale (Month)</th>
                                <th>Sale Avg.</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $products as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>-</td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->stock_quantity}}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>1000.00</td>
                                <td>1000.00</td>
                                <td>1000.00</td>
                                <td>1000.00</td>
                                <td>1000.00</td>
                                <td>Dolor sit amet, consectetur adipisicing elit.</td>
                                <td>
                                    <a class="btn btn-sm btn-info" id="edit" href="{{-- {{ url('admin/products/edit/'.$row->id)}} --}}#"><i class="fas fa-edit"></i></a>
                                    <a title="Delete Product" class="btn btn-sm btn-danger" id="delete" href="{{-- {{ url('admin/products/delete/'.$row->id)}} --}}#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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