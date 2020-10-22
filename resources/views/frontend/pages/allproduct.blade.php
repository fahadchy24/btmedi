@extends('layouts.app')

@section('title', 'Products') 

@section('content')
<!-- Main Container  -->
<div class="main-container product-listing container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Products</a></li>
    </ul>
    <div class="row">
        <!--Right Part Start -->
        <aside class="col-sm-4 col-md-3 content-aside left_column sidebar-offcanvas" id="column-left">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="module">
                <h3 class="modtitle"><span><i class="fa fa-paste"></i>Filter Shop By</span> </h3>
                <div class="modcontent ">
                    <form class="type_2">
                        <div class="table_layout filter-shopby">
                            <div class="table_row">
                                <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
                                <div class="table_cell" style="z-index: 103;">
                                    <legend>Search</legend>
                                    <input class="form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                                </div>
                                <!--/ .table_cell -->

                                <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                                {{--  <div class="table_cell">
                                    <fieldset>
                                        <legend>Price</legend>
                                        <div class="range">
                                            Range :
                                            <span class="min_val">$28.00</span> -
                                            <span class="max_val">$562.00</span>
                                            <input type="hidden" name="" class="min_value" value="28.00">
                                            <input type="hidden" name="" class="max_value" value="562.00">
                                        </div>
                                        <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 3.15795%;"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 96.8438%;"></span>
                                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 3.15795%; width: 93.6859%;"></div>
                                        </div>
                                    </fieldset>
                                </div>
                                <!--/ .table_cell -->  --}}

                                <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                            </div>
                            <!--/ .table_row -->
                            <div class="bottom_box">
                                <div class="buttons_row">
                                    <button type="submit" class="button_grey button_submit">Search</button>
                                    <button type="reset" class="button_grey filter_reset">Reset</button>
                                </div>

                            </div>
                        </div>
                        <!--/ .table_layout -->
                    </form>
                </div>
            </div>
        </aside>
        <!--Right Part End -->

        <!--Middle Part Start-->
        <div id="content" class="col-md-9 col-sm-12">
            <div class="products-category">
                <h3 class="title-category ">All Products</h3>
                <!-- Filters -->
                <div class="product-filter product-filter-top filters-panel">
                    <div class="row">
                        <div class="col-md-5 col-sm-3 col-xs-12 view-mode">

                            <div class="list-view">
                                <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                            </div>

                        </div>
                        <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="input-limit">Show:</label>
                                <select id="input-limit" class="form-control" onchange="location = this.value;">
                                    <option value="" selected="selected">15</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //end Filters -->
                <!--changed listings-->
                <div class="products-list row nopadding-xs so-filter-gird grid">
                    @foreach ($products as $item)
                    <div class="product-layout col-md-3"> 
                        <div class="product-item-container">
                            <div class="left-block left-b">
                                <div class="product-image-container">
                                    <a href="{{ url('/product/view/'.$item->products->id)}}" target="_self" title="Drutick lanaeger">
                                        <img src="{{ $item->products->main_image }}" class="img-1 img-responsive" alt="imageee"> 
                                    </a>
                                </div>
                            </div>
                            <div class="right-block right-b">
                                <div class="caption">
                                    <h4><a href="{{ url('/product/view/'.$item->products->id)}}" title="{{$item->products->product_name}}" target="_self">{{ \Illuminate\Support\Str::limit(strip_tags($item->products->product_name), 25)}}</a></h4>
                                    <div class="price"> <span class="price-new">{{ "$".$item->products->regular_price }}</span>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--static">
                                        <form action="{{ url('cart/add')}}" method="POST" style="display:inline-flex;">@csrf
                                            <input type="hidden" name="id" value="{{ $item->products->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="addToCart" title="Add to cart"><i class="fa fa-shopping-basket"></i>
                                                <span>Add to cart </span>
                                            </button>
                                        </form>
                                        <form class="form" action="{{ route('add-to-wishlist') }}" method="POST" style="display:inline-flex;">@csrf
                                            <input type="hidden" name="id" value="{{ $item->products->id }}">
                                            <button type="submit" class="wishlist btn-button" title="Add to Wish List"><i class="fa fa-heart"></i><span></span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
                                    </div>
                                    <div class="list-block hidden">
                                        <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                        </button>
                                        <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                        </button>
                                        <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                        </button>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                        <!--end quickview-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--// End Changed listings-->
                <!-- Filters -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <ul class="pagination">
                                <li class="active">
                                    <span>1</span>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 text-right text-show">Showing 1 to 15 of 15 (1 Pages)</div>
                    </div>
                </div>
                <!-- //end Filters -->

            </div>

        </div>
        <!--Middle Part End-->
    </div>
    <!--Middle Part End-->
</div>
<!-- End Main Container  -->

@include('layouts.front-inc.footer')

@endsection

@push('scripts')

<script type="text/javascript">
	
	// Check if Cookie exists
	if ($.cookie('display')) { view = $.cookie('display');}
	else {view = 'grid';}
	
	if(view) display(view);
	
	function display(view) {
		$('.products-list').removeClass('list grid').addClass(view);
		$('.list-view .btn').removeClass('active');
		if(view == 'list') {
			$('.products-list .product-layout').removeClass('col-md-3').addClass('col-md-12');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'list'); 
		}else{
			$('.products-list .product-layout').removeClass('col-md-12').addClass('col-md-3');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'grid');
		}
	}
	
		
</script>

@endpush
