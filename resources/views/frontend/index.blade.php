@extends('layouts.app')
@section('title', 'BTCare | Home')
@section('content')
<!-- Main Container  -->
<div class="main-container">
    <div id="content">
        <div class="slider-full">
            <div class="module sohomepage-slider ">
                <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    @foreach($sliders as $slider)
                    <div class="yt-content-slide">
                        <a title="{{ $slider->title }}" href="#"><img src="{{ $slider->image }}" alt="slide img" class="img-responsive"></a>
                    </div>
                    @endforeach
                </div>
                <div class="loadeding"></div>
            </div>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="block block_0">
                    <div class="block-categories module">
                        <h3 class="modtitle"><span>Shop by Category</span></h3>
                        <div class="yt-content-slider cate-content" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="5" data-items_column1="4" data-items_column2="4" data-items_column3="3" data-items_column4="2" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                            @foreach($productCategory as $category )
                            <div class="cate cate1">
                                <div class="inner"><a href="/category/{{$category->id}}"><img src="{{ $category->thumbnail_image }}" alt="Static Image"></a><a class="title-cate" href="/category/{{$category->id}}">{{ $category->category_name }}</a></div>
                            </div>
                            @endforeach
                            @foreach ($productSubCategory as $row)
                            <div class="cate cate1">
                                <div class="inner"><a href="/subcategory/{{$row->id}}"><img src="{{ $row->thumbnail_image }}" alt="Static Image"></a><a class="title-cate" href="/subcategory/{{$row->id}}">{{ $row->subcategory_name }}</a></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="block block_1">
                    <div class="row products-listing grid">
                        <div class="column small-11 small-centered product-layout col-md-9">
                            <div class="custom_deals_featured">
                                <h2 class="modtitle font-ct"><span>Today Deals</span></h2>
                                <div class="modcontent">
                                    <div class="slider slider-img slider-single">
                                        <div class="slick-slide" data-slick-index="1">
                                            <div class="product-item">
                                            @foreach($dealProduct as $dealProduct)
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="{{ url('/product/view/'.$dealProduct->id)}}" target="_self" title="Pastrami bacon">
                                                                <img src="{{ $dealProduct->main_image }}" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">
                                                            {{ number_format((($dealProduct->sale_price/$dealProduct->regular_price) * 100)-100, 0) . "%" }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="{{ url('/product/view/'.$dealProduct->id)}}" target="_self" title="{{ $dealProduct->product_name}}" tabindex="0">{{ $dealProduct->product_name}}</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                {{ strip_tags( $dealProduct->short_description ) }}
                                                            </p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">{{ "$".$dealProduct->sale_price }}{{-- $98.00 --}}</span>
                                                                <span class="price-old">{{ "$".$dealProduct->regular_price }}{{-- $122.00 --}}</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="2">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/2.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-18%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Deserunt mollitia" tabindex="0">Cuid densinteu</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$198.00</span>
                                                                <span class="price-old">$222.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="3">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/3.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Deserunt mollitia" tabindex="0">Dail mirentukan</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$100.00</span>
                                                                <span class="price-old">$110.00</span>
                                                            </p>
                                                            <!-- countdown box
                                                                    <div class="item-time-w">
                                                                        <div class="item-time">
                                                                            <div class="item-timer">
                                                                                <div class="defaultCountdown-30"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    end countdown box -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="4">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/4.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-15%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Deserunt mollitia" tabindex="0">Salmon Sokara</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$160.00</span>
                                                                <span class="price-old">$190.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="5">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/5.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-20%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Molliti Deserunt" tabindex="0">Molliti Deserunt</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$98.00</span>
                                                                <span class="price-old">$122.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="6">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/6.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-5%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Delivers Deserunt" tabindex="0">Delivers Deserunt</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$200.00</span>
                                                                <span class="price-old">$210.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="7">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Pastrami bacon">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/7.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-12%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Pastrami mollitia" tabindex="0">Pastrami mollitia</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$118.00</span>
                                                                <span class="price-old">$142.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="8">
                                            <div class="product-item">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Fession molliti">
                                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/300/3.jpg" class="img-1 img-responsive" alt="Fession molliti">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-16%</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="#" target="_self" title="Fession molliti" tabindex="0">Fession molliti</a></h4>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <p class="des_deal">
                                                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this dis..</p>
                                                            <p class="price font-ct">
                                                                <span class="price-new">$98.00</span>
                                                                <span class="price-old">$122.00</span>
                                                            </p>
                                                            <!--countdown box-->
                                                            <div class="item-time-w">
                                                                <div class="item-time">
                                                                    <div class="item-timer">
                                                                        <div class="defaultCountdown-30"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end countdown box-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider slider-item slider-nav">
                                        <div class="item-slick" data-slick-index="1">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/1.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-20%</span>
                                                </div>
                                            </div>
                                            <span class="title">Deserunt mollitia</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="2">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/2.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-18%</span>
                                                </div>
                                            </div>
                                            <span class="title">Cuid densinteu</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="3">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/3.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-10%</span>
                                                </div>
                                            </div>
                                            <span class="title">Dail mirentukan</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="4">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/4.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-15%</span>
                                                </div>
                                            </div>
                                            <span class="title">Salmon Sokara</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="5">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/5.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-20%</span>
                                                </div>
                                            </div>
                                            <span class="title">Molliti Deserunt</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="6">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/6.jpg" class="img-1 img-responsive" alt="Pastrami bacon">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-5%</span>
                                                </div>
                                            </div>
                                            <span class="title">Delivers Deserunt</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="7">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/7.jpg" class="img-1 img-responsive" alt="Pastrami mollitia">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-12%</span>
                                                </div>
                                            </div>
                                            <span class="title">Pastrami mollitia</span>
                                        </div>
                                        <div class="item-slick" data-slick-index="8">
                                            <div class="item-img">
                                                <img src="{{ asset('frontend/') }}/image/catalog/demo/product/80/8.jpg" class="img-1 img-responsive" alt="Fession molliti">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-16%</span>
                                                </div>
                                            </div>
                                            <span class="title">Fession molliti</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="module best-seller best-seller-custom">
                                <h3 class="modtitle">
                                    <span><i class="fa fa-diamond fa-hidden"></i>Best Sellers</span>
                                </h3>
                                <div class="modcontent">
                                    <div id="so_extra_slider_1" class="so-extraslider">
                                        <!-- Begin extraslider-inner -->
                                        <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                            @foreach ($bestsalers as $product)
                                            <div class="item ">
                                                <div class="item-wrap style1">
                                                    <div class="item-wrap-inner">
                                                        <div class="media-left">
                                                            <div class="item-image">
                                                                <div class="item-img-info">
                                                                    <a href="{{ url('product/view', $product->id) }}" target="_self" title="Mandouille short ">
                                                                        <img src="{{ $product->main_image }}" alt="Mandouille short">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="item-info">
                                                                <div class="item-title">
                                                                    <a href="{{ url('product/view', $product->id) }}" target="_self" title="Mandouille short">{{ $product->product_name }} </a>
                                                                </div>
                                                                <div class="rating">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                </div>
                                                                <div class="content_price price">
                                                                    <span class="price-new product-price">${{ $product->sale_price }} </span>&nbsp;&nbsp;
                                                                    <span class="price-old">${{ $product->regular_price }} </span>&nbsp;
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--End extraslider-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block_3">
                    <!-- Listing tabs -->
                    <div class="module custom-listingtab default-nav">
                        <div class="box-title font-ct">
                            <h2 class="modtitle">LATEST PRODUCTS</h2>
                        </div>
                        <div class="modcontent">
                            <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                                <div class="loadeding"></div>
                                <div class="ltabs-wrap">
                                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="4" data-sm="3" data-xxs="3" data-xs="1" data-margin="0">
                                        <!--Begin Tabs-->
                                        <div class="ltabs-tabs-wrap">
                                            <span class="ltabs-tab-selected">Best sellers</span> <span class="ltabs-tab-arrow">▼</span>
                                            <ul class="ltabs-tabs cf font-ct list-sub-cat">
                                                <li class="ltabs-tab tab-sel" data-category-id="11" data-active-content=".items-category-11"> <span class="ltabs-tab-label"></span> </li>
                                            </ul>
                                        </div>
                                        <!-- End Tabs-->
                                    </div>
                                    <div class="wap-listing-tabs products-list grid">
                                        <div class="item-cat-image banners">
                                            <div>
                                                <a href="#" title="" target="_self">
                                                    <img class="categories-loadimage" title="" alt="" src="{{ asset('frontend/') }}/image/catalog/demo/banners/home1/6-196x540.jpg">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ltabs-items-container">
                                            <!--Begin Items-->
                                            <div class="ltabs-items ltabs-items-selected items-category-11" data-total="16">
                                                <div class="ltabs-items-inner ltabs-slider">
                                                    @foreach ($latestproducts as $product)
                                                    <div class="ltabs-item">
                                                        <div class="item-inner product-thumb transition product-layout">
                                                            <div class="product-item-container">
                                                                <div class="left-block left-b">
                                                                    <div class="product-image-container">
                                                                        <a href="{{ url('product/view', $product->id) }}" target="_self" title="Ullamco occaeca">
                                                                            <img src="{{ $product->main_image }}" class="img-1 img-responsive" alt="image">
                                                                        </a>
                                                                    </div>
                                                                    <!--quickview-->
                                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                                    <!--end quickview-->
                                                                </div>
                                                                <div class="right-block right-b">
                                                                    <div class="caption">
                                                                        <h4><a href="{{ url('product/view', $product->id) }}" title="Ullamco occaeca" target="_self">{{ $product->product_name }}</a></h4>
                                                                        <div class="price"> <span class="price-new">${{ $product->sale_price }}</span>
                                                                        <span class="price-old">${{ $product->regular_price }}</span>
                                                                        </div>
                                                                        <div class="button-group so-quickview cartinfo--static">
                                                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');"> <i class="fa fa-shopping-basket"></i>
                                                                                <span>Add to cart </span>
                                                                            </button>
                                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                                            </button>
                                                                            <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="ltabs-items items-category-12 grid" data-total="16">
                                                <div class="ltabs-loading"></div>
                                            </div>
                                            <div class="ltabs-items  items-category-13 grid" data-total="16">
                                                <div class="ltabs-loading"></div>
                                            </div>
                                            <!--End Items-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Listing tabs -->
                </div>
                <div class="block block_2">
                    <div class="h1-banner2">
                        <div class="row banners">
                            <div class="banner21 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a href="#">
                                    <img src="{{ asset('uploads/frontend/image/ad-banner/'. $ad_banner->first_image) }}" alt="Image Client">
                                </a>
                            </div>
                            <div class="banner21 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a href="#">
                                    <img src="{{ asset('uploads/frontend/image/ad-banner/'. $ad_banner->second_image) }}" alt="Image Client">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block_4">
                    <!-- Listing tabs -->
                    <div class="block block_5">
                        <!-- Listing tabs -->
                        <div class="module custom-listingtab default-nav">
                            <div class="box-title font-ct">
                                <h2 class="modtitle">FEATURED PRODUCTS</h2>
                            </div>
                            <div class="modcontent">
                                <div id="so_listing_tabs_3" class="so-listing-tabs first-load">
                                    <div class="loadeding"></div>
                                    <div class="ltabs-wrap">
                                        <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="4" data-sm="3" data-xxs="3" data-xs="1" data-margin="0">
                                            <!--Begin Tabs-->
                                            <div class="ltabs-tabs-wrap">
                                                <span class="ltabs-tab-selected">Bathroom</span> <span class="ltabs-tab-arrow">▼</span>
                                                <div class="ltabs-tabs cf font-ct list-sub-cat">
                                                    <ul class="ltabs-tabs cf">
                                                        <li class="ltabs-tab tab-sel" data-category-id="17" data-active-content=".items-category-17"> <span class="ltabs-tab-label">Best sellers</span> </li>
                                                        <li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label">New Arrivals</span> </li>
                                                        <li class="ltabs-tab " data-category-id="19" data-active-content=".items-category-19"> <span class="ltabs-tab-label">Most Rating</span> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Tabs-->
                                        </div>
                                        <div class="wap-listing-tabs products-list grid">
                                            <div class="item-cat-image banners">
                                                <div>
                                                    <a href="#" title="" target="_self">
                                                        <img class="categories-loadimage" title="" alt="" src="{{ asset('frontend/') }}/image/catalog/demo/banners/home1/8-196x540.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ltabs-items-container">
                                                <!--Begin Items-->
                                                <div class="ltabs-items ltabs-items-selected items-category-17" data-total="16">
                                                    <div class="ltabs-items-inner ltabs-slider">
                                                        <!-- end item listing tab -->
                                                        @foreach ($featuredproducts as $product)
                                                        <div class="ltabs-item">
                                                            <div class="item-inner product-thumb transition product-layout">
                                                                <div class="product-item-container">
                                                                    <div class="left-block left-b">
                                                                        <div class="product-image-container">
                                                                            <a href="{{ url('product/view', $product->id) }}" target="_self" title="dolore Jalapeno">
                                                                                <img src="{{ $product->main_image }}" class="img-1 img-responsive" alt="image">
                                                                            </a>
                                                                        </div>
                                                                        <!--quickview-->
                                                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                                        <!--end quickview-->
                                                                    </div>
                                                                    <div class="right-block right-b">
                                                                        <div class="caption">
                                                                            <h4><a href="{{ url('product/view', $product->id) }}" title="Dolore Jalapeno" target="_self">{{ $product->product_name }}</a></h4>
                                                                            <div class="price"> <span class="price-new">${{ $product->sale_price }}</span>
                                                                            </div>
                                                                            <div class="button-group so-quickview cartinfo--static">
                                                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');"> <i class="fa fa-shopping-basket"></i>
                                                                                    <span>Add to cart </span>
                                                                                </button>
                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                                                </button>
                                                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Main Container -->

    @include('layouts.front-inc.footer')

    @if($popup_banner->banner_status == 1)
        @include('layouts.front-inc.popup_banner');
    @endif

@endsection
