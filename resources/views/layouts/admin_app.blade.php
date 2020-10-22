<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Pencil Design Studio">
    <title> @yield('title') </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/') }}/ico/favicon-16x16.png" />
    
    <link href="http://markcell.github.io/jquery-tabledit/assets/css/bootstrap-yeti.min.css">
    <link rel="stylesheet" href="http://markcell.github.io/jquery-tabledit/assets/css/prettify.min.css">
    <link rel="stylesheet" href="http://markcell.github.io/jquery-tabledit/assets/css/prettify-bootstrap.min.css">
    <link rel="stylesheet" href="http://markcell.github.io/jquery-tabledit/assets/js/bootstrap.min.js">
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    
    
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/quill/dist/quill.core.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/argon.css?v=1.1.0')}}" type="text/css">
    
    <!-- Ajax CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Table Edit Jquery -->
    <script src="{{asset('backend/assets/vendor/jquery-tabledit/jquery.tabledit.min.js')}}"></script>

    


    {{--  Jquery Ui for Datepicker  --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- sweet alerts -->
    <link href="{{asset('frontend/css/sweet-alert.min.css')}}" rel="stylesheet">
    <!-- Toastr Css -->
    <link href="{{asset('frontend/css/toastr.css')}}" rel="stylesheet">
    <!-- Ck Editor Css -->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    @stack('css')

</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('uploads/frontend/image/'.$gs->logo) }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-bag-17 text-orange"></i>
                                <span class="nav-link-text">Orders</span>
                            </a>
                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('create.new.orders')}}" class="nav-link">Create A New Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('new.orders') }}" class="nav-link">New Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('orders.processing') }}" class="nav-link">Orders Processing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('orders.ready') }}" class="nav-link">Orders Ready to Pack & Ship</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('finished.orders') }}" class="nav-link">Finished Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('back.orders') }}" class="nav-link">Back Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('canceled.orders') }}" class="nav-link">Canceled Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('hold.orders') }}" class="nav-link">Hold Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('refund.orders') }}" class="nav-link">Refund Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('wholesale.orders') }}" class="nav-link">Wholesale Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('shipping-methods.index') }}" class="nav-link">Shipping Method</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                                <i class="ni ni-app text-info"></i>
                                <span class="nav-link-text">Products</span>
                            </a>
                            <div class="collapse" id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('product.create') }}" class="nav-link">Add New Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('product.index') }}" class="nav-link">Product List</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('product.index') }}" class="nav-link">Add Product By Uploading</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('brand.index')}}" class="nav-link ">Brand</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('product-attributes') }}" class="nav-link ">Attributes</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('product-attributes-add') }}" class="nav-link ">Add Attributes</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#categories" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="categories">
                                <i class="ni ni-single-copy-04 text-black"></i>
                                <span class="nav-link-text">Categories</span>
                            </a>
                            <div class="collapse" id="categories">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('all-category') }}" class="nav-link ">Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sub.category') }}" class="nav-link ">SubCategory</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                                <i class="ni ni-single-02 text-pink"></i>
                                <span class="nav-link-text">Customers</span>
                            </a>
                            <div class="collapse" id="navbar-forms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('customer.create') }}" class="nav-link">Create New Customer</a>
                                    </li>
                                    {{--  <li class="nav-item">
                                        <a href="#" class="nav-link">Add Customer by Uploading</a>
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a href="{{ route('customer.index') }}" class="nav-link">Customer List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                                <i class="ni ni-archive-2 text-default"></i>
                                <span class="nav-link-text">Inventory</span>
                            </a>
                            <div class="collapse" id="navbar-tables">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('inventory.index')}}" class="nav-link">Inventory List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.index')}}" class="nav-link">Vendor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('product-receive.index')}}" class="nav-link">Product Receiving Input</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">RFID Label Printing</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rma-table" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="rma-table">
                                <i class="ni ni-archive-2 text-default"></i>
                                <span class="nav-link-text">RMA</span>
                            </a>
                            <div class="collapse" id="rma-table">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('rma.index') }}" class="nav-link">RMA List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('waiting.rma') }}" class="nav-link">Waiting for Approval RMA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('completed.rma') }}" class="nav-link">Completed RMA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('canceled.rma') }}" class="nav-link">Canceled RMA</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#call-log" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="call-log">
                                <i class="ni ni-single-copy-04 text-default"></i>
                                <span class="nav-link-text">Call Logs</span>
                            </a>
                            <div class="collapse" id="call-log">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <a href="{{route('call-log')}}" class="nav-link">Call Log List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('call-log-add') }}" class="nav-link">Create Call Log</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#report" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="comment">
                                <i class="ni ni-single-copy-04 text-black"></i>
                                <span class="nav-link-text">Report</span>
                            </a>
                            <div class="collapse" id="report">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('sale-report') }}" class="nav-link">Receiving Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Inventory Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Sales Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Shipping Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Product List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Best Selling Product Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">RMA Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Price List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Call Log Report</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#comment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="comment">
                                <i class="ni ni-single-copy-04 text-black"></i>
                                <span class="nav-link-text">Comments</span>
                            </a>
                            <div class="collapse" id="comment">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('comment.index') }}" class="nav-link">All Comment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('coupons.index') }}">
                                <i class="ni ni-badge text-info"></i>
                                <span class="nav-link-text">Coupons</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#staffs" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="staffs">
                                <i class="ni ni-archive-2 text-default"></i>
                                <span class="nav-link-text">User Privilege</span>
                            </a>
                            <div class="collapse" id="staffs">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('manage.role') }}" class="nav-link">Manage Roles</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subscriber.index') }}">
                                <i class="ni ni-bell-55 text-red"></i>
                                <span class="nav-link-text">Subscribers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                                <i class="ni ni-world text-primary"></i>
                                <span class="nav-link-text">Web Settings</span>
                            </a>
                            <div class="collapse" id="navbar-maps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">General Settings</a>
                                        <div class="collapse show" id="navbar-multilevel" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('main-logo') }}" class="nav-link ">Logo</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('office-address') }}" class="nav-link ">Office Address</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('top-header') }}" class="nav-link ">Top Header</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('other-page') }}" class="nav-link ">Other Page</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('popup-banner') }}" class="nav-link ">Popup Banner</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('social-links') }}" class="nav-link ">Social Links</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('website-footer') }}" class="nav-link ">Website Footer</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navbar-multilevel2" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel2">Home Page Settings</a>
                                        <div class="collapse show" id="navbar-multilevel2" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.slider') }}" class="nav-link ">Slider</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">Featured Links</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('ad-banner') }}" class="nav-link ">Ad Banner</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navbar-multilevel3" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel3">All Menu</a>
                                        <div class="collapse show" id="navbar-multilevel3" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="{{route('menu.index')}}" class="nav-link ">Menu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{url('public/admin/assets/img/theme/team-1.jpg')}}" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{url('public/admin/assets/img/theme/team-2.jpg')}}" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{url('public/admin/assets/img/theme/team-3.jpg')}}" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>5 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{url('public/admin/assets/img/theme/team-4.jpg')}}" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{url('public/admin/assets/img/theme/team-5.jpg')}}" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- View all -->
                                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                                <div class="row shortcuts px-4">
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                            <i class="ni ni-calendar-grid-58"></i>
                                        </span>
                                        <small>Calendar</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                        <small>Email</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                            <i class="ni ni-credit-card"></i>
                                        </span>
                                        <small>Payments</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                            <i class="ni ni-books"></i>
                                        </span>
                                        <small>Reports</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                            <i class="ni ni-pin-3"></i>
                                        </span>
                                        <small>Maps</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                            <i class="ni ni-basket"></i>
                                        </span>
                                        <small>Shop</small>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{url('backend/assets/img/theme/team-4.jpg')}}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ Auth::guard('admin')->user()->lastName }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->

        @yield('content')

    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
     {{--  <script src="{{asset('backend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>  --}}
    <script src="{{asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('backend/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{asset('backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Argon JS -->
    <script src="{{asset('backend/assets/js/argon.js?v=1.1.0')}}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{asset('backend/assets/js/demo.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('frontend/js/toastr.min.js')}}"></script>

    <script type="text/javascript">
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

    </script>

    <!-- sweet alerts -->
    <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you sure?"
                    , text: "Once deleted, you will not be able to recover this file!"
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    }
                });
        });

    </script>
    <script>
        $(document).on("click", "#edit", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you sure?"
                    , text: "Any Change can not be undo."
                    , icon: "info"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willEdit) => {
                    if (willEdit) {
                        window.location.href = link;
                    }
                });
        });

    </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @stack('scripts')

</body>

</html>
