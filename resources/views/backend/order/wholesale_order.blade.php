@extends('layouts.admin_app')

@section('title', 'Wholesale Orders')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Wholesale Orders</a></li>
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
                    <h3 class="mb-0">Wholesale Orders</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Item#</th>
                                <th>Order Date</th>
                                <th>Order Number</th>
                                <th>Invoice Number</th>
                                <th>Sub Total</th>
                                <th>Tax</th>
                                <th>Shipping Fee</th>
                                <th>Total</th>
                                <th>Remark</th>
                                <th>Internal Remark</th>
                                <th>Transaction ID</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wholesale_orders as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $row->created_at->format('d M') }}</td>
                                <td>{{ $row->order_number }} </td>
                                <td>{{ $row->invoice_number }}</td>
                                <td>{{ $row->sub_total }}</td>
                                <td>{{ $row->tax }}</td>
                                <td>{{ $row->shipping_fee }}</td>
                                <td>{{ $row->total }}</td>
                                <td>{{ $row->remark }}</td>
                                <td>{{ $row->internal_remark }}</td>
                                <td>{{ $row->transaction_id }}</td>
                                <td>{{ $row->payment }}</td>
                                <td>
                                    <a title="View" class="btn btn-sm btn-primary" href="{{ route('view.order', $row->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a title="Edit" class="btn btn-sm btn-info" id="edit" href="{{ route('edit.order', $row->id)}}"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('paid_unpaid.order', $row->id) }}" method="POST" style="display: inline; margin-right: .5rem;">@csrf
                                        <button title="{{ $row->payment=="Paid" ? "Unpaid" : "Paid" }}" type="submit" class="btn btn-sm btn-warning"><i class="fa fa-indent" aria-hidden="true"></i></button>
                                    </form>
                                    <a title="Delete" class="btn btn-sm btn-danger" id="delete" href="{{ route('delete.order', $row->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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