@extends('front.layouts.master')
@section('title','Əsas Səhifə')
@section('header')
@include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
@endsection
@section('home-slider')
<div class="hero-slider-area section-space--30">
    <!--=======  hero slider wrapper  =======-->

    <div class="hero-slider-wrapper">
        <div class="ht-slick-slider" data-slick-setting='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "arrows": true,
            "dots": true,
            "autoplay": true,
            "autoplaySpeed": 5000,
            "speed": 1000,
            "fade": true,
            "infinite": true,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
        }' data-slick-responsive='[
            {"breakpoint":1501, "settings": {"slidesToShow": 1} },
            {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
        ]'>

            <!--=======  single slider item  =======-->
            @if($sliders->count()>0)
            @foreach($sliders as $key=>$slider)
            <div class="single-slider-item">
                <div class="hero-slider-item-wrapper hero-slider-item-wrapper--fullwidth " style='background-image: url("{{asset("uploads/banner/a").$domain.'.jpg'}}");'>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero-slider-content">
                                    <p class="slider-title slider-title--big-light">{{$slider->name}}</p>
                                    <p class="slider-title slider-title--small">{{substr($slider->description,0,150)}}...</p>
                                    <a class="hero-slider-button" href="{{route('product.detail',$slider->slug)}}"> <i class="ion-ios-plus-empty"></i> Daha Çox</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <!--=======  End of single slider item  =======-->

        </div>
    </div>

    <!--=======  End of hero slider wrapper  =======-->
</div>
@endsection
@section('our-slider-products')
<style>
    @media only screen and (max-width: 600px) {
        .media-height{
            height: 1250px !important;
        }
    }
</style>
<div class="single-row-slider-tab-area section-space media-height" style="height: 1100px">
    <div class="container">
    <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->
                    <div class="section-title-wrapper text-center section-space--half">
                        <h2 class="section-title">Məhsullarımız</h2>
                        <p class="section-subtitle">Biz yalnız ən yaxşı məhsulları deyil, həm də diqqətə layiq olan geniş çeşidli yeni modelləri təqdim edirik.</p>
                    </div>
                    <!--=======  End of section title  =======-->
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  tab slider wrapper  =======-->
                @include('front.layouts.include.alert-messages')
                <div class="tab-slider-wrapper">
                    <!--=======  tab product navigation  =======-->

                    <div class="tab-product-navigation">
                        <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                            @if(count($categories['categories']) >0)
                            @foreach($categories['categories'] as $key=>$category)
                            @php
                            $key+=1;
                            @endphp
                            <a class="nav-item nav-link {{$loop->first ? 'active' : ''}}" id="product-tab-{{$key}}" data-toggle="tab" href="#product-series-{{$key}}" role="tab" aria-selected="true">{{$category->name}}</a>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <!--=======  End of tab product navigation  =======-->

                    <!--=======  tab product content  =======-->
                    <div class="tab-content">
                        @if(count($categories['categories']) >0)
                        @foreach($categories['categories'] as $key=>$category)
                        @php
                        $key+=1;
                        @endphp
                        <div class="tab-pane fade show {{$loop->first ? 'active' : ''}}" id="product-series-{{$key}}" role="tabpanel" aria-labelledby="product-tab-{{$key}}">
                            <!--=======  double row slider wrapper  =======-->
                            <div class="double-row-slider-wrapper">
                                <div class="ht-slick-slider" data-slick-setting='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "autoplay": false,
                                    "autoplaySpeed": 5000,
                                    "speed": 1000,
                                    "infinite": false,
                                    "rows": 2,
                                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
                                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
                                }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                                    {"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
                                    {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": false} },
                                    {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                                ]'>

                                    @foreach($category->product()->orderBy('created_at','Desc')->where('is_active',1)->take(10)->get() as $product)
                                    <div class="col">
                                        <!--=======  single grid product  =======-->
                                        <div class="single-grid-product">
                                            <div class="single-grid-product__image">
                                                <div class="single-grid-product__label">
                                                    @if($product->discount==1)
                                                    <span class="sale">-{{$product->interest}}%</span>
                                                    @endif
                                                    @if($product->checkIsNew()<=30) <span class="new">Yeni</span>
                                                        @endif
                                                </div>
                                                <a href="{{route('product.detail',$product->slug)}}">

                                                    <img src="{{asset("uploads/product").'/'.$product->parentPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                    <img src="{{asset("uploads/product").'/'.$product->childPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                </a>

                                                <div class="hover-icons">
                                                    @if(in_array($product->id,$basketItem))
                                                    <a class="removeFromCart" data-product="{{$product->id}}"><i class="ion-minus"></i></a>
                                                    @else
                                                    <a class="addToCart" data-product="{{$product->id}}"><i class="ion-plus"></i></a>
                                                    @endif
                                                    @if(is_array($wishlistItem) and array_key_exists($product->id,$wishlistItem))
                                                    <a class="removeFromWishlist" data-product="{{$product->id}}"><i class="ion-android-remove-circle"></i></a>
                                                    @else
                                                    <a class="addToWishlist" data-product="{{$product->id}}"><i class="ion-heart"></i></a>
                                                    @endif
                                                    @if(is_array($compareItem) and array_key_exists($product->id,$compareItem))
                                                    <a class="removeFromCompare" data-product="{{$product->id}}"><i class="ion-android-delete"></i></a>
                                                    @else
                                                    <a class="addToCompare" data-product="{{$product->id}}"><i class="ion-android-options"></i></a>
                                                    @endif
                                                    <a href="javascript:void(0)" class="productModal" data-toggle="modal" data-id="{{$product->id}}" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                </div>
                                            </div>
                                            <div class="single-grid-product__content">
                                                <div class="single-grid-product__category-rating">
                                                    <span class="category"><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></span>
                                                    <span class="rating">
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=1 ? 'active' : ''}}" data-star="1" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=2 ? 'active' : ''}}" data-star="2" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=3 ? 'active' : ''}}" data-star="3" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=4 ? 'active' : ''}}" data-star="4" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']==5 ? 'active' : ''}}" data-star="5" data-product="{{$product->id}}"></i>
                                                    </span>
                                                </div>

                                                <h3 class="single-grid-product__title"> <a href="{{route('product.detail',$product->slug)}}">{{ucwords($product->name)}}</a></h3>
                                                {{--@if(strlen($product->name)<=34)--}}
                                                {{--{!! '<br>' !!}--}}
                                                {{--@endif--}}
                                                <p class="single-grid-product__price">{!! $product->discount==1 ? "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}</p>
                                            </div>
                                        </div>
                                        <!--=======  End of single grid product  =======-->
                                    </div>
                                    @endforeach
                                </div>
                                <!--=======  End of double row slider wrapper  =======-->
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!--=======  End of tab product content  =======-->
                    </div>

                    <!--=======  End of tab slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('latest-product')
<div class="single-row-slider-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title-wrapper text-center section-space--half">
                                            <h2 class="section-title">Son Əlavə Olunmuşlar</h2>
                                            <p class="section-subtitle">Müştərilərimizin ehtiyaclarına diqqət yetirərək, yeni perspektivli məhsul növləri təklif edirik.</p>
                                        </div>
                <!--=======  End of section title  =======-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  single row slider wrapper  =======-->
                <div class="single-row-slider-wrapper">
                    <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "arrows": true,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "infinite": false,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>
                        @if($latestProducts->count()>0)
                        @foreach($latestProducts as $product)
                        <div class="col">
                            <!--=======  single grid product  =======-->
                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="single-grid-product__label">
                                        @if($product->discount==1)
                                        <span class="sale">-{{$product->interest}}%</span>
                                        @endif
                                        @if($product->checkIsNew()<=30) <span class="new">Yeni</span>
                                            @endif
                                    </div>
                                    <a href="{{route('product.detail',$product->slug)}}">

                                        <img src="{{asset("uploads/product").'/'.$product->parentPhoto()->photo}}" class="img-fluid" alt="{{$product->name}}">
                                        <img src="{{asset("uploads/product").'/'.$product->childPhoto()->photo}}" class="img-fluid" alt="{{$product->name}}">
                                    </a>

                                    <div class="hover-icons">
                                        @if(in_array($product->id,$basketItem))
                                        <a class="removeFromCart" data-product="{{$product->id}}"><i class="ion-minus"></i></a>
                                        @else
                                        <a class="addToCart" data-product="{{$product->id}}"><i class="ion-plus"></i></a>
                                        @endif
                                        @if(is_array($wishlistItem) and array_key_exists($product->id,$wishlistItem))
                                        <a class="removeFromWishlist" data-product="{{$product->id}}"><i class="ion-android-remove-circle"></i></a>
                                        @else
                                        <a class="addToWishlist" data-product="{{$product->id}}"><i class="ion-heart"></i></a>
                                        @endif
                                        @if(is_array($compareItem) and array_key_exists($product->id,$compareItem))
                                        <a class="removeFromCompare" data-product="{{$product->id}}"><i class="ion-android-delete"></i></a>
                                        @else
                                        <a class="addToCompare" data-product="{{$product->id}}"><i class="ion-android-options"></i></a>
                                        @endif
                                        <a class="productModal" data-toggle="modal" data-id="{{$product->id}}" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <div class="single-grid-product__category-rating">
                                        <span class="category"><a href="{{route('category',$product->category[0]->slug)}}">{{$product->category[0]->name}}</a></span>
                                        <span class="rating">
                                            <i class="ion-android-star-outline star {{star($product->id)['star']>=1 ? 'active' : ''}}" data-star="1" data-product="{{$product->id}}"></i>
                                            <i class="ion-android-star-outline star {{star($product->id)['star']>=2 ? 'active' : ''}}" data-star="2" data-product="{{$product->id}}"></i>
                                            <i class="ion-android-star-outline star {{star($product->id)['star']>=3 ? 'active' : ''}}" data-star="3" data-product="{{$product->id}}"></i>
                                            <i class="ion-android-star-outline star {{star($product->id)['star']>=4 ? 'active' : ''}}" data-star="4" data-product="{{$product->id}}"></i>
                                            <i class="ion-android-star-outline star {{star($product->id)['star']==5 ? 'active' : ''}}" data-star="5" data-product="{{$product->id}}"></i>
                                        </span>
                                    </div>

                                    <h3 class="single-grid-product__title"> <a href="{{route('product.detail',$product->slug)}}">{{ucwords($product->name)}}</a></h3>
                                    {{--@if(strlen($product->name)<=34)--}}
                                    {{--{!! '<br>' !!}--}}
                                    {{--@endif--}}
                                    <p class="single-grid-product__price">{!! $product->discount==1 ? "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}</p>
                                </div>
                            </div>
                            <!--=======  End of single grid product  =======-->
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
                <!--=======  End of single row slider wrapper  =======-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('product-modal')
<div class="product-modal modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">

</div>
@endsection
@section('banner-area')
    <div class="banner-hover-area section-space">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  banner hover wrapper  =======-->
                    <div class="banner-hover-wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <!--=======  single hover banner  =======-->
                                <div class="single-hover-banner single-hover-banner--middlesize-text">
                                    <div class="single-hover-banner__image">
                                        @if(session('domain')==1)
                                            <a href="{{route('lamp')}}">
                                                <img src="/uploads/banner/a2.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==2)
                                            <a href="{{route('protected.device')}}">
                                                <img src="/uploads/banner/a3.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==3)
                                            <a href="{{route('kabel.aksesuar')}}">
                                                <img src="/uploads/banner/a4.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==4)
                                            <a href="{{route('skaf')}}">
                                                <img src="/uploads/banner/a5.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==5)
                                            <a href="{{route('elektrik')}}">
                                                <img src="/uploads/banner/a6.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==6)
                                            <a href="{{route('kabel')}}">
                                                <img src="/uploads/banner/a1.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif
                                        <div class="single-hover-banner--middlesize-text__content">
                                            <h4 class="small-text">Black Friday</h4>
                                            <h3 class="big-text">Save Up To 50% Off</h3>
                                        @if(session('domain')==1)
                                            <a class="banner-link" href="{{route('lamp')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==2)
                                            <a class="banner-link" href="{{route('protected.device')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==3)
                                            <a class="banner-link" href="{{route('kabel.aksesuar')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==4)
                                            <a class="banner-link" href="{{route('skaf')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==5)
                                            <a class="banner-link" href="{{route('elektrik')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==6)
                                            <a class="banner-link" href="{{route('kabel')}}">
                                                DAHA ÇOX
                                            </a>

                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <!--=======  End of single hover banner  =======-->
                            </div>

                            <div class="col-md-6">
                                <!--=======  single hover banner  =======-->
                                <div class="single-hover-banner single-hover-banner--middlesize-text">
                                    <div class="single-hover-banner__image">
                                        @if(session('domain')==1)
                                            <a href="{{route('protected.device')}}">
                                                <img src="/uploads/banner/a3.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==2)
                                            <a href="{{route('kabel.aksesuar')}}">
                                                <img src="/uploads/banner/a4.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==3)
                                            <a href="{{route('skaf')}}">
                                                <img src="/uploads/banner/a5.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==4)
                                            <a href="{{route('elektrik')}}">
                                                <img src="/uploads/banner/a6.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==5)
                                            <a href="{{route('kabel')}}">
                                                <img src="/uploads/banner/a1.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif

                                        @if(session('domain')==6)
                                            <a href="{{route('lamp')}}">
                                                <img src="/uploads/banner/a2.jpg" class="img-fluid" alt="">
                                            </a>
                                        @endif
                                        <div class="single-hover-banner--middlesize-text__content">
                                            <h4 class="small-text">Best Selling !</h4>
                                            <h3 class="big-text">Living Room Up To 70% Off</h3>
                                        @if(session('domain')==1)
                                            <a class="banner-link" href="{{route('protected.device')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==2)
                                            <a class="banner-link" href="{{route('kabel.aksesuar')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==3)
                                            <a class="banner-link" href="{{route('skaf')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==4)
                                            <a class="banner-link" href="{{route('elektrik')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==5)
                                            <a class="banner-link" href="{{route('kabel')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif

                                        @if(session('domain')==6)
                                            <a class="banner-link" href="{{route('lamp')}}">
                                                DAHA ÇOX
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <!--=======  End of single hover banner  =======-->
                            </div>
                        </div>
                    </div>
                    <!--=======  End of banner hover wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
<script>
    $(document).on('click', '.addToCartWithQty', function() {
        var product = $(this).data("product");
        var qty = $('.qty').val();
        var el = $(this);
        var url = "{{route('addToCartWithQty')}}";
        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product,
                qty: qty
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal(response.name, "Səbətə əlavə edildi", "success");
                    el.html('<i class="ion-minus"></i>')
                    el.removeClass('addToCart').addClass('removeFromCart');
                    $('.basketCounter').html(response.cartCount)
                    $('.mini-cart').html(response.html)
                }

                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                    $('.basketCounter').html(response.cartCount)
                    $('.mini-cart').html(response.html)
                }
            }
        });
    })
</script>
<script>
    $(document).on('click', '.addToCompare', function() {
        var product = $(this).data("product");
        var el = $(this);
        var url = "{{route('addToCompare')}}";

        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal(response.name, "Müqayisə siyahısına əlavə edildi.", "success");
                    el.html('<i class="ion-android-delete"></i>')
                    el.removeClass('addToCompare').addClass('removeFromCompare');
                    $('.compareCounter').html(response.count)
                }

                if (response.msj == 2) {
                    swal(response.name, "Məhsul zatən müqayisə siyahısındadır.", "info");
                }

                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                }

                if (response.msj == 3) {
                    swal("Ups!", "Yalnız 3 məhsul müqayisə edilə bilər", "info");
                }

            }
        });
    });

    $(document).on('click', '.removeFromCompare', function() {
        var product = $(this).data("product");
        var el = $(this);
        var url = "{{route('removeFromCompare')}}";

        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal("", "Müqayisə siyahısından çıxarıldı", "warning");
                    el.html('<i class="ion-android-options"></i>')
                    el.removeClass('removeFromCompare').addClass('addToCompare');
                    $('.compareCounter').html(response.count)
                }


                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                }

            }
        });
    });
</script>

<script>
    $(document).on('click', '.addToWishlist', function() {
        var product = $(this).data("product");
        var el = $(this);
        var url = "{{route('addToWishlist')}}";

        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal(response.name, "Seçilmişlər siyahısına əlavə edildi.", "success");
                    el.html('<i class="ion-android-remove-circle"></i>')
                    el.removeClass('addToWishlist').addClass('removeFromWishlist');
                    $('.wishlistCounter').html(response.count)
                }

                if (response.msj == 2) {
                    swal(response.name, "Məhsul zatən seçilmişlər siyahısındadır.", "info");
                }

                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                }

            }
        });
    });

    $(document).on('click', '.removeFromWishlist', function() {
        var product = $(this).data("product");
        var el = $(this);
        var url = "{{route('removeFromWishlist')}}";

        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal("", "Seçilmişlərdən çıxarıldı", "warning");
                    el.html('<i class="ion-heart"></i>')
                    el.removeClass('removeFromWishlist').addClass('addToWishlist');
                    $('.wishlistCounter').html(response.count)
                }


                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                }

            }
        });
    });
</script>

<script>
    $(document).on('click', '.addToCart', function() {
        var product = $(this).data("product");
        var el = $(this);
        var url = "{{route('addToCart')}}";
        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal(response.name, "Səbətə əlavə edildi", "success");
                    el.html('<i class="ion-minus"></i>')
                    el.removeClass('addToCart').addClass('removeFromCart');
                    $('.basketCounter').html(response.cartCount)
                    $('.mini-cart').html(response.html)
                }

                if (response.msj == 0) {
                    swal("Ups!", "Nəticə tapılmadı!", "warning");
                    $('.basketCounter').html(response.cartCount)
                    $('.mini-cart').html(response.html)
                }

            }
        });
    })

    $(document).on('click', '.removeFromCart', function() {
        var product = $(this).data("product");
        var el = $(this);

        var url = "{{route('removeFromCart')}}";
        $.ajax({
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                product: product
            },
            type: 'POST',
            success: function(response) {
                if (response.msj == 1) {
                    swal(response.name, "Səbətdən çıxarıldı", "warning");
                    el.html('<i class="ion-plus"></i>')
                    el.removeClass('removeFromCart').addClass('addToCart');
                    $('.basketCounter').html(response.cartCount)
                    $('.mini-cart').html(response.html)
                }

            }
        });
    })
</script>

<script>
    $(document).on('click', '.productModal', function() {
        var productId = $(this).data("id");
        var url = "{{route('modal.data')}}";

        $.ajax({
            method: 'Post',
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                productId: productId
            },
            success: function(response) {
                $('.product-modal').html(response.html)
            }
        })
    })
</script>

<script>
    $(document).on('click', '.star', function() {
        var product_id = $(this).data('product');
        var star = $(this).data('star');
        var user = "{{auth()->id()}}";
        var url = "{{route('rating')}}";
        var s = $(this);

        if (user != '') {
            $.ajax({
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    star: star,
                    user: user,
                    product_id: product_id
                },
                type: 'POST',
                success: function(response) {
                    s.parent().html(response.html);
                    $('.star-count-user').html("(" + response.count + " <i class='fa fa-user'></i>)");
                    if (response.star > 3) {
                        swal({
                            title: "Təşəkkür",
                            text: "Qiymətinizə layiq olmağa çalışacıq",
                            icon: "success",
                            button: "Ok",
                        });
                    } else {
                        swal({
                            title: "Təşəkkür",
                            text: "Özüzmüzü hər zaman təkminləşdirməyə can atırıq",
                            icon: "info",
                            button: "Ok",
                        });
                    }

                }

            });
        } else {

            swal({
                title: "Diqqət!",
                text: "Xal vermək üçün hesabınıza daxil olmalısınız",
                icon: "warning",
                button: "Ok",
            });
        }

    })
</script>

@endsection