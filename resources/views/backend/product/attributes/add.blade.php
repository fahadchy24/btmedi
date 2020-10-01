@extends('layouts.admin_app')

@section('title', 'Add Attributes')

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
                            <li class="breadcrumb-item active" aria-current="page">Add Attributes</li>
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
        <!-- Add Attributes-->
        <div class="col-12">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0 float-left">Add Attribute</h3>
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form action="{{ route('product-attributes-store') }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="color_name">Name</label>
                                    <input type="text" class="form-control" id="color_name" name="name" placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="status"> Select Attribute Type </label>
                                    <select class="form-control" id="status" name="order_type" required>
                                        <option disabled selected>Select a type</option>
                                        <option value="Color">Color</option>
                                        <option value="Text">Text</option>
                                    </select>
                                </div>
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-md-2 col-form-label form-control-label">Pick a Color</label>
                                        <div class="col-md-10">
                                        <input class="form-control" type="color" value="#5e72e4" name="color" id="example-color-input">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Values</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form action="{{ route('product-attributes-store') }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="field_wrapper">
                                        <div>
                                            <label class="form-control-label" for="label[]">Label:&nbsp;</label>
                                            <input class="form-control-input" id ="label[]" type="text" name="label[]" value="" name="label[]" placeholder="Enter a Label">&nbsp;&nbsp;
                                            <label class="form-control-label" for="color[]">Color: &nbsp;</label>
                                            <input class="form-control-input" id ="color[]" type="color" name="color[]" value="" name="color[]" placeholder="">&nbsp;&nbsp;&nbsp;
                                            <label class="form-control-label" for="stock[]">Stock:&nbsp;</label>
                                            <input class="form-control-input" id ="stock[]" type="text" name="stock[]" value="" name="stock[]" placeholder="Enter Stock">&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="form-control-label" for="price[]">Price:&nbsp;</label>
                                            <input class="form-control-input" id ="price[]" type="text" name="price[]" value="" name="price[]" placeholder="Enter Price">&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div
                            </div>
                            <a href="javascript:void(0);" class="add_button btn btn-primary mt-2 ml--3" title="Add field">Add New Row</a>
                        </form>
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
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><label class="form-control-label" for="label[]">Label:&nbsp;&nbsp;</label><input id="label[]"type="text"name="label[]"value=""name="label[]"placeholder="Enter a Label">&nbsp;&nbsp;&nbsp;<label class="form-control-label" for="color[]">Color:&nbsp;</label><input class="ml-2" id="color[]"type="color"name="color[]"value="#5e72e4"name="color[]">&nbsp;&nbsp;&nbsp;<label class="form-control-label ml-1" for="stock[]">Stock:&nbsp;</label><input class="ml-1" id ="stock[]" type="text" name="stock[]"value=""name="stock[]" placeholder="Enter Stock">&nbsp;&nbsp;&nbsp;&nbsp;<label class="form-control-label ml-1" for="price[]">Price:&nbsp;</label><input class="ml-1" id ="price[]" type="text" name="price[]" value="" name="price[]" placeholder="Enter Price">&nbsp;&nbsp;<a href="javascript:void(0);"class="remove_button btn-sm btn-danger">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

@endpush