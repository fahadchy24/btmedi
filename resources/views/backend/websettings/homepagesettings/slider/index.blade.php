@extends('layouts.admin_app')

@section('title', 'All Slider')

@section('content')


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Settings</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Homepage Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Slider</li>
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
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0 float-left">Add Slider</h3>
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form action="{{ route('admin.slider') }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="Slider_title">Slider Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="image">Slider Image &nbsp<small>(Default size:1350x500px)</small></label>
                                <input type="file" class="form-control" name="image" onchange="readURL(this);">
                                <br>
                                <img src="#" id="image" alt="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="priority">Slider Priority</label>
                                <input type="text" class="form-control" name="priority">
                            </div>
                            <div class="custom-control custom-checkbox mb-4">
                                <input class="custom-control-input" id="customCheck1" type="checkbox" name="status" value="1">
                                <label class="custom-control-label" for="customCheck1">Enable</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Slider</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="">
                                <thead class="thead-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Slider Title</th>
                                        <th>Slider Image</th>
                                        <th>Slider Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if (count($sliders) > 0)
                                            @foreach ($sliders as $row)
                                            <tr data-entry-id="{{ $row->id }}">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$row->title}}</td>
                                                <td><img src="{{asset($row->image) }}" width="100" height="60" alt="">
                                                </td>
                                                <td>{{$row->priority}}</td>
                                                <td>
                                                <label class="custom-toggle  custom-toggle-red">
                                                <input type="checkbox" id="status" data-id={{ $row->id }} {{ $row->status ==1 ? 'checked' : '' }}>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </td>
                                                <td>
                                                    <a href="{{-- {{ url('admin/homepage-settings/edit-slider/'.$row->id)}} --}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="{{ route('slider.destroy',$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
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
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image')
          .attr('src' , e.target.result)
          .width(80)
          .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

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
            url : 'slider/status/'+id+'/'+status,
            method : 'get',
            success : function(data) {
                toastr.success("{{ Session::get('message', 'Status has been updated') }}");
            }
        });

    });
</script>
@endpush