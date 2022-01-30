@extends('front.layouts.master')
@section('title',$title)
@section('header')
    @include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
@endsection
@section('breadcrumb')
    @include('front.layouts.include.breadcrumb',compact('crumbs','title'))
@endsection
@section('main-content')

        <div class="page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                             @if(!is_null($product))
                                <!--=======  single product main content area  =======-->
                                <div class="single-product-main-content-area section-space">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--=======  product details slider area  =======-->

                                            <div class="product-details-slider-area product-details-slider-area--side-move">
                                                <div class="row row-5">
                                                    <div class="col-md-9 order-1">
                                                        <div class="big-image-wrapper">
                                                            <div class="enlarge-icon">
                                                                <a class="btn-zoom-popup" href="javascript:void(0)" data-tippy="Click to enlarge" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="pe-7s-expand1"></i></a>
                                                            </div>
                                                            <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--side-space ht-slick-slider" data-slick-setting='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "arrows": false,
                    "autoplay": false,
                    "autoplaySpeed": 5000,
                    "fade": true,
                    "speed": 500,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                ]'>
                                                                @if($product->photo->count()>0)
                                                                    @foreach($product->photo as $photo)
                                                                        <div class="single-image">
                                                                            <img src="{{asset("uploads/product").'/'.$photo->photo}}" class="img-fluid" alt="{{asset("uploads/product").'/'.$photo->photo}}">
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 order-2">
                                                        <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--vertical-space ht-slick-slider" data-slick-setting='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "centerMode": false,
                "arrows": true,
                "vertical": true,
                "autoplay": false,
                "autoplaySpeed": 5000,
                "speed": 500,
                "asNavFor": ".product-details-big-image-slider-wrapper",
                "focusOnSelect": true,
                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-up" },
                "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-down" }
            }' data-slick-responsive='[
                {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": true, "slidesToScroll": 1} },
                {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false} },
                {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false} },
                {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1, "vertical": false} }
            ]'>
                                                            @if($product->photo->count()>0)
                                                                @foreach($product->photo as $photo)
                                                                    <div class="single-image">
                                                                        <img src="{{asset("uploads/product").'/'.$photo->photo}}" class="img-fluid" alt="{{asset("uploads/product").'/'.$photo->photo}}">
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                            <!--=======  End of product details slider area  =======-->
                                        </div>
                                        <div class="col-lg-6">
                                            <!--=======  single product content description  =======-->
                                            <div class="single-product-content-description">
                                                <p class="single-info"> <a ></a> </p>
                                                <h4 class="product-title">{{$product->name}}</h4>
                                                <div class="product-rating">
                                                    <span class="rating">
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=1 ? 'active' : ''}}" data-star="1" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=2 ? 'active' : ''}}" data-star="2" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=3 ? 'active' : ''}}" data-star="3" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']>=4 ? 'active' : ''}}" data-star="4" data-product="{{$product->id}}"></i>
                                                        <i class="ion-android-star-outline star {{star($product->id)['star']==5 ? 'active' : ''}}" data-star="5" data-product="{{$product->id}}"></i>
                                                    </span>

                                                    <span class="review-count"> <a class="star-count-user">({{star($product->id)['count']}} <i class="fa fa-user"></i>)</a></span>
                                                </div>

                                                <p class="single-grid-product__price">{!! $product->discount==1 ?  "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}</p>

                                                <p class="single-info">Məhsul Kodu: <span class="value">{{ucfirst($product->code)}}</span> </p>
                                                @if($product->stock_count>0)
                                                    <p class="single-info">Stok Miqdarı: <span class="value">{{$product->stock_count}}</span> </p>
                                                @endif
                                                <p class="single-info">Stokda: <span class="value">{{($product->stock_count>0) ? "Vardır" : "Yoxdur"}}</span> </p>

                                                <p class="product-description">{{$product->description}}</p>

                                                @if($product->discount==1)
                                                    <div class="product-countdown" data-countdown="{{$product->setDiscountDate()}}"></div>
                                                @endif
                                                <div class="product-actions">
                                                    <div class="quantity-selection">
                                                        <label>Ədəd</label>
                                                        <input class="qty" type="number" value="1" min="1">
                                                    </div>

                                                    <div class="product-buttons">
                                                        @if(in_array($product->id,$basketItem))
                                                            <a class=" cart-btn removeFromCart" data-product="{{$product->id}}" ><i class="ion-minus"></i></a>
                                                        @else
                                                            <a class=" cart-btn addToCartWithQty" data-product="{{$product->id}}" ><i class="ion-plus"></i></a>
                                                        @endif
                                                        <span class="wishlist-compare-btn">
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
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="social-share-buttons mt-20">
                                                    <h5>Facebook da paylaş</h5>
                                                    <ul>
                                                        <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}" target="_blank""><i class="fa fa-facebook"></i></a></li>

                                                    </ul>
                                                </div>

                                            </div>
                                            <!--=======  End of single product content description  =======-->
                                        </div>
                                    </div>
                                </div>
                                <!--=======  End of single product main content area  =======-->
                                <!--=======  product description review   =======-->

                                <div class="product-description-review-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!--=======  product description review container  =======-->

                                            <div class="tab-slider-wrapper product-description-review-container  section-space--inner">
                                                <nav>
                                                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">Özəlliklər</a>
                                                        <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-selected="false">Rəylər (1)</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                                                        <!--=======  product description  =======-->

                                                        <div class="product-description">
                                                            @if($product->feature->count() >0)
                                                                @foreach($product->feature as $feature)
                                                                    <p class="single-info" style="margin-bottom: 0px!important;line-height: 30px!important;">{{$feature->title}} : <span class="value">{{$feature->content}}</span> </p>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                        <!--=======  End of product description  =======-->
                                                    </div>
                                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                                        <!--=======  review content  =======-->

                                                        <div class="product-rating-wrap">

                                                            <div id="fb-root"></div>
                                                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v5.0"></script>
                                                            <div class="fb-comments" data-href="{{route('product.detail',$product->slug)}}" data-width="100%" data-numposts="5"></div>
                                                        </div>

                                                        <!--=======  End of review content  =======-->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--=======  End of product description review container  =======-->
                                        </div>
                                    </div>
                                </div>

                                <!--=======  End of product description review   =======-->
                                @else
                                     <div class="alert alert-warning text-center" role="alert">
                                         Belə bir məhsul tapılmadı
                                     </div>
                            @endif
                            <!--====================  single row slider ====================-->
                            <div class="single-row-slider-area section-space--inner-top">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--=======  section title  =======-->
                                        <div class="section-title-wrapper text-center section-space--half">
                                            <h2 class="section-title">Oxşar Məhsullar</h2>
                                            <p class="section-subtitle">Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas.</p>
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
                                                                        @if($product->checkIsNew()<=30)
                                                                            <span class="new">Yeni</span>
                                                                        @endif
                                                                    </div>
                                                                    <a href="{{route('product.detail',$product->slug)}}">
                                                                        <img src="{{asset("uploads/product").'/'.$product->parentPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                                        <img src="{{asset("uploads/product").'/'.$product->childPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                                    </a>

                                                                    <div class="hover-icons">
                                                                        <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                        <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                        <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                        <a href="javascript:void(0)" class="productModal" data-toggle="modal" data-id="{{$product->id}}" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="single-grid-product__content">




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
                                                                        @if(strlen($product->name)<=34)
                                                                            {!! '<br>' !!}
                                                                        @endif
                                                                        <p class="single-grid-product__price">{!! $product->discount==1 ?  "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}</p>
                                                                        @if($product->discount==1)
                                                                            <div class="product-countdown" data-countdown="{{$product->setDiscountDate()}}"></div>
                                                                        @endif
                                                                    </div>
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
                            <!--====================  End of single row slider  ====================-->
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('product-modal')
    <div class="product-modal modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">

    </div>
@endsection

@section('foot')
    <script>
        $(document).on('click','.addToCompare',function () {
            var product=$(this).data("product");
            var el = $(this);
            var url="{{route('addToCompare')}}";

            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
                        swal(response.name,"Müqayisə siyahısına əlavə edildi.", "success");
                        el.html('<i class="ion-android-delete"></i>')
                        el.removeClass('addToCompare').addClass('removeFromCompare');
                        $('.compareCounter').html(response.count)
                    }

                    if(response.msj==2) {
                        swal(response.name,"Məhsul zatən müqayisə siyahısındadır.", "info");
                    }

                    if(response.msj==0) {
                        swal("Ups!", "Nəticə tapılmadı!", "warning");
                    }

                    if(response.msj==3) {
                        swal("Ups!", "Yalnız 3 məhsul müqayisə edilə bilər", "info");
                    }

                }
            });
        });

        $(document).on('click','.removeFromCompare',function () {
            var product=$(this).data("product");
            var el = $(this);
            var url="{{route('removeFromCompare')}}";

            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
                        swal("","Müqayisə siyahısından çıxarıldı", "warning");
                        el.html('<i class="ion-android-options"></i>')
                        el.removeClass('removeFromCompare').addClass('addToCompare');
                        $('.compareCounter').html(response.count)
                    }


                    if(response.msj==0) {
                        swal("Ups!", "Nəticə tapılmadı!", "warning");
                    }

                }
            });
        });
    </script>

    <script>
        $(document).on('click','.addToWishlist',function () {
            var product=$(this).data("product");
            var el = $(this);
            var url="{{route('addToWishlist')}}";

            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
                        swal(response.name,"Seçilmişlər siyahısına əlavə edildi.", "success");
                        el.html('<i class="ion-android-remove-circle"></i>')
                        el.removeClass('addToWishlist').addClass('removeFromWishlist');
                        $('.wishlistCounter').html(response.count)
                    }

                    if(response.msj==2) {
                        swal(response.name,"Məhsul zatən seçilmişlər siyahısındadır.", "info");
                    }

                    if(response.msj==0) {
                        swal("Ups!", "Nəticə tapılmadı!", "warning");
                    }

                }
            });
        });

        $(document).on('click','.removeFromWishlist',function () {
            var product=$(this).data("product");
            var el = $(this);
            var url="{{route('removeFromWishlist')}}";

            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
                        swal("","Seçilmişlərdən çıxarıldı", "warning");
                        el.html('<i class="ion-heart"></i>')
                        el.removeClass('removeFromWishlist').addClass('addToWishlist');
                        $('.wishlistCounter').html(response.count)
                    }


                    if(response.msj==0) {
                        swal("Ups!", "Nəticə tapılmadı!", "warning");
                    }

                }
            });
        });
    </script>

    <script>
        $(document).on('click','.addToCartWithQty',function () {
            var product=$(this).data("product");
            var qty=$('.qty').val();
            var el = $(this);
            var url="{{route('addToCartWithQty')}}";
            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product,qty:qty},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
                        swal(response.name,"Səbətə əlavə edildi", "success");
                        el.html('<i class="ion-minus"></i>')
                        el.removeClass('addToCart').addClass('removeFromCart');
                        $('.basketCounter').html(response.cartCount)
                        $('.mini-cart').html(response.html)
                    }

                    if(response.msj==0) {
                        swal("Ups!", "Nəticə tapılmadı!", "warning");
                        $('.basketCounter').html(response.cartCount)
                        $('.mini-cart').html(response.html)
                    }
                }
            });
        })
    </script>
    <script>
        $(document).on('click','.removeFromCart',function () {
            var product=$(this).data("product");
            var el = $(this);

            var url="{{route('removeFromCart')}}";
            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
                type:'POST',
                success:function (response) {
                    if(response.msj==1) {
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
        $(document).on('click','.productModal',function () {
            var productId=$(this).data("id");
            var url="{{route('modal.data')}}";

            $.ajax({
                method:'Post',
                url:url,
                data:{"_token": "{{ csrf_token() }}",productId:productId},
                success:function (response) {
                    $('.product-modal').html(response.html)
                }
            })
        })
    </script>

    <script>
        $(document).on('click','.star',function () {
            var product_id=$(this).data('product');
            var star=$(this).data('star');
            var user="{{auth()->id()}}";
            var url="{{route('rating')}}";
            var s=$(this);

            if(user!='') {
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",star:star,user:user,product_id:product_id},
                    type:'POST',
                    success:function (response) {
                        s.parent().html(response.html);
                        $('.star-count-user').html("("+response.count+" <i class='fa fa-user'></i>)")
                        if(response.star>3) {
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