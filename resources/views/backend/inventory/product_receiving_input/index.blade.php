@extends('layouts.admin_app')

@section('title', 'Product Receiving Input')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{route('product-receive.index')}}">Product Receiving Input</a></li>
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
                    <h3 class="mb-0 float-left">Product Received List</h3>
                    <a class="btn btn-sm btn-primary mb-0 float-right" href="{{route('product-receive.create')}}">Add New</a>
                </div>
                <!-- Excel product -->
                <div class="card-header">
                    <h3 class="mb-0 float-left">Product Receive Upload By Excel Sheet</h3>
                    <form action="{{ route('inventory.import') }}" method="POST" name="importform"
                        enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-success">Import Product Receive</button>
                     </form>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl</th>
                                <th>Receiving date</th>
                                <th>Vendor Name</th>
                                <th>BOL/Tracking Number</th>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $productReceive as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->receive_date}}</td>
                                <td>{{$row->vendor->name}}</td>
                                <td>{{$row->tracking_number}}</td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->product_name}}</td>
                                {{-- <td>{{$row->product->sku}}</td>
                                <td>{{$row->product->product_name}}</td> --}}
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->cost}}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" id="edit" href="{{ route('product-receive.edit', $row->id)}}"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('product-receive.destroy', $row->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this field?');" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
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
                    © 2020 <a href="#" class="font-weight-bold ml-1">BTCare Supply</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
<!-- End Main Content -->
@endsection

@push('scripts')

@endpush