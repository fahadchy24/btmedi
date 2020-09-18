@extends('layouts.admin_app')

@section('title', 'All Attributes')

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
                            <li class="breadcrumb-item"><a href="#">Attributes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Attributes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- All Attributes-->
        <div class="col-12">
            <div class="card-wrapper">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Attributes</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Attribute Name</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if (count($attribute) > 0)
                                        @foreach ($attribute as $row)
                                        {{-- @if($row->color > NULL) --}}
                                    <tr data-entry-id="{{ $row->id }}">
                                        <td field-key='name'>{{ $row->name }}</td>
                                        <td field-key='color' style="background-color:{{ $row->color }}"></td>
                                        <td>
                                            <a href="{{ route('attribute.color.destroy',[$row->id]) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3">No entries in table</td>
                                    </tr>
                                    @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();

</script>

@endpush
