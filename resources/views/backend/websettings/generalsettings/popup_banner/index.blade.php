@extends('layouts.admin_app')

@section('title', 'Popup Banner')

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
                            <li class="breadcrumb-item active" aria-current="page">Popup Banner</li>
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
            <form class="form-horizontal" action="{{route('popup-banner')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-12" for="current_banner"><h3>Current Popup Banner</h3></label>
                    <br>
                    <div class="col-12">
                        <img width="641" height="393" id="popupimg" src="{{ $popup_banner->popup_banner ? asset('uploads/frontend/image/popup-banner/'.$popup_banner->popup_banner):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="popupimg">
                    </div>
                </div>
                <br>
                <div class="col-4 custom-file">
                    <label class="custom-file-label" for="customFileLang"></label>
                    <br>
                    <input type="file" name="popup_banner" accept="image/*" class="custom-file-input" id="customFileLang" lang="en" onchange="readURL(this);">
                    <img src="#" alt="" id="logo">
                </div>
                <br>
                <div class="form-group row">
                    <label class="control-label col-2" for="banner_status">Status *</label>
                    {{-- <div class="col-6">
                        <input class="form-control" name="instagram" id="instagram" placeholder="http://instagram.com/" required="" type="text" value="{{$socialdata->instagram}}">
                    </div> --}}
                    <div class="col-4">
                        <label class="custom-toggle custom-toggle-red mt-2">
                            <input type="checkbox" name="banner_status" value="1" {{$popup_banner->banner_status==1 ? "checked":""}}>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="add-product-footer">
                    <button type="submit" class="btn btn-primary">Update Banner</button>
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