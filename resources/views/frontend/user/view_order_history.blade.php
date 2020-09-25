@extends('layouts.app')

@section('title', '')

@section('content')


<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Order History</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-9">
				<h2 class="title">Order History</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-center">Order ID</td>
								<td class="text-center">Qty</td>
								<td class="text-center">Status</td>
								<td class="text-center">Date Added</td>
								<td class="text-right">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
                            @foreach ($order as $row)    
							<tr>
                                <td class="text-center">
									<a href="#"><img width="85" class="img-thumbnail" title="{{ $row->product->product_name }}" alt="{{ $row->product->product_name }}" src="{{ asset($row->product->main_image) }}">
									</a>
								</td>
								<td class="text-left"><a href="product.html">{{ $row->product->product_name }}</a>
								</td>
								<td class="text-center">{{ "BT-#". $row->id }}</td>
								<td class="text-center">{{ $row->quantity }}</td>
								<td class="text-center">{{ $row->status }}</td>
								<td class="text-center">{{ $row->created_at->format('d M Y') }}</td>
								<td class="text-right">{{ "$". $row->total }}</td>
								<td class="text-center">
                                    <a class="btn btn-info" title="" data-toggle="tooltip" href="#" data-original-title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Return"><i class="fa fa-reply"></i></a>
								</td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
				</div>

			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
            <aside class="col-sm-3 hidden-xs" id="column-right">
                <h2 class="subtitle">Account</h2>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="login.html">Login</a>
                        </li>
                        <li><a href="register.html">Register</a>
                        </li>
                        <li><a href="register.html">Wholesale Register</a>
                        </li>
                        <li><a href="#">Forgotten Password</a>
                        </li>
                        <li><a href="my-account.html">My Account</a>
                        </li>
                        <li><a href="my-account.html">Address Books</a>
                        </li>
                        <li><a href="wishlist.html">Wish List</a>
                        </li>
                        <li><a href="order-history.html">Order History</a>
                        </li>
                        <li><a href="return.html">Returns</a>
                        </li>
                        <li><a href="#">Newsletter</a>
                        </li>
                    </ul>
                </div>
            </aside>
			<!--Right Part End -->
		</div>
	</div>
    <!-- //Main Container -->
    
@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush