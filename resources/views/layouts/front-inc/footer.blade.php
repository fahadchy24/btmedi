<!-- Footer Container -->
    <footer class="footer-container typefooter-1">
        <!-- Footer Top Container -->
        <section class="footer-top">
            <div class="container ftop">
                <div class="module footer-services ">
                    <div class="block-infos">
                        <div class="info info1">
                            <div class="inner">
                                <i class="fa fa-truck"></i>
                                <div class="info-cont">
                                    <span class="font-ct">free delivery</span>
                                    <p>From 275 AED</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info2">
                            <div class="inner">
                                <i class="fa fa-money"></i>
                                <div class="info-cont">
                                    <span class="font-ct">cash delivery</span>
                                    <p>From 275 AED</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info3">
                            <div class="inner">
                                <i class="fa fa-gift"></i>
                                <div class="info-cont">
                                    <span class="font-ct">free gift box</span>
                                    <p>&amp; gift note</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info4">
                            <div class="inner">
                                <i class="fa fa-phone-square"></i>
                                <div class="info-cont">
                                    <span class="font-ct">contact us</span>
                                    <p>123 456 789</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info5">
                            <div class="inner">
                                <i class="fa fa-diamond"></i>
                                <div class="info-cont">
                                    <span class="font-ct">Loyalty</span>
                                    <p>Rewarded</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Footer Top Container -->
        <div class="footer-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col-style">
                        <div class="module custom_link ">
                            <div class="module clearfix">
                                <h3 class="footertitle">INFORMATION</h3>
                                <ul id="menu-our-shops" class="menu">
                                    @foreach($footer_pages as $footer_page)
                                    <li class="menu-product-support"><a class="item-link" href="{{ url('/page/'.$footer_page->page_url) }}"><span class="menu-title">{{ $footer_page->meta_title }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col-style">
                        <div class="box-information box-footer">
                            <div class="module clearfix">
                                <h3 class="footertitle">DISCOVER</h3>
                                <div class="modcontent">
                                    <ul class="menu">
                                        @foreach($footer_menus as $ft_menu)
                                        <li><a href="/category/{{$ft_menu->id}}">{{ $ft_menu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xxs-6 col-xs-12 col-style">
                        <div class="box-service box-footer">
                            <div class="module clearfix">
                                <h3 class="footertitle">SUPPORT</h3>
                                <div class="modcontent">
                                    <ul class="menu">
                                        @if (Route::has('login'))
                                            @auth
                                                <li><a href="{{ route('my.account', Auth::user()->id) }}">My Account</a></li>
                                                <li><a href="{{ route('show.cart') }}">View Cart</a></li>
                                                <li><a href="{{ route('wish.list', Auth::user()->id) }}">View Wishlist</a></li>
                                            @else
                                            <li><a href="{{ route('login') }}">Wholesale Accounts</a></li>
                                            <li><a href="{{ route('login') }}">My Account</a></li>
                                            <li><a href="{{ route('show.cart') }}">View Cart</a></li>
                                            <li><a href="{{ route('show.cart') }}">View Wishlist</a></li>
                                            @endauth
                                        @endif
                                        <li><a href="{{ route('blog') }}">Blog</a></li>
                                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-style footer-contact">
                        <div class="module">
                            <div class="module footer-contact clearfix">
                                <h3 class="footertitle">Contact Us</h3>
                                <ul>
                                    <li><i class="fa fa-map-marker"></i><span> {{ $gs->street }}</span></li>
                                    <li class="email"><i class="fa fa-envelope-o"></i>{{ $gs->email }}</li>
                                    <li><i class="fa fa-mobile"></i><span>{{ $gs->phone_one }}</span><span> {{ $gs->phone_two }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-center-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 col-style footer-newsletter">
                        <div class="module news-letter">
                            <div class="so-custom-default newsletter">
                                <div class="btn-group title-block">
                                    <div class="popup-title page-heading">
                                        SIGN UP FOR NEWSLETTER
                                    </div>
                                    <div class="newsletter_promo">Duis at ante non massa consectetur iaculis id non tellus</div>
                                </div>
                                <div class="modcontent block_content">
                                    <form action="{{ route('subscribe.submit') }}" method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">@csrf
                                        <div class="input-group ">
                                            <div class="input-box">
                                                <input type="email" placeholder="Your email address..." value="" class="form-control" id="email" name="email" size="55">
                                            </div>
                                            @error('email')
                                                <p class="ml-4 text-danger">This email has been subscribed already.</p>
                                            @enderror
                                            <div class="input-group-btn subcribe">
                                                <button class="btn btn-primary" type="submit">
                                                    Subscribe
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--/.modcontent-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-style footer-socials-wrap">
                        <div class="module">
                            <div class="socials-wrap">
                                <h3 class="title-follow footertitle">Follow Us</h3>
                                <ul>
                                    @if($social_links->f_status == 1)
                                    <li class="li-social facebook-social">
                                        <a title="Facebook" href="{{ $social_links->facebook }}" target="_blank">
                                            <span class="fa fa-facebook icon-social"></span><span class="name-social">Facebook</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($social_links->t_status == 1)
                                    <li class="li-social twitter-social">
                                        <a title="Twitter" href="{{ $social_links->twitter }}" target="_blank">
                                            <span class="fa fa-twitter icon-social"></span> <span class="name-social">Twitter</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($social_links->i_status == 1)
                                    <li class="li-social google-social">
                                        <a title="instragam" href="{{ $social_links->instagram }}" target="_blank">
                                            <span class="fa fa-instagram"></span> <span class="name-social">Instragam</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($social_links->p_status == 1)
                                    <li class="li-social pinterest-social">
                                        <a title="Pinterest" href="{{ $social_links->pinterest }}" target="_blank">
                                            <span class="fa fa-pinterest icon-social"></span> <span class="name-social">Pinterest</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Container -->
        <div class="footer-bottom ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 copyright">
                        {{ $gs->website_footer }}
                    </div>
                    <div class="col-sm-12 payment">
                        <img src="{{ asset('frontend/') }}/image/catalog/demo/payment/payment.png" alt="imgpayment">
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom Container -->
        <!--Back To Top-->
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>