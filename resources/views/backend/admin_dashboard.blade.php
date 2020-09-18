@extends('layouts.admin_app')

@section('title', 'Admin Dashboard')

@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Sales</h5>
                    <span class="h2 font-weight-bold mb-0">{{-- {{'$'.$sales_count }} --}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Last 30 days</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Orders</h5>
                    <span class="h2 font-weight-bold mb-0">{{-- {{ $order_count }} --}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-chart-pie-35"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Since last month</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                    <span class="h2 font-weight-bold mb-0">{{-- {{ $product_count }} --}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-danger mr-2"> {{-- {{ $stock_count }} --}} </span>
                  <span class="text-nowrap">Out of Stock</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Customers</h5>
                    <span class="h2 font-weight-bold mb-0">{{-- {{ $customer_count }} --}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-success mr-2">{{-- {{ $latest_customers }} --}}</span>
                  <span class="text-nowrap">Customer from last 30d</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Sales value</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total orders</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6">
          <!-- Members list group card -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Team members</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="{{url('backend/assets/img/theme/team-1.jpg')}}">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">John Michael</a>
                      </h4>
                      <small>Sub Admin</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="{{url('backend/assets/img/theme/team-2.jpg')}}">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">Alex Smith</a>
                      </h4>
                      <small>Editor</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="{{url('backend/assets/img/theme/team-3.jpg')}}">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">Samantha Ivy</a>
                      </h4>
                      <small>Accountant</small>
                    </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="{{url('backend/assets/img/theme/team-4.jpg')}}">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">John Michael</a>
                      </h4>
                      <small>Guest</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <!-- Checklist -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">To do list</h5>
            </div>
            <!-- Card body -->
            <div class="card-body p-0">
              <!-- List group -->
              <ul class="list-group list-group-flush" data-toggle="checklist">
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-success">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Call with Dave</h5>
                      <small>10:30 AM</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-success">
                        <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>
                        <label class="custom-control-label" for="chk-todo-task-1"></label>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-warning">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Lunch meeting</h5>
                      <small>10:30 AM</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-warning">
                        <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                        <label class="custom-control-label" for="chk-todo-task-2"></label>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-info">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>
                      <small>10:30 AM</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-info">
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-danger">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Winter Hackaton</h5>
                      <small>10:30 AM</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-danger">
                        <input class="custom-control-input" id="chk-todo-task-4" type="checkbox" checked>
                        <label class="custom-control-label" for="chk-todo-task-4"></label>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="row">
            <div class="col">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Recent Orders</h3>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SL</th>
                        <th>Order No.</th>
                        <th>Order Date</th>
                        <th>Order Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      {{-- @foreach($recent_orders as $row) --}}
                      <tr>
                        <td>{{-- {{$loop->index+1}} --}}</td>
                        <td>
                          {{-- {{'TCH#'.$row->id}} --}}
                        </td>
                        <td>
                          {{-- {{$row->created_at}} --}}
                        </td>
                        <td>
                          {{-- {{$row->total_price}} --}}
                        </td>
                        <td>
                          {{-- {{$row->status}} --}}
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{-- {{ url('admin/order/view/'.$row->id)}} --}}">View</a>
                              <a class="dropdown-item" id="edit" href="{{-- {{ url('admin/order/edit/'.$row->id)}} --}}">Edit</a>
                              <a class="dropdown-item" id="delete" href="{{-- {{ url('admin/order/delete/'.$row->id)}} --}}">Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      {{-- @endforeach --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card-deck">
            <div class="card bg-gradient-default">
              <div class="card-body">
                <div class="mb-2">
                  <sup class="text-white">$</sup> <span class="h2 text-white">3,300</span>
                  <div class="text-light mt-2 text-sm">Your current balance</div>
                  <div>
                    <span class="text-success font-weight-600">+ 15%</span> <span class="text-light">($250)</span>
                  </div>
                </div>
                <button class="btn btn-sm btn-block btn-neutral">Add credit</button>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <small class="text-light">Orders: 60%</small>
                    <div class="progress progress-xs my-2">
                      <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                  </div>
                  <div class="col"><small class="text-light">Sales: 40%</small>
                    <div class="progress progress-xs my-2">
                      <div class="progress-bar bg-warning" style="width: 40%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Username card -->
            <div class="card bg-gradient-danger">
              <!-- Card body -->
              <div class="card-body">
                <div class="row justify-content-between align-items-center">
                  <div class="col">
                    <img src="{{url('backend/assets/img/icons/cards/bitcoin.png')}}" alt="Image placeholder" />
                  </div>
                  <div class="col-auto">
                    <span class="badge badge-lg badge-success">Active</span>
                  </div>
                </div>
                <div class="my-4">
                  <span class="h6 surtitle text-light">
                    Username
                  </span>
                  <div class="h1 text-white">@johnsnow</div>
                </div>
                <div class="row">
                  <div class="col">
                    <span class="h6 surtitle text-light">Name</span>
                    <span class="d-block h3 text-white">John Snow</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recently Added Product</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Image</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($recent_products as $row) --}}
                  <tr>
                    <th scope="row">
                      {{-- {{$loop->index+1}} --}}
                    </th>
                    <th scope="row">
                      {{-- {{'TCH#'.$row->id}} --}}
                    </th>
                    <td>
                      <img src="{{-- {{asset('frontend/images/product/'.$row->image) }} --}}" width="80" height="60" alt="">
                    </td>
                    <td>
                     {{--  {{$row->sku}} --}}
                    </td>
                    <td>
                     {{--  {{$row->status == 1 ? 'Active' : ''}} --}}
                    </td>
                  </tr>
                 {{--  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-left text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BT Medi</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
@endsection