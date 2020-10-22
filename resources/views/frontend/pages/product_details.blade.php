@extends('layouts.app')

@section('title', $productdetail->product_name )

@section('content')
<!-- Main Container  -->
<div class="main-container container product-detail  desktop-offcanvas">
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">DiSPOSABLE MASK</a></li>
        <li><a href="#">{{ $productdetail->product_name }}</a></li>
    </ul>
    <div class="row">
        <!--Left Part Start -->
        <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas" id="column-left">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="module category-style">
                <h3 class="modtitle"><i class="fa fa-tasks"></i>Categories</h3>
                <div class="modcontent">
                    <div class="box-category">
                        <ul id="cat_accordion" class="list-group">
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Smartphone & Tablets</a>
                                <span class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: block;">
                                    <li><a href="category.html">Men's Watches</a></li>
                                    <li><a href="category.html">Women's Watches</a></li>
                                    <li><a href="category.html">Kids' Watches</a></li>
                                    <li><a href="category.html">Accessories</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a class="cutom-parent" href="category.html">Electronics</a> <span
                                    class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Cycling</a></li>
                                    <li><a href="category.html">Running</a></li>
                                    <li><a href="category.html">Swimming</a></li>
                                    <li><a href="category.html">Football</a></li>
                                    <li><a href="category.html">Golf</a></li>
                                    <li><a href="category.html">Windsurfing</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Shoes</a> <span
                                    class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Watches</a> <span
                                    class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Men's Watches</a></li>
                                    <li><a href="category.html">Women's Watches</a></li>
                                    <li><a href="category.html">Kids' Watches</a></li>
                                    <li><a href="category.html">Accessories</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Jewellery</a> <span
                                    class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a> <span
                                    class="dcjq-icon"></span></li>
                            <li class=""><a href="category.html" class="cutom-parent">Kids &amp; Babies</a> <span
                                    class="dcjq-icon"></span></li>
                            <li class=""><a href="category.html" class="cutom-parent">Sports</a> <span
                                    class="dcjq-icon"></span></li>
                            <li class=""><a href="category.html" class="cutom-parent">Home &amp; Garden</a><span
                                    class="dcjq-icon"></span></li>
                            <li class=""><a href="category.html" class="cutom-parent">Wines &amp; Spirits</a> <span
                                    class="dcjq-icon"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="module product-simple best-seller">
                <h3 class="modtitle">
                    <span><i class="fa fa-diamond fa-hidden"></i>Latest products</span>
                </h3>
                <div class="modcontent">
                    <div class="so-extraslider">
                        <!-- Begin extraslider-inner -->
                        <div class=" extraslider-inner">
                            <div class="item ">
                                <div class="product-layout item-inner style1 ">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="#" target="_self" title="Mandouille short ">
                                                <img src="image/catalog/demo/product/80/8.jpg" alt="Mandouille short">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-title">
                                            <a href="#" target="_self" title="Mandouille short">Mandouille short </a>
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        </div>
                                        <div class="content_price price">
                                            <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;
                                            <span class="price-old">$76.00 </span>&nbsp;
                                        </div>
                                    </div>
                                    <!-- End item-info -->
                                    <!-- End item-wrap-inner -->
                                </div>
                                <!-- End item-wrap -->
                                <div class="product-layout item-inner style1 ">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="#" target="_self" title="Xancetta bresao ">
                                                <img src="image/catalog/demo/product/80/7.jpg" alt="Xancetta bresao">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-title">
                                            <a href="#" target="_self" title="Xancetta bresao">
                                                Xancetta bresao
                                            </a>
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        </div>
                                        <div class="content_price price">
                                            <span class="price-new product-price">$80.00 </span>&nbsp;&nbsp;
                                            <span class="price-old">$89.00 </span>&nbsp;
                                        </div>
                                    </div>
                                    <!-- End item-info -->
                                    <!-- End item-wrap-inner -->
                                </div>
                                <!-- End item-wrap -->
                                <div class="product-layout item-inner style1 ">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="#" target="_self" title="Sausage cowbee ">
                                                <img src="image/catalog/demo/product/80/6.jpg" alt="Sausage cowbee">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-title">
                                            <a href="#" target="_self" title="Sausage cowbee">
                                                Sausage cowbee
                                            </a>
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        </div>
                                        <div class="content_price price">
                                            <span class="price product-price">
                                                $66.00
                                            </span>
                                        </div>
                                    </div>
                                    <!-- End item-info -->
                                    <!-- End item-wrap-inner -->
                                </div>
                                <!-- End item-wrap -->
                                <div class="product-layout item-inner style1 ">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="#" target="_self" title="Chicken swinesha ">
                                                <img src="image/catalog/demo/product/80/5.jpg" alt="Chicken swinesha">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-title">
                                            <a href="#" target="_self" title="Chicken swinesha">
                                                Chicken swinesha
                                            </a>
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        </div>
                                        <div class="content_price price">
                                            <span class="price-new product-price">$45.00 </span>&nbsp;&nbsp;
                                            <span class="price-old">$56.00 </span>&nbsp;
                                        </div>
                                    </div>
                                    <!-- End item-info -->
                                    <!-- End item-wrap-inner -->
                                </div>
                                <!-- End item-wrap -->
                            </div>
                        </div>
                        <!--End extraslider-inner -->
                    </div>
                </div>
            </div>
            <div class="module banner-left hidden-xs ">
                <div class="banner-sidebar banners">
                    <div>
                        <a title="Banner Image" href="#">
                            <img src="image/catalog/banners/banner-sidebar.jpg" alt="Banner Image">
                        </a>
                    </div>
                </div>
            </div>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-12">
            <div class="product-view">
                <div class="left-content-product">
                    <div class="row">
                        <div class="content-product-left col-md-6 col-sm-12 col-xs-12">
                            <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                <ul class="thumb-vertical">
                                    @foreach ($productdetail->allImages as $row)                        
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail" data-image="{{ $row->product_image }}" title="{{ $productdetail->product_name }}">
                                            <img src="{{ $row->product_image }}" title="{{ $productdetail->product_name }}" alt="{{ $productdetail->product_name }}">
                                        </a>
                                    </li>
                                    {{--  <li class="owl2-item">
                                        <a data-index="1" class="img thumbnail " data-image="{{ $row->product_image }}" title="Chicken swinesha">
                                            <img src="{{ $row->product_image }}" title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="2" class="img thumbnail" data-image="{{ $row->product_image }}" title="Chicken swinesha">
                                            <img src="{{ $row->product_image }}" title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="3" class="img thumbnail" data-image="{{ $row->product_image }}" title="Chicken swinesha">
                                            <img src="{{ $row->product_image }}" title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>  --}}
                                    @endforeach
                                </ul>
                            </div>
                            <div class="large-image large-image2 vertical">
                                <img itemprop="image" class="product-image-zoom"
                                src="{{ $productdetail->main_image }}"
                                data-zoom-image="{{ $productdetail->main_image }}"
                                title="{{ $productdetail->product_name }}" alt="{{ $productdetail->product_name }}">
                            </div>
                            <a class="thumb-video pull-left" href="{{ $productdetail->video_url }}"><i
                                    class="fa fa-youtube-play"></i></a>
                        </div>
                        <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                            <div class="title-product">
                                <h1>{{ $productdetail->product_name }}</h1>
                            </div>
                            <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                itemtype="http://data-vocabulary.org/Offer">
                                @if ($productdetail->sale_price>NULL)
                                <span class="price-new"><span itemprop="price" id="price-special">{{ "$".$productdetail->sale_price }}</span></span>
                                <span class="price-old" id="price-old">{{ "$".$productdetail->regular_price }}</span>
                                <span class="label-product label-sale">
                                    {{ number_format((($productdetail->sale_price/$productdetail->regular_price) * 100)-100, 0) . "%" }}
                                </span>
                                @else
                                <span class="price-new"><span itemprop="price" id="price-special">{{ "$".$productdetail->regular_price }}</span></span>
                                @endif
                            </div>
                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="brand"><span>Brand:</span><a href="#">{{ $productdetail->brand_id > NULL ? $productdetail->brand->title : "No Brand Selected" }}</a> </div>
                                    <div class="model"><span>Product Code:</span>{{ $productdetail->sku }}</div>
                                    <div class="stock"><span>Availability:</span> <i class="fa fa-check-square-o"></i>
                                        In Stock</div>
                                </div>
                            </div>
                            <div class="short_description form-group">
                                <h3>OverView</h3>
                                {!! $productdetail->short_description !!}
                            </div>
                            <div id="product">
                                {{--  <h4>Available Options</h4>
                                <div class="image_option_type form-group required">
                                    <label class="control-label">Colors</label>
                                    <ul class="product-options clearfix" id="input-option231">
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="33">
                                                <img src="{{ asset('frontend/image/demo/colors/blue.jpg') }}" data-original-title="blue +$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="34">
                                                <img src="{{ asset('frontend/image/demo/colors/brown.jpg') }}"
                                                    data-original-title="brown -$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="35">
                                                <img src="{{ asset('frontend/image/demo/colors/green.jpg') }}"
                                                    data-original-title="green +$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="selected-option">
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label">Size</label>
                                    <div id="input-option472" style="margin-left: 71px; margin-top: -28px;">
                                        <div class="radio  radio-type-button">
                                            <label>
                                                <input type="radio" name="" value="418">
                                                <span class="option-content-box" data-title="Small +$30.00"
                                                    data-toggle="tooltip" data-original-title="" title="">
                                                    <span class="option-name"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label">Other</label>
                                    <div id="input-option472" style="margin-left: 71px; margin-top: -28px;">
                                        <div class="radio  radio-type-button">
                                            <label>
                                                <input type="radio" name="option[472]" value="418">
                                                <span class="option-content-box" data-title="Small +$30.00"
                                                    data-toggle="tooltip" data-original-title="" title="">
                                                    <span class="option-name">S</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="radio  radio-type-button">
                                            <label>
                                                <input type="radio" name="option[472]" value="417">
                                                <span class="option-content-box" data-title="Medium +$20.00"
                                                    data-toggle="tooltip" data-original-title="" title="">
                                                    <span class="option-name">M</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="radio  radio-type-button">
                                            <label>
                                                <input type="radio" name="option[472]" value="416">
                                                <span class="option-content-box" data-title="Large +$10.00"
                                                    data-toggle="tooltip" data-original-title="" title="">
                                                    <span class="option-name">L</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>  --}}
                                    <div class="form-group box-info-product">
                                    <form action="{{ url('cart/add')}}" method="POST">
                                    <input type="hidden" name="id" value="{{ $productdetail->id }}">@csrf
                                        <div class="option quantity">
                                            <div class="input-group quantity-control" unselectable="on"
                                                style="-webkit-user-select: none;">
                                                <input class="form-control" type="text" name="qty" value="1">
                                                <input type="hidden" name="product_id" value="">
                                                <span class="input-group-addon product_quantity_down">−</span>
                                                <span class="input-group-addon product_quantity_up">+</span>
                                            </div>
                                        </div>
                                        <div class="cart">
                                                <input type="submit" data-toggle="tooltip" title="" value="Add to Cart"
                                                data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" data-original-title="Add to Cart">

                                        </div>
                                    </form>
                                        <div class="add-to-links wish_comp">
                                            <ul class="blank list-inline">
                                            <form class="form" action="{{ route('add-to-wishlist') }}" method="POST">@csrf
                                                <input type="hidden" name="id" value="{{ $productdetail->id }}">
                                                <li class="wishlist">
                                                    <button class="btn" data-toggle="tooltip" data-original-title="Add to Wish List" type="submit"><i class="fa fa-heart"></i></button>
                                                </li>
                                            </form> 
                                            </ul>
                                        </div>
                                    </div>
                                <div class="form-group social_share_detail clearfix">
                                    <label class="">SHARE THIS:</label>
                                    <ul>
                                        <div class="addthis_inline_share_toolbox"></div>
                                        <script type="text/javascript"
                                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-529be2200cc72db5"></script>
                                    </ul>
                                </div>
                                <!--                                 <div class="form-group social-share clearfix">
                                    <img src="image/catalog/demo/payment/payments.png">
                                </div> -->
                            </div>
                            <!-- end box info product -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Tabs -->
            <div class="producttab clearfix">
                <div class="tabsslider horizontal-tabs col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-2">Specifications</a></li>
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-3">Docs</a></li>
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade active in">
                        {!! $productdetail->full_description !!}
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                            <a href="#">{!! $productdetail->specification !!}</a>
                        </div>
                        <div id="tab-3" class="tab-pane fade">
                        </div>
                        <div id="tab-review" class="tab-pane fade">
                            <div id="review">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        @foreach($productComments as $comment)
                                        <tr>
                                            <td style="width: 50%;"><strong>{{ $comment->name }}</strong></td>
                                            <td class="text-right">{{ $comment->created_at->format('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>{{ $comment->details }}</p>
                                                @if(!empty($comment->rating))
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        @if ($comment->rating==1)    
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @elseif($comment->rating==2)
                                                        <span class="fa fa-stack"><i
                                                            class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @elseif($comment->rating==3)
                                                        <span class="fa fa-stack"><i
                                                            class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @elseif($comment->rating==4)
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @elseif($comment->rating==5)
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right"></div>
                            </div>
                            <h2 id="review-title">Write a review</h2>
                            <div class="contacts-form">
                                <form action="{{ route('save.product.review',$productdetail->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group"> <span class="icon icon-user"></span>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group"> <span class="icon icon-user"></span>
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                    <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                                        <textarea class="form-control" name="details" placeholder="Your Review" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <b>Rating</b> <span>Bad</span>&nbsp;
                                       <input type="radio" name="rating" value="1"> &nbsp;
                                       <input type="radio" name="rating"
                                       value="2"> &nbsp;
                                       <input type="radio" name="rating"
                                       value="3"> &nbsp;
                                       <input type="radio" name="rating"
                                       value="4"> &nbsp;
                                       <input type="radio" name="rating"
                                       value="5"> &nbsp;<span>Good</span>
                                    <div class="buttons clearfix">
                                        <button type="submit" id="button-review" class="btn buttonGray">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Product Tabs -->
            <!-- Related Products -->
            <div class="related titleLine products-list grid module ">
                <h3 class="modtitle"><i class="fa fa-tags"></i>Related Products </h3>
                <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes"
                    data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6"
                    data-margin="20" data-items_column0="5" data-items_column1="3" data-items_column2="3"
                    data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no"
                    data-lazyload="yes" data-hoverpause="yes">
                    @foreach($latestproducts->chunk(2) as $chunk)
                    <div class="item">
                        <div class="product-layout">
                            @foreach($chunk as $row)
                            <div class="product-item-container">
                                <div class="left-block left-b">
                                    <div class="product-image-container">
                                        <a href="{{ url('product/view', $row->id) }}" target="_self" title="{{ $row->product_name }}">
                                            <img src="{{ $row->main_image }}"
                                                class="img-responsive" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <div class="right-block right-b">
                                    <div class="caption">
                                        <h4><a href="{{ url('product/view', $row->id) }}" title="{{ $row->product_name }}" target="_self">{{ \Illuminate\Support\Str::limit(strip_tags($row->product_name), 25)}}</a></h4>
                                        <div class="price">
                                            @if($row->sale_price>NULL)
                                            <span class="price-new">{{"$".$row->sale_price }}</span>
                                            <span class="price-old">{{"$".$row->regular_price }}</span>
                                            @else
                                            <span class="price-new">{{"$".$row->regular_price }}</span>
                                            @endif
                                        </div>
                                        <div class="button-group so-quickview cartinfo--static">
                                            <form action="{{ url('cart/add')}}" method="POST" style="display:inline-flex;">@csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="addToCart" title="Add to cart"><i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                            </form>
                                            <form class="form" action="{{ route('add-to-wishlist') }}" method="POST" style="display:inline-flex;">@csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button type="submit" class="wishlist btn-button" title="Add to Wish List"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end Related  Products-->
        </div>
        <!--Middle Part End-->
    </div>
</div>
<!-- End Main Container  -->
</div>
@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush
