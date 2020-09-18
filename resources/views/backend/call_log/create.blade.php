@extends('layouts.admin_app')

@section('title', 'Create New Call Log')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Call Logs</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Create New Call Log</a></li>
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
        <!-- Add Slider -->
        <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Create a new call log</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('call-log-store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="user_id">Select a customer</label>
                                    <select name="user_id" id="user_id" class="form-control" data-toggle="select">
                                        @foreach ($customerInfo as $row)
                                        <option selected disabled></option>
                                        <option value="{{ $row->id }}">{{ $row->first_name ." ". $row->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="last_name">Customer Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="first_name">Customer First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Customer Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Customer Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="fax">Customer Fax Number</label>
                                    <input type="tel" class="form-control" id="fax" name="fax" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address_1">Customer Address</label>
                                    <textarea name="address_1" id="address_1" class="form-control" autocomplete="on"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="city">City</label>
                                    <select name="city" id="city" class="form-control" data-toggle="select" autocomplete="on">
                                        <option selected disabled>Select a city</option>
                                            <option value="New York">New York</option>
                                            <option value="New Jersey">New Jersey</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="state">State</label>
                                    <select name="state" id="state" class="form-control" data-toggle="select" autocomplete="on">
                                        <option selected disabled>Select a state</option>
                                            <option value="New York">New York</option>
                                            <option value="New Jersey">New Jersey</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="postcode">Post Code</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="issue">Issue</label>
                                    <textarea name="issue" id="issue" class="form-control"></textarea>
                                    @error('issue')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="solution">Solution</label>
                                    <textarea name="solution" id="solution" class="form-control"></textarea>
                                    @error('solution')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="note">Note</label>
                                    <textarea name="note" id="note" class="form-control"></textarea>
                                    @error('note')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection

@push('scripts')

{{-- <script type="text/javascript">
    $(document).ready( function() {
        $('#user_id').on('change', function() {
            $('#last_name').val($(this).val());
            $('#first_name').val($(this).val());
            $('#password').val($(this).val());
        });
    });
</script> --}}

<script>
    $("#user_id").autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: "/Employees/SearchEmployees",
                dataType: "json",
                data: {
                    searchText: request.term
                },
                success: function (data) {
                    response($.map(data.employees, function (item) {
                        return {
                            label: item.name,
                            value: item.id
                        };
                    }));
                }
            });
        }
    });
</script>

@endpush