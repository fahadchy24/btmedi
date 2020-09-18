@extends('layouts.admin_app')

@section('title', 'Logo Setting')

@section('content')
<!-- Start Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Settings</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">General Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Logo</li>
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
    <div class="card text-center">
        <div class="card-header"></div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('main-logo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-12" for="current_logo">Current Logo</label>
                    <br>
                    <div class="col-12">
                        <img width="130px" height="90px" id="logoimg" src="{{ $logo->logo ? asset('uploads/frontend/image/'.$logo->logo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="logoimg">
                    </div>
                </div>
                <br>
                <div class="col-1 custom-file">
                    <label class="custom-file-label" for="customFileLang"></label>
                    <br>
                    <input type="file" name="logo" accept="image/*" class="custom-file-input" id="customFileLang" lang="en" onchange="readURL(this);">
                    <img src="#" alt="" id="logo">
                </div>
                <br>
                <hr>
                <div class="add-product-footer">
                    <button type="submit" class="btn btn-primary">Update Logo</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
    <!-- Footer -->
    <footer class="footer pt-0 pl-2">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center text-lg-left text-muted">
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BT Medi</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- End Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#logo')
          .attr('src' , e.target.result)
          .width(80)
          .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush