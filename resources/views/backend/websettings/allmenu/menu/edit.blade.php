@extends('layouts.admin_app')

@section('title', 'Edit Menu')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">All Menu</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
    <div class="row">
        <div class="col-xl-12">
            <!-- Edit Menu -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Menu</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('update-menu', $menuDetails->id) }}" role="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Display Name*</label>
                            <input type="text" class="form-control" name="name" value="{{ $menuDetails->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="url" value="{{ $menuDetails->url }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush