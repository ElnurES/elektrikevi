<div class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  header wrapper  =======-->
                <div class="header-wrapper d-none d-lg-flex">
                    <!-- logo -->
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="/uploads/logo/{{$config->logo}}" class="img-fluid" style="width:80%;"  alt="elektrikevi_{{$config->logo}}">
                        </a>
                    </div>
                    @php
                        $links=['about','delivery','contact'];
                    @endphp
                    <!-- menu wrapper -->
                    <div class="navigation-menu-wrapper">
                        <nav>
                            <ul style="margin-bottom: auto !important;">
                                <li><a href="{{route('home')}}">Əsas Səhifə</a></li>
                                
                                <li class="menu-item-has-children"><a>Mağaza</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('kabel')}}">Kabel məhsulları</a></li>
                                        <li><a href="{{route('lamp')}}">İşıqlandırma</a></li>
                                        <li><a href="{{route('protected.device')}}">Mühavizə cihazları</a></li>
                                        <li><a href="{{route('kabel.aksesuar')}}">Kabel aksesuarları</a></li>
                                        <li><a href="{{route('skaf')}}">Şkaflar,qutular,aksesuarlar</a></li>
                                        <li><a href="{{route('elektrik')}}">Elektrik alətləri</a></li>
                                    </ul>
                                </li>
                                @if(!in_array(request()->segment(1),$links))
                                    {!! $desktopCategory !!}
                                @endif
                                <li><a href="{{route('contact')}}">Əlaqə</a></li>
                                <li><a href="{{route('about')}}">Haqqımızda</a></li>
                                <li><a href="{{route('delivery')}}">Suallar</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- header icon -->
                    <div class="header-icon-wrapper">
                        <ul class="icon-list" style="margin-bottom: auto !important;">
                            <li>
                                <a href="javascript:void(0)" id="search-overlay-trigger">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </li>
                            <li>
                                <div class="header-cart-icon">
                                    <a href="{{route('cart')}}" id="minicart-trigger">
                                        <i class="ion-bag"></i>
                                        <span class="counter basketCounter">{{Cart::count()}}</span>
                                    </a>
                                    <!-- mini cart  -->
                                    <div class="mini-cart" id="mini-cart" style="max-height: 600px; overflow: auto;">
                                        @if(Cart::count()>0)
                                            <div class="cart-items-wrapper ps-scroll">
                                                @foreach(Cart::content() as $cart)
                                                    <div class="single-cart-item">
                                                        <a href="{{route('removeFromCartByRowId',$cart->rowId)}}" class="remove-icon"><i class="ion-android-close"></i></a>
                                                        <div class="image">
                                                            <a href="{{route('product.detail',$cart->options->slug)}}">
                                                                <img src="{{asset("uploads/product").'/'.$cart->options->photo}}" class="img-fluid" alt="{{$cart->options->photo}}">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <p class="product-title"><a href="{{route('product.detail',$cart->options->slug)}}">{{$cart->name}}</a></p>
                                                            <p class="count"><span>{{$cart->qty}} x </span> ${{$cart->price}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="cart-calculation">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-left">Cəmi :</td>
                                                        <td class="text-right">${{Cart::subtotal()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">ƏDV (0%) :</td>
                                                        <td class="text-right">${{Cart::tax()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Cəmi(Ədv İlə) :</td>
                                                        <td class="text-right">${{Cart::total()}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="{{route('cart')}}">Səbət</a>
                                                <a href="{{route('checkout')}}">Sİfarİşİ rəsmİləşdİr</a>
                                            </div>
                                            @else
                                                <div class="alert alert-info" role="alert">
                                                    Səbətiniz boşdur!
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="header-cart-icon">
                                    <a href="{{route('wishlist')}}" id="minicart-trigger">
                                        <i class="ion-heart"></i>
                                        <span class="counter wishlistCounter">{{$wishlistCount!=0 ? $wishlistCount : 0}} </span>
                                    </a>

                                </div>
                            </li>
                            <li>
                                <div class="header-cart-icon">
                                    <a href="{{route('compare')}}" id="minicart-trigger">
                                        <i class="ion-android-options"></i>
                                        <span class="counter compareCounter">{{$compareCount!=0 ? $compareCount : 0}}</span>
                                    </a>

                                </div>
                            </li>
                            <li>
                                <div class="header-settings-icon">
                                    <a href="javascript:void(0)" class="header-settings-trigger" id="header-settings-trigger">
                                        <div class="setting-button">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>

                                    <!-- settings menu -->
                                    <div class="settings-menu-wrapper" id="settings-menu-wrapper">
                                        <div class="single-settings-block">
                                            <h4 class="title">Şəxsi Kabinet</h4>
                                            <ul>
                                                @guest
                                                    <li><a href="{{route('login')}}">Giriş</a></li>
                                                    <li><a href="{{route('register')}}">Qeydiyyat</a></li>
                                                @endguest
                                                @auth
                                                    <li><a href="{{route('my-account')}}">İstifadəçi Paneli</a></li>
                                                    <li><a href="{{route('logout')}}">Çıxış</a></li>
                                                @endauth
                                            </ul>
                                        </div>
                                        <div class="single-settings-block">
                                            <h4 class="title">Valyuta Məzənnəsi </h4>
                                            <ul>
                                                @if(count($currencys)>0)
                                                    @foreach($currencys['currencys'] as $key=>$value)
                                                        <li><a style="margin-right: 2em;">{{$key}}</a>{{$value}}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--=======  End of header wrapper  =======-->

                <!--=======  mobile navigation area  =======-->

                <div class="header-mobile-navigation d-block d-lg-none">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-6">
                            <div class="header-logo">
                                <a href="{{route('home')}}">
                                    <img src="/uploads/logo/{{$config->logo}}" class="img-fluid" alt="elektrikevi_{{$config->logo}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="mobile-navigation text-right">
                                <div class="header-icon-wrapper">
                                    <ul class="icon-list justify-content-end">
                                        <li>
                                            <div class="header-cart-icon">
                                                <a href="{{route('cart')}}">
                                                    <i class="ion-bag"></i>
                                                    <span class="counter basketCounter">{{Cart::count()}}</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="header-cart-icon">
                                                <a href="{{route('wishlist')}}" id="minicart-trigger">
                                                    <i class="ion-heart"></i>
                                                    <span class="counter wishlistCounter">{{$wishlistCount!=0 ? $wishlistCount : 0}} </span>
                                                </a>

                                            </div>
                                        </li>
                                        <li>
                                            <div class="header-cart-icon">
                                                <a href="{{route('compare')}}" id="minicart-trigger">
                                                    <i class="ion-android-options"></i>
                                                    <span class="counter compareCounter">{{$compareCount!=0 ? $compareCount : 0}}</span>
                                                </a>

                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=======  End of mobile navigation area  =======-->

            </div>
        </div>
    </div>
</div>






<!--=======  offcanvas mobile menu  =======-->
<div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
    <a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
        <i class="ion-android-close"></i>
    </a>

    <div class="offcanvas-wrapper">

        <div class="offcanvas-inner-content">
            <div class="offcanvas-mobile-search-area">
                <form action="{{route('product.search')}}" method="Get">
                    <input type="search" placeholder="Axtar ..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <nav class="offcanvas-navigation">
                <ul>
                    <li><a href="{{route('home')}}">Əsas Səhifə</a></li>
                    @if(!in_array(request()->segment(1),$links))
                        {!! $mobileCategory !!}
                    @endif

                    <li class="menu-item-has-children"><a>Mağaza</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('kabel')}}">Kabel məhsulları</a></li>
                            <li><a href="{{route('lamp')}}">İşıqlandırma</a></li>
                            <li><a href="{{route('protected.device')}}">Mühavizə cihazları</a></li>
                            <li><a href="{{route('kabel.aksesuar')}}">Kabel aksesuarları</a></li>
                            <li><a href="{{route('skaf')}}">Şkaflar,qutular,aksesuarlar</a></li>
                            <li><a href="{{route('elektrik')}}">Elektrik alətləri</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('contact')}}">Əlaqə</a></li>
                    <li><a href="{{route('about')}}">Haqqımızda</a></li>
                    <li><a href="{{route('delivery')}}">Sualar</a></li>
                </ul>
            </nav>

            <div class="offcanvas-settings">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="menu-item-has-children"><a >Şəxsi Kabinet </a>
                            <ul class="sub-menu">
                                @guest
                                    <li><a href="{{route('login')}}">Giriş</a></li>
                                    <li><a href="{{route('register')}}">Qeydiyyat</a></li>
                                @endguest
                                @auth
                                    <li><a href="{{route('my-account')}}">İstifadəçi Paneli</a></li>
                                    <li><a href="{{route('logout')}}">Çıxış</a></li>
                                @endauth
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Valyuta Məzənnəsi </a>
                            <ul class="sub-menu">
                                @if(count($currencys)>0)
                                    @foreach($currencys['currencys'] as $key=>$value)
                                        <li><a >{{$key}} <span style="float: right">{{$value}}</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <div class="header-contact-info">
                        <ul class="header-contact-info__list">
                            <li><i class="ion-android-phone-portrait"></i> <a href="tel://{{$config->mobil_1}}">{{$config->mobil_1}} </a></li>
                            <li><i class="ion-android-phone-portrait"></i> <a href="tel://{{$config->mobil_2}}">{{$config->mobil_2}} </a></li>
                            <li><i class="ion-android-mail"></i> <a href="mailto:{{$config->email}}">{{$config->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <!--Off Canvas Widget Social Start-->
                <div class="off-canvas-widget-social">
                    <a href="{{$config->facebook}}"><i class="fa fa-facebook"></i></a>
                    <a href="{{$config->instagram}}"><i class="fa fa-instagram"></i></a>
                    <a href="mailto:{{$config->email}}"><i class="fa fa-envelope"></i></a>
                    <a href="{{$config->youtube}}"><i class="fa fa-youtube"></i></a>
                </div>
                <!--Off Canvas Widget Social End-->
            </div>
        </div>
    </div>

</div>
<!--=======  End of offcanvas mobile menu  =======-->