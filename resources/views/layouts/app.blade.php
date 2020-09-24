<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic page needs
    ============================================ -->
    <title>@if(!empty($meta_title)) {{ $meta_title }} @else @yield('title') @endif</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="Revo is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon
    ============================================ -->

    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/') }}/ico/favicon-16x16.png" />
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('frontend/') }}/css/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('frontend/') }}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/lib.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/js/minicolors/miniColors.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}/css/custom.css">
    <!-- Theme CSS
    ============================================ -->
    <link href="{{ asset('frontend/') }}/css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/so-categories.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/themecss/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/footer/footer1.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/header/header2.css" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('frontend/') }}/css/theme.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/responsive.css" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{asset('frontend/css/sweet-alert.min.css')}}" rel="stylesheet">
    <!-- Toastr Css -->
    <link href="{{asset('frontend/css/toastr.css')}}" rel="stylesheet">

    <script type="text/javascript">
        if (screen.width <= 699) {
            document.location = "http://m.btcaresupply.com/";
        }
    </script>
        
    <script type="text/javascript">
        if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
            location.replace("http://m.btcaresupply.com/");
        }
    </script>
    

    <!-- Google web fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel='stylesheet' type='text/css'>

    <style>
        body {
            font-family: 'Open Sans', sans-serif
        }

        .font-ct,
        h1,
        h2,
        h3,
        .des_deal,
        .item-time-w,
        .item-time-w .name-time,
        .static-menu a.main-menu,
        .container-megamenu.vertical .vertical-wrapper ul li>a strong,
        .container-megamenu.vertical .vertical-wrapper ul.megamenu li .sub-menu .content .static-menu .menu ul li a.main-menu,
        .horizontal ul.megamenu>li>a,
        .footertitle,
        .module h3.modtitle span,
        .breadcrumb li a,
        .item-title a,
        .best-seller-custom .item-info,
        .product-box-desc,
        .product_page_price .price-new,
        .list-group-item a,
        #menu ul.nav>li>a,
        .megamenuToogle-pattern,
        .right-block .caption h4,
        .price,
        .box-price {
            font-family: Raleway, sans-serif;
        }

        /*Cookie Consent Begin*/
        #cookieConsent {
            background-color: rgba(20,20,20,0.8);
            min-height: 26px;
            font-size: 14px;
            color: #ccc;
            line-height: 26px;
            padding: 8px 0 8px 30px;
            font-family: "Trebuchet MS",Helvetica,sans-serif;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
            z-index: 9999;
        }
        #cookieConsent a {
            color: #4B8EE7;
            text-decoration: none;
        }
        #closeCookieConsent {
            float: right;
            display: inline-block;
            cursor: pointer;
            height: 20px;
            width: 20px;
            margin: -15px 0 0 0;
            font-weight: bold;
        }
        #closeCookieConsent:hover {
            color: #FFF;
        }
        #cookieConsent a.cookieConsentOK {
            background-color: #F1D600;
            color: #000;
            display: inline-block;
            border-radius: 5px;
            padding: 0 20px;
            cursor: pointer;
            float: right;
            margin: 0 60px 0 10px;
        }
        #cookieConsent a.cookieConsentOK:hover {
            background-color: #E0C91F;
        }
        /*Cookie Consent End*/

    </style>
</head>

<body class="common-home res layout-1" {{-- oncontextmenu="return false; --}}">
    <div id="wrapper" class="wrapper-fluid banners-effect-7">
        <!-- Header Container  -->
        <header id="header" class=" typeheader-2">
            <!-- Header Top -->
            <div class="header-top hidden-compact">
                <div class="container">
                    <div class="row">
                        <div class="header-top-left  col-lg-12 col-sm-5 col-md-6 hidden-xs"> <span class="hidden-sm">
                                <marquee behavior="" direction="">{{ $gs->top_header }}</marquee>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Header Top -->
                <!-- Header center -->
                <div class="header-center">
                    <div class="container">
                        <div class="row">
                            <!-- Logo -->
                            <div class="navbar-logo col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('uploads/frontend/image/'.$gs->logo) }}" title="Your Store" alt="Your Store" />
                                    </a>
                                </div>
                            </div>
                            <!-- //end Logo -->
                            <!-- Main menu -->
                            <div class="header-center-right col-lg-9 col-md-9 col-sm-12 col-xs-12">

                                <?php $content = Cart::content();?>

                                <!-- User Profile Start -->
                                <div class="block-cart">
                                    <div class="shopping_cart">
                                        <div id="cart" class="btn-shopping-cart">
                                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <div class="shopcart">
                                                    <span class="icon-c hidden">
                                                        <i class="fa fa-shopping-bag"></i>
                                                    </span>
                                                    <div class="shopcart-inner">
                                                        <p class="text-shopping-cart hidden">
                                                            My cart
                                                        </p>
                                                        <span class="total-shopping-cart cart-total-full">
                                                            <span class="items_cart">{{ Cart::count() }}</span>
                                                            {{-- <span class="items_cart2 hidden"> item(s)</span>
                                                            <span class="items_carts hidden"> - $152.00 </span> --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                                <li>
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        @foreach($content as $row)
                                                            <tr>
                                                                <td class="text-center" style="width:70px">
                                                                    <a href="#">
                                                                        <img src="{{asset('uploads/frontend/image/product/'.$row->options->main_image)}}" style="width:70px" alt="Yutculpa ullamcon" title="Yutculpa ullamco" class="preview">
                                                                    </a>
                                                                </td>
                                                                <td class="text-left"> <a class="cart_product_name" href="{{ url('product/view', $row->id) }}">{{ $row->name }}</a>
                                                                </td>
                                                                <td class="text-center">{{"x".$row->qty }}</td>
                                                                <td class="text-center">{{"$".$row->price }}</td>
                                                                <td class="text-right">
                                                                    <a href="product.html" class="fa fa-edit"></a>
                                                                </td>
                                                                <td class="text-right">
                                                                    <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </li>
                                                <li>
                                                    <div>
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-left"><strong>Sub-Total</strong>
                                                                    </td>
                                                                    <td class="text-right">{{"$". Cart::subtotal() }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                                    </td>
                                                                    <td class="text-right">{{"$". Cart::tax() }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left"><strong>VAT (20%)</strong>
                                                                    </td>
                                                                    <td class="text-right">$20.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left"><strong>Total</strong>
                                                                    </td>
                                                                    <td class="text-right">{{"$". Cart::total() }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p class="text-center total-carts"> <a class="btn view-cart" href="{{ route('show.cart') }}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="{{ route('order.checkout') }}"><i class="fa fa-share"></i>Checkout</a>
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- User Profile End -->
                                <!-- User Wishlist Start -->
                                @if(Route::has('login'))
                                <div class="block-cart">
                                    <div class="whishlist">
                                    @auth
                                        <div id="cart" class="btn-shopping-cart">
                                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <div class="shopcart">
                                                    <span class="icon-c hidden">
                                                        <i class="fa fa-heart"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    @endauth
                                    </div>
                                </div>
                                @else
                                <div class="block-cart">
                                    <div class="whishlist">
                                        <div id="cart" class="btn-shopping-cart">
                                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <div class="shopcart">
                                                    <span class="icon-c hidden">
                                                        <i class="fa fa-heart"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Whishlist End -->
                                <!-- User Profile Start -->
                                <div class="block-cart">
                                    <div class="user-profile">
                                        <div id="cart" class="btn-user-profile">
                                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true"></a>
                                            @if (Route::has('login'))
                                            <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                                @auth
                                                <ul>
                                                    <li><a href="{{ route('my.account', Auth::user()->id) }}">MY ACCOUNT</a>
                                                    </li>
                                                    <li><a href="#">ORDER</a>
                                                    </li>
                                                    <li><a href="{{ route('wish.list', Auth::user()->id) }}">Wish list</a>
                                                    </li>
                                                </ul>
                                                <a class="btn" href="{{ route('user.logout') }}" name="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">@csrf
                                                @else
                                                <ul>
                                                    <li class="text-center"><a href="{{ route('login') }}">Login</a></li>
                                                    <hr>
                                                    <li class="text-center"><a href="{{ route('user.register') }}">Register</a></li>
                                                </ul>
                                                @endauth
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Username -->
                                @if (Route::has('login'))
                                <div class="block-cart">
                                @auth
                                    <span class="header_username">
                                        <span>Welcome,</span>
                                        <span>{{ Auth::user()->first_name }}</span>
                                    </span>
                                @endauth
                                </div>
                                @endif
                                <!-- User Name End -->
                                <!-- Search -->
                                <div class="header_search">
                                    <div id="sosearchpro" class="sosearchpro-wrapper so-search">
                                        <form method="GET" action="index.php">
                                            <div id="search0" class="search input-group form-group">
                                                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                                                <ul class="dropdown-menu" style="display: none;"></ul> <span class="input-group-btn">
                                                    <button type="submit" class="button-search btn btn-default btn-lg" name="submit_search"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                            <input type="hidden" name="route" value="product/search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- //end Main menu -->
                        </div>
                    </div>
                </div>
                <!-- //Header center -->
                <!-- Header Bottom -->
                <div class="header-bottom hidden-compact">
                    <div class="container">
                        <div class="header-bottom-inner">
                            <div class="row">
                                <div class="header-bottom-left menu-vertical col-md-3 col-sm-2 col-xs-2">
                                    <div class="responsive so-megamenu megamenu-style-dev ">
                                        <div class="so-vertical-menu ">
                                            <nav class="navbar-default">
                                                <div class="container-megamenu vertical">
                                                    <div id="menuHeading">
                                                        <div class="megamenuToogle-wrapper">
                                                            <div class="megamenuToogle-pattern">
                                                                <div class="container">
                                                                    <div> <span></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div> <span class="title-mega">All Departments</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="navbar-header">
                                                        <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                        </button>
                                                    </div>
                                                    <div class="vertical-wrapper">
                                                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                        <div class="megamenu-pattern">
                                                            <div class="container-mega">
                                                                <ul class="megamenu">
                                                                    @foreach($menus as $menu)
                                                                    <li class="item-vertical {{ request()->is('category/'.$menu->id) ? 'active' : ''}} with-sub-menu hover">
                                                                        <p class="close-menu"></p>
                                                                        <a href="/category/{{$menu->id}}" class="clearfix">
                                                                             <span>
                                                                                <img src="{{ asset('frontend/') }}/image/catalog/menu/icons/icon-1.png" alt="icon">
                                                                                <strong>{{ $menu->name }}</strong>
                                                                            </span>
                                                                            <b class="fa fa-angle-right"></b>
                                                                        </a>
                                                                        <div class="sub-menu" data-subwidth="80">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        {{-- @if(!empty($categories['subcategories'])) --}}
                                                                                                        @foreach($menu->subcategory as $subcategory)
                                                                                                            <li>
                                                                                                                    <a href="#" class="main-menu">{{ $subcategory->subcategory_name}}</a>
                                                                                                                    {{-- <ul>
                                                                                                                        <li><a href="#">Blouses & Shirts</a></li>
                                                                                                                        <li><a href="#">Suits & Sets</a></li>
                                                                                                                        <li><a href="#">Jumpsuits</a></li>
                                                                                                                        <li><a href="#">Sleep & Lounge</a></li>
                                                                                                                        <li><a href="#">Wool & Blends</a></li>
                                                                                                                    </ul> --}}
                                                                                                                </li>
                                                                                                            @endforeach
                                                                                                        {{-- @endif --}}
                                                                                                        {{-- @if(!empty($categories['subcategories']))
                                                                                                            @foreach($categories['subcategories'] as $subcategory)
                                                                                                        <li>
                                                                                                                <a href="#" class="main-menu">{{ $subcategory->subcategory_name}}</a>
                                                                                                                {{-- <ul>
                                                                                                                    <li><a href="#">Blouses & Shirts</a></li>
                                                                                                                    <li><a href="#">Suits & Sets</a></li>
                                                                                                                    <li><a href="#">Jumpsuits</a></li>
                                                                                                                    <li><a href="#">Sleep & Lounge</a></li>
                                                                                                                    <li><a href="#">Wool & Blends</a></li>
                                                                                                                </ul> --}}
                                                                                                            </li>
                                                                                                            {{-- @endforeach
                                                                                                        @endif --}}
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-bottom-right col-md-9 col-sm-10 col-xs-10">
                                    <div class="header-menu col-lg-12 col-md-12 col-sm-12 col-xs-9">
                                        <div class="megamenu-style-dev megamenu-dev">
                                            <div class="responsive so-megamenu megamenu-style-dev">
                                                <nav class="navbar-default">
                                                    <div class=" container-megamenu  horizontal open ">
                                                        <div class="navbar-header">
                                                            <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                            </button>
                                                        </div>
                                                        <div class="megamenu-wrapper">
                                                            <span id="remove-megamenu" class="fa fa-times"></span>
                                                            <div class="megamenu-pattern">
                                                                <div class="container-mega">
                                                                    <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                                        @foreach($menus as $menu)
                                                                        <li class="{{ request()->is('category/'.$menu->id) ? 'active' : ''}} with-sub-menu hover">
                                                                            <p class="close-menu"></p>
                                                                            <a href="/category/{{$menu->id}}" class="clearfix">
                                                                                <strong>{{ $menu->name }}</strong>
                                                                                {{-- <span class="label"></span> --}}
                                                                                <b class="caret"></b>
                                                                            </a>
                                                                            <div class="sub-menu" style="width: 30%; right: auto;">
                                                                                <div class="content">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="column">
                                                                                                <div>
                                                                                                    <ul class="row-list">
                                                                                                        @foreach($menu->subcategory as $subcategory)
                                                                                                        <li>
                                                                                                            <a href="#" class="main-menu">
                                                                                                                {{ $subcategory->subcategory_name}}
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Secondary menu -->
                                    <div class="header-right pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <!-- //Header Container  -->

        @yield('content')

        <div id="cookieConsent">
            <div id="closeCookieConsent">x</div>
            This website is using cookies. <a href="#">More info</a>. <a class="cookieConsentOK" href="#">That's Fine</a>
        </div>

        <!-- Include Libs & Plugins
============================================ -->

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('frontend/') }}/js/jquery-2.2.4.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/owl-carousel/owl.carousel.js"></script>
        <script src="{{ asset('frontend/') }}/js/themejs/libs.js"></script>
        <script src="{{ asset('frontend/') }}/js/unveil/jquery.unveil.js"></script>
        <script src="{{ asset('frontend/') }}/js/countdown/jquery.countdown.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/datetimepicker/moment.js"></script>
        <script src="{{ asset('frontend/') }}/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/modernizr/modernizr-2.6.2.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/minicolors/jquery.miniColors.min.js"></script>
        <!-- Theme files
============================================ -->
        <script src="{{ asset('frontend/') }}/js/themejs/application.js"></script>
        <script src="{{ asset('frontend/') }}/js/themejs/homepage.js"></script>
        <script src="{{ asset('frontend/') }}/js/themejs/so_megamenu.js"></script>
        <script src="{{ asset('frontend/') }}/js/themejs/addtocart.js"></script>
        <script src="{{ asset('frontend/') }}/js/themejs/cpanel.js"></script>
        <script src="{{ asset('frontend/') }}/assets/js/custom.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/custom.js"></script>

        <script>
            $(document).ready(function () {

            //Disable cut copy paste

            $(document).bind('cut copy paste', function (e) {

            e.preventDefault();
            });

            });
        </script>

        <!-- Toastr -->
        <script src="{{asset('frontend/js/toastr.min.js')}}"></script>

        <script type="text/javascript">
            @if(Session::has('message'))
            var type = "{{Session::get('alert-type', 'info')}}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif

        </script>
        <!-- sweet alerts -->
        <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
        <script>
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                        title: "Are you sure?"
                        , text: "Once deleted, you will not be able to recover this file!"
                        , icon: "warning"
                        , buttons: true
                        , dangerMode: true
                    , })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = link;
                        }
                    });
            });

        </script>
        <script>
            $(document).on("click", "#edit", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                        title: "Are you sure?"
                        , text: "Any Change can not be undo."
                        , icon: "info"
                        , buttons: true
                        , dangerMode: true
                    , })
                    .then((willEdit) => {
                        if (willEdit) {
                            window.location.href = link;
                        }
                    });
            });

        </script>

        <script>
            $(document).ready(function(){
                setTimeout(function () {
                    $("#cookieConsent").fadeIn(200);
                }, 4000);
                $("#closeCookieConsent, .cookieConsentOK").click(function() {
                    $("#cookieConsent").fadeOut(200);
                });
            });
        </script>


</body>

</html>
