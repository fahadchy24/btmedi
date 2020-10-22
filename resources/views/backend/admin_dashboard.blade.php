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
                    <h5 class="card-title text-uppercase text-muted mb-0">Order</h5>
                    <span class="h2 font-weight-bold mb-0">{{'$'.$sales_count }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-cart"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">On This Month</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Shipment</h5>
                    <span class="h2 font-weight-bold mb-0">{{ "$". $shipped_order }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-delivery-fast"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">On This Month</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">RMA</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $monthly_rma }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-curved-next"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-danger mr-2"> {{-- {{ $stock_count }} --}} </span>
                  <span class="text-nowrap">Total Numbers of RMA</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Call Log</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $total_callLogs }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-mobile-button"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-success mr-2">{{-- {{ $latest_customers }} --}}</span>
                  <span class="text-nowrap">Total Numbers of Call Log</span>
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
      {{--  <div class="row">
        <div class="col-xl-3">
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
        <div class="col-xl-3">
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
        <div class="col-xl-3">
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
        <div class="col-xl-3">
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
      </div>  --}}
      {{-- Statistics --}}
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Product</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total categories :</span><span class="h4 font-weight-bold mb-0">{{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total items :</span><span class="h4 font-weight-bold mb-0">{{ $product_count }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Todays new items :</span><span class="h4 font-weight-bold mb-0">{{ $todays_products }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Active items :</span><span class="h4 font-weight-bold mb-0">{{ $active_products }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Inactive Items :</span><span class="h4 font-weight-bold mb-0">{{ $inactive_products }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Item without price :</span><span class="h4 font-weight-bold mb-0">0</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Item without image :</span><span class="h4 font-weight-bold mb-0">0</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Item without inventory :</span><span class="h4 font-weight-bold mb-0">{{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Item with low inventory under <strong>3</strong> :</span><span class="h4 font-weight-bold mb-0">{{ $low_inventorty }}</span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-books"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Customer</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">New accounts :</span><span class="h4 font-weight-bold mb-0"> {{ $customer_count }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Active accounts :</span><span class="h4 font-weight-bold mb-0"> {{ $active_accounts }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Inactive accounts :</span><span class="h4 font-weight-bold mb-0"> {{ $inactive_accounts }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Today registered accounts :</span><span class="h4 font-weight-bold mb-0"> {{ $today_customers }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">This month registered accounts :</span><span class="h4 font-weight-bold mb-0"> {{ $latest_customers }}</span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-satisfied"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Order</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Today order :</span><span class="h4 font-weight-bold mb-0"> {{ $today_order }}</span> amount <span class="h4 font-weight-bold mb-0">{{ "$".$today_order_amount }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Week order :</span><span class="h4 font-weight-bold mb-0"> {{ $week_order }}</span> amount <span class="h4 font-weight-bold mb-0">{{ "$".$week_order_amount }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Month order :</span><span class="h4 font-weight-bold mb-0">{{ $month_order }}</span> amount <span class="h4 font-weight-bold mb-0">{{ "$".$month_order_amount }}</span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-cart"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Shipment</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Today ship :</span><span class="h4 font-weight-bold mb-0"> 1 </span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Week ship :</span><span class="h4 font-weight-bold mb-0"> 1 </span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Month ship :</span><span class="h4 font-weight-bold mb-0"> 2 </span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-delivery-fast"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">RMA</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">New RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Week RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Month RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total pending RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total approved RMA:</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total canceled RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total completed RMA :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-curved-next"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row" style="height: 374px;">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Call Log</h5>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total case open :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total issue :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Monthly case open :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Monthly case issue :</span><span class="h4 font-weight-bold mb-0"> {{ $total_categories }}</span>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-mobile-button"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Call Logs</h3>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>No of Cases</th>
                        <th>Company</th>
                        <th>Issue Date</th>
                        <th>Created By</th>
                        <th>Note</th>
                        <th>Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $callLogs as $row)
                      <tr>
                          <td> {{ $loop->index+1 }} </td>
                          <td>{{ $row->first_name ." ". $row->last_name }}</td>
                          <td>{{ $row->phone }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->noc }}</td>
                          <td>{{ $row->company }}</td>
                          <td>{{ $row->issue_date }}</td>
                          <td>{{ $row->created_by == 1 ? "Super Admin" : '' }}</td>
                          <td>
                            {{ \Illuminate\Support\Str::limit(strip_tags($row->note), 20) }}
                            @if (strlen(strip_tags($row->note)) > 20)
                            <a href="{{ url('admin/call-log/edit/'.$row->id)}}" class="btn btn-sm btn-primary-outline read-more">Read More</a>
                            @endif
                          </td>
                          <td>{{ $row->userType }}</td>
                      </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div>
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
        <div class="col-xl-12 col-md-12">
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
                        <th>Payment</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @foreach($recent_orders as $row)
                      <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                          {{ $row->order_number }}
                        </td>
                        <td>
                          {{$row->created_at}}
                        </td>
                        <td>
                          {{$row->total}}
                        </td>
                        <td>
                          {{$row->status}}
                        </td>
                        <td>
                          {{$row->payment}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
                    <th scope="col">Product Number</th>
                    <th scope="col">Image</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recent_products as $row)
                  <tr>
                    <th scope="row">
                      {{$loop->index+1}}
                    </th>
                    <th scope="row">
                      {{ $row->sku }}
                    </th>
                    <td>
                      <img src="{{ $row->main_image }}" width="80" height="80" alt="">
                    </td>
                    <td>
                     {{$row->sku}}
                    </td>
                    <td>
                     {{$row->status == 1 ? 'Active' : ''}}
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('backend.footer')
    </div>
@endsection