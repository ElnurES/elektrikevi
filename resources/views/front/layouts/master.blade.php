<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('front.layouts.include.head')
    @yield('head')
</head>

<body>
<!--====================  header area ====================-->
@yield('header')
<!--====================  End of header area  ====================-->
<!--====================  hero slider area or breadcrumb ====================-->
@yield('home-slider')
@yield('breadcrumb')
<!--====================  End of hero slider area  ====================-->
<!--====================  domain area  ====================-->
@yield('domain-area')
<!--====================  domain area  ====================-->
<!--====================  category content ====================-->
@yield('main-content')
<!--====================  category content  ====================-->
<!--====================  single row slider tab ====================-->
@yield('our-slider-products')
<!--====================  End of single row slider tab  ====================-->
<!--====================  single row slider ====================-->
@yield('feature')

@yield('banner-area')
@yield('latest-product')
<!--====================  End of single row slider  ====================-->

<!--====================  newsletter area ====================-->
<div class="container">
<div class="newsletter-area section-space--inner"
     style="background: #fff !important; border-top: 1px solid #f4f4f4; >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="newsletter-wrapper">
                <p class="small-text">Abunəçilər üçün Xüsusi Təkliflər</p>
                    <h3 class="title">Yeniliklərə abunə ol</h3>
<p class="short-desc">Elə indi abunə olub ən yeni məhsullarımız və xüsusi təkliflər barədə xəbərdar olun!</p>
                    <div class="newsletter-form">
                        <form method="Post" action="{{route('subscribe')}}">
                            @csrf
                            <input type="email" name="email" placeholder="E-poçt ünvanı..." required>
                            <button type="submit" value="submit">Abunə ol</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--====================  End of newsletter area  ====================-->
<!--====================  footer area ====================-->

@if(Request::segment(1)=='')
    <div class="footer-area footer-area--light-bg">
        <div class="footer-navigation section-space--inner" style="padding-bottom:20px !important">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  footer navigation wrapper  =======-->
                        <div class="footer-navigation-wrapper">
                            <div class="row">
                                <div class="col-lg-4 col-md-9">
                                    <!--=======  footer short desc  =======-->
                                    <div class="footer-short-desc" style="color:#707070">
                                        <div class="image">
                                            <a href="{{route('home')}}">
                                                <img src="/uploads/logo/{{$config->logo}}" class="img-fluid" alt="elektrikevi_{{$config->logo}}" style="width:45%;">
                                            </a>
                                        </div>
                                        <p class="message">
                                            Ötən illərdə distributoru olduğu şirkətilərin etimadını doğrultmaqla yanaşı xidmət göstərdiyi müştərilərin də güvəndiyi və energetik həllərinə etibar edə biləcəyi bir quruma çevrilmişdir.
                                        </p>
                                        <div class="footer-social-section">
                                            <h4 class="social-title">Bizi İzlə:</h4>
                                            <ul class="social-link">
                                                <li><a href="{{$config->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="{{$config->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="mailto:{{$config->email}}"><i class="fa fa-envelope"></i></a></li>
                                                <li><a href="{{$config->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--=======  End of footer short desc  =======-->
                                </div>
                                <div class="col-lg-3 offset-lg-1 col-sm-4">
                                    <!--=======  single footer widget  =======-->
                                    <div class="single-footer-widget" style="color:#707070">
                                        <h3 class="single-footer-widget__title">Open Time</h3>
                                        <div class="single-footer-widget__content">
                                            <p class="time" style="margin: 0 !important">Mon - Fri: 8AM - 10PM</p>
                                            <p class="time" style="margin: 0 !important">Sat: 9AM-8PM</p>
                                            <p class="time" style="margin: 0 !important">Sun: Closed</p>
                                        </div>
                                    </div>
                                    <!--=======  End of single footer widget  =======-->
                                </div>
                                <div class="col-lg-2 col-sm-4">
                                    <!--=======  single footer widget  =======-->
                                    <div class="single-footer-widget" style="color:#707070">
                                        <h3 class="single-footer-widget__title">Qısa Yol</h3>
                                        <div class="single-footer-widget__content">
                                            <ul class="footer-navigation">
                                                <li><a style="color:#707070" href="{{route('home')}}">Əsas Səhifə</a></li>
                                                <li><a style="color:#707070" href="{{route('catalog')}}">Kataloq</a></li>
                                                <li><a style="color:#707070" href="{{route('contact')}}">Əlaqə</a></li>
                                                <li><a style="color:#707070" href="{{route('about')}}">Haqqında</a></li>
                                                <li><a style="color:#707070" href="{{route('delivery')}}">Suallar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--=======  End of single footer widget  =======-->
                                </div>
                                <div class="col-lg-2 col-sm-4">
                                    <!--=======  single footer widget  =======-->
                                    <div class="single-footer-widget" style="color:#707070">
                                        <h3 class="single-footer-widget__title">Əlaqə</h3>
                                        <div class="single-footer-widget__content">
                                            <ul class="footer-navigation">
                                                <li style="padding-bottom: 7px"><i class="fa fa-location-arrow "></i><a href="#" style="margin-left: 20px; display: inline; color:#707070 ">{{$config->location}}</a></li>
                                                <li style="padding-bottom: 7px"><i class="fa fa-mobile "></i><a href="#" style="margin-left: 20px; display: inline; color:#707070">{{$config->mobil_1}}</a></li>
                                                <li style="padding-bottom: 7px"><i class="fa fa-phone "></i><a href="#" style="margin-left: 20px; display: inline; color:#707070">{{$config->mobil_2}}</a></li>
                                                <li><i class="fa fa-envelope " style="font-size: 13px"></i><a href="#" style="margin-left: 10px; display: inline; color:#707070">{{$config->email}}</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!--=======  End of single footer widget  =======-->
                                </div>
                            </div>
                        </div>
                        <!--=======  End of footer navigation wrapper  =======-->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container wide">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright-wrapper">
                            <div class="container">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-md-6">
                                        <div class="copyright-text">
                                            Məxfilik siyasəti &copy; {{date('Y')}} <a href="{{route('home')}}">{{config('app.name')}}</a>. Bütün hüquqlar qorunur.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="copyright-navigation-wrapper">
                                            <ul class="copyright-nav" style="margin-bottom: 0 !important">
                                                <li><a href="{{route('cart')}}">Səbət</a></li>
                                                <li><a href="{{route('wishlist')}}">Seçilmişlər</a></li>
                                                <li><a href="{{route('compare')}}">Müqayisə</a></li>
                                            </ul>
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

@else
    <div class="footer-area">
    <div class="footer-copyright">
    <div class="container wide">
    <div class="row">
    <div class="col-lg-12">
    <div class="footer-copyright-wrapper footer-copyright-wrapper--default-footer">
    <div class="container">
    <div class="row align-items-center no-gutters">
    <div class="col-lg-2 col-md-2">
    <div class="footer-logo">
    <a href="{{route('home')}}">
    <img src="/uploads/logo/{{$config->logo}}" class="img-fluid" alt="elektrikevi_{{$config->logo}}">
    </a>
    </div>
    </div>

    <div class="col-lg-7 col-md-5">

    <div class="copyright-text" style="text-align: center">

    Məxfilik siyasəti &copy; {{date('Y')}} <a href="{{route('home')}}">{{config('app.name')}}</a>. Bütün hüquqlar qorunur.
    </div>
    </div>
    <div class="col-lg-3 col-md-5">
    <div class="copyright-social-wrapper">
    <ul class="copyright-social">
    <li><a href="{{$config->facebook}}"><i class="fa fa-facebook"></i></a></li>
    <li><a href="{{$config->instagram}}"><i class="fa fa-instagram"></i></a></li>
    <li><a href="mailto:{{$config->email}}"><i class="fa fa-envelope"></i></a></li>
    <li><a href="{{$config->youtube}}"><i class="fa fa-youtube"></i></a></li>
    </ul>
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
@endif

<!--====================  End of footer area  ====================-->

<!--====================  search overlay ====================-->

<div class="search-overlay" id="search-overlay">
    <a href="javascript:void(0)" class="close-search-overlay" id="close-search-overlay">
        <i class="ion-ios-close-empty"></i>
    </a>

    <!--=======  search form  =======-->

    <div class="search-form">
        <form action="{{route('product.search')}}" method="Get" >
            <input type="search" placeholder="Axtar ..." name="search">
            <button type="submit"><i class="ion-android-search"></i></button>
        </form>
    </div>

    <!--=======  End of search form  =======-->
</div>

<!--====================  End of search overlay  ====================-->
<!--====================  quick view ====================-->

@yield('product-modal')
<!--====================  End of quick view  ====================-->
<!-- scroll to top  -->
<div id="scroll-top">
    <span>Yuxarı</span><i class="ion-chevron-right"></i><i class="ion-chevron-right"></i>
</div>
<!-- end of scroll to top -->
<!--=============================================
=            JS files        =
=============================================-->

<!-- Vendor JS -->
<script src="/front/assets/js/vendors.js"></script>

<!-- Active JS -->
<script src="/front/assets/js/active.js"></script>

@yield('foot')
<script>
    setTimeout(function () {
        $('.msj').slideUp(500);
    },5000)
</script>
<!--=====  End of JS files ======-->

</body>

</html>