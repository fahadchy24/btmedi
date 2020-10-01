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
<!-- Start Main Content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <!-- Add menu -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Product Details</h3>
                </div>
                <form action="{{ route('product-attribute-store', $productDetails->id) }}" role="form" method="POST">
                @csrf
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_name">Product Name:</label> &nbsp;
                                    {{ $productDetails->product_name }}
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product ID:</label> &nbsp;
                                    {{ "BT-".$productDetails->id }}
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product Image:</label> &nbsp;
                                    <img src="{{ $productDetails->main_image }}" alt="" width="200" height="200">
                                </div>
                                <div class="field_wrapper">
                                    <div>
                                        <input class="form-control-input" id ="label[]" type="text" name="label[]" placeholder="Label" style="width:100px;" autocomplete="on">
                                        <input class="form-control-input" id ="color[]" type="color" name="color[]" style="width:100px;" autocomplete="on">
                                        <input class="form-control-input" id ="other[]" type="text" name="other[]" placeholder="Other" style="width:200px;" autocomplete="on">
                                        <input class="form-control-input" id ="stock[]" type="number" name="stock[]" placeholder="Stock" style="width:100px;"  min="0" autocomplete="on">
                                        <input class="form-control-input" id ="price[]" type="number" name="price[]" placeholder="Price" style="width:100px;" min="0" autocomplete="on">
                                        <a href="javascript:void(0);" class="add_button btn btn-sm btn-info" title="Add field">Add Row</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-7">
                                <h3>Add Values</h3>
                                <div class="field_wrapper">
                                    <div>
                                        <input class="form-control-input" id ="label[]" type="text" name="label[]" placeholder="Label" style="width:100px;" autocomplete="on">
                                        <input class="form-control-input" id ="color[]" type="color" name="color[]" style="width:100px;" autocomplete="on">
                                        <input class="form-control-input" id ="stock[]" type="number" name="stock[]" placeholder="Stock" style="width:100px;" autocomplete="on">
                                        <input class="form-control-input" id ="price[]" type="number" name="price[]" placeholder="Price" style="width:100px;" autocomplete="on">
                                        <a href="javascript:void(0);" class="add_button btn btn-sm btn-info" title="Add field">Add Row</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Products Attribute List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>ID No.</th>
                                <th>Label</th>
                                <th>Color</th>
                                <th class="text-center">Others</th>
                                <th class="text-center">Stock</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $productDetails['attributes'] as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td> {{$row->label}} </td>
                                <td style="background-color:{{$row->color}};width:1%;"></td>
                                <td class="text-center"> {{$row->other}} </td>
                                <td class="text-center"> {{$row->stock}} </td>
                                <td> {{$row->price}} </td>
                                <td>
                                    <a class="btn btn-sm btn-info" id="edit" href="{{-- {{ url('admin/products/edit/'.$row->id)}} --}}">Edit</a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ route('product-attribute-destroy',$row->id)}}">Delete</a>
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


<script type="text/javascript">
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px;"><input class="form-control-input" id ="label[]" type="text" name="label[]" placeholder="Label" style="width:100px;">&nbsp;<input class="form-control-input" id ="color[]" type="color" name="color[]" style="width:100px;">&nbsp;<input class="form-control-input" id ="other[]" type="text" name="other[]"  placeholder="Other" style="width:200px;">&nbsp;<input class="form-control-input" id ="stock[]" type="number" min="0" name="stock[]"  placeholder="Stock" style="width:100px;">&nbsp;<input class="form-control-input" id ="price[]" type="number" min="0" name="price[]"  placeholder="Price" style="width:100px;">&nbsp;<a href="javascript:void(0);"class="remove_button btn-sm btn-danger">X</a></div>'; //New input field html 
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