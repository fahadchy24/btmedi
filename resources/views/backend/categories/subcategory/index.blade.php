@extends('layouts.admin_app')

@section('title', 'SubCategory')

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
                            <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
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
                    <h3 class="mb-0">Add SubCategory</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('sub.category') }}" role="form" method="POST" enctype="multipart/form-data">
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
                            <label for="subcategory_name">SubCategory Name*</label>
                            <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="Enter Display Name" required>
                        </div>
                        <div class="form-group">
                            <label for="subcategory_url">Slug</label>
                            <input type="text" class="form-control" name="subcategory_url" id="subcategory_url" placeholder="Enter SubCategory Slug" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="CategoryName">Category Name</label>
                            <select class="form-control" name="category_id" id="CategoryName">
                                <option disabled="" selected="">Select a category</option>
                                @foreach($categories as $row)
                                <option value="{{$row->id}}">{{$row->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="thumbnail_image">SubCategory Thumbnail Image &nbsp;<small>(Default size:210x270px)</small></label>
                            <input type="file" class="form-control" name="thumbnail_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Category_Image2">SubCategory Cover Image &nbsp;<small>(Default size:870x220px)</small></label>
                            <input type="file" class="form-control" name="cover_image" accept="image/*" required>
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
                    <h3 class="mb-0">All SubCategory</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategory as $row)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$row->subcategory_name}}</td>
                                <td>{{$row->category->category_name}}</td>
                                <td> - </td>
                                <td>{{$row->subcategory_url}}</td>
                                <td>
                                    @if($row->status==1) 
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                <td>
                                    <a href="{{ route('edit-subcategory', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('delete-subcategory', $row->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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
    $('#subcategory_name').change(function(e){
        $.get('{{ route('check.subcategory.slug') }}',
            { 'subcategory_name': $(this).val() },
            function(data)
            {
                $('#subcategory_url').val(data.subcategory_url);
            }
        );
    });
</script>

@endpush