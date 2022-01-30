@extends('front.layouts.master')
@section('title','Əsas Səhifə')
@section('head')
<link rel="stylesheet" href="/elnur/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!------ Include the above in your HEAD tag ---------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

@endsection
@section('header')
@include('front.layouts.include.header-two',['desktopCategory'=>null,'mobileCategory'=>null])
@endsection


@section('main-content')

<div class="page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-top-content-wrapper">
                    <div class="row row-30">
                        <!-- About Content -->
                        <div class="about-content col-lg-12">
                            @include('front.layouts.include.alert-messages')
                            <section class="main-slider-section container menu-tags" id="menuTag">
                                <div class="slide">
                                    <a href="{{route('kabel')}}">
                                        <div class="content">
                                            <h3>Kabel məhsulları</h3>
                                            <p>
                                                Elektrik naqilləri evdə elektrik təchizatı işinin ən vacib mərhələlərindən biri olduğu üçün satış mərkəzimiz 
                                                "Elektrikevi.az" müxtəlif növ yüksək keyfiyyətli elektrik naqillərini qonaqlarına təqdim edir.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="slide">
                                    <a href="{{route('lamp')}}">
                                        <div class="content">
                                            <h3>İşıqlandırma</h3>
                                            <p>
                                                Bölmədə həm daxili, həm də sənaye istifadəsi üçün lampalar tapa bilərsiniz. 
                                                Burada enerji qənaət edən, flüoresan, halogen, LED lampalar var.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="slide">
                                    <a href="{{route('protected.device')}}">
                                        <div class="content">
                                            <h3>Mühavizə cihazları</h3>
                                            <p>
                                                Onlayn mağazamızda müxtəlif istehsalçıların elektrik kəsiciləri ala bilərsiniz. 
                                                Avtomatik cərəyan açarı elektrik naqillərinin həddindən artıq yüklənmədən və qısa dövrələrdən qorunduğu bir cihaz.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="slide">
                                    <a href="{{route('kabel.aksesuar')}}">
                                        <div class="content">
                                            <h3>Kabel aksesuarları</h3>
                                            <p>
                                                Elektrik qurğularını, eləcə də Avropanın aparıcı istehsalçılarının digər məhsullarını seçin, asanlıqla sifariş edin və satın alın.
                                                Elektrikevi  şirkətinin kataloqunda ən münasib qiymətə satın almağı təklif etdiyimiz çox sayda idxal edilmiş elektrik yuvaları və açarları var.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="slide">
                                    <a href="{{route('skaf')}}">
                                        <div class="content">
                                            <h3>Şkaflar,qutular,aksesuarlar</h3>
                                            <p>
                                                Çoxfunksiyalı qutular, modul komponentlərin quraşdırılması və qorunması 
                                                üçün hazırlanmış qapalı və qoruyucu xüsusiyyətlərinə görə iş şəraiti üçün uyğundur.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="slide">
                                    <a href="{{route('elektrik')}}">
                                        <div class="content">
                                            <h3>Elektrik alətləri</h3>
                                            <p>
                                                Elektrik əl alətləri təmir və tikinti işləri, istehsal prosesləri və ev işləri üçün tələb olunur. 
                                                Materialın işlənməsi, düzəldilməsi və ölçülməsi, sahədə, otaqda optimal yer təşkili və daha çox iş üçün nəzərdə tutulmuşdur.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
@endsection

@section('latest-product')

<style>
    h2 {
        text-align: center;
        padding: 20px;
    }

    /* Slider */

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: '';
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    [dir='rtl'] .slick-slide {
        float: right;
    }

    .slick-slide img {
        display: block;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }
    
    @media only screen and (max-width: 600px) {
        .slick-slider {
            height: 70px !important;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<div class="single-row-slider-area section-space" style="margin-bottom: 0px !important; overflow: hidden !important">
    <div class="row">
        <div class="col-lg-12">
            <!--=======  single row slider wrapper  =======-->
            <div class="container">
                <section class="customer-logos slider" style="height: 150px;">
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-1.png"></div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-2.png"></div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-3.png"></div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-4.png">
                    </div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-5.png">
                    </div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-6.png">
                    </div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-7.png">
                    </div>
                    <div class="slide" style="background-image: none !important; height: 150px !important;"><img src="/elnur/customer/Z-8.png">
                    </div>
                </section>
            </div>
            <!--=======  End of single row slider wrapper  =======-->
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>
@endsection
@section('feature')
    <div class="feature-logo-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  feature logo wrapper  =======-->
                    <div class="feature-logo-wrapper" style="margin-top:100px;">
                        <div class="row">
                            <div class="col-md-4">
                                <!--=======  single feature logo  =======-->
                                <div class="single-feature-logo">
                                    <div class="single-feature-logo__image">
                                        <img src="/front/assets/img/icons/free_shipping.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="single-feature-logo__content">
                                        <h4 class="title">PULSUZ ÇATDIRILMA</h4>
                                        <p class="short-desc">Standard Göndərmə ilə 200.00 AZN -dən yuxarı sifarişlər üzrə pulsuz çatdırılma təklif edirik</p>
                                    </div>
                                </div>
                                <!--=======  End of single feature logo  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single feature logo  =======-->
                                <div class="single-feature-logo">
                                    <div class="single-feature-logo__image">
                                        <img src="/front/assets/img/icons/money_back.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="single-feature-logo__content">
                                        <h4 class="title">MÜŞTƏRİ MƏMNUNLUĞU</h4>
                                        <p class="short-desc">Məhsulumuzdan məmnun deyilsinizsə, alış qiymətinə geri qaytaracağıq.</p>
                                    </div>
                                </div>
                                <!--=======  End of single feature logo  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single feature logo  =======-->
                                <div class="single-feature-logo">
                                    <div class="single-feature-logo__image">
                                        <img src="/front/assets/img/icons/support247.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="single-feature-logo__content">
                                        <h4 class="title">CANLI DƏSTƏK 24/7</h4>
                                        <p class="short-desc">Səmimi dəstək komandamız həftədə yeddi gün ərzində 24 saat sizə kömək edə bilər</p>
                                    </div>
                                </div>
                                <!--=======  End of single feature logo  =======-->
                            </div>
                        </div>
                    </div>
                    <!--=======  End of feature logo wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('product-modal')
<div class="product-modal modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1"
    role="dialog" aria-hidden="true">

</div>
@endsection

@section('foot')

@endsection