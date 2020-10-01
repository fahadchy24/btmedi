@extends('layouts.admin_app')

@section('title', 'Product | Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Categories</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
            <!-- Add Category -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Category</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('all-category') }}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name*</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Display Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="category_url" id="category_url" placeholder="Enter Category Slug" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Category_Image">Category Thumbnail Image &nbsp;<small>(Default size:210x270px)</small></label>
                            <input type="file" class="form-control" name="thumbnail_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Category_Image2">Category Cover Image &nbsp;<small>(Default size:870x220px)</small></label>
                            <input type="file" class="form-control" name="cover_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Priority*</label>
                            <input type="text" class="form-control" name="priority" placeholder="Enter Priority Number" required>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input checked" id="customCheck1" type="checkbox" name="status" value="1" required>
                            <label class="custom-control-label" for="customCheck1">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All Category</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Sub Category</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $row)
                            <tr>
                                <td><img src="{{ $row->thumbnail_image }}" width="50" height="50" alt=""></td>
                                <td>{{$row->category_name}}</td>
                                @if($row->subcategory_id > 0)
                                {{-- <td>{{$row->subcategories->id}}</td> --}}
                                @else
                                <td> - </td>
                                @endif
                                <td> - </td>
                                <td>{{$row->category_url}}</td>
                                <td>{{$row->priority}}</td>
                                <td>
                                    @if($row->status==1) 
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                <td>
                                    <a href="{{ route('edit-category', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-category', $row->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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
@endsection

@push('scripts')

{{-- <script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0] && input.files[1]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image')
          .attr('src' , e.target.result)
          .width(200)
          .height(200);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script> --}}
<script>
    $('#category_name').change(function(e){
        $.get('{{ route('check.category.slug') }}',
            { 'category_name': $(this).val() },
            function(data)
            {
                $('#category_url').val(data.category_url);
            }
        );
    });
</script>

@endpush