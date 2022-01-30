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
                <div class="col-lg-12 filterItems">
                    <!--=======  shop page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">

                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  shop page header  =======-->
                                    <div class="shop-header">
                                        <div class="shop-header__left">
                                            <div class="grid-icons">
                                                <button data-target="grid three-column" data-tippy="3" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="active three-column"></button>
                                                <button data-target="grid four-column" data-tippy="4" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="four-column d-none d-lg-block"></button>
                                                <button data-target="list" data-tippy="List" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="list-view"></button>
                                            </div>
                                            @if($products->count()>0)
                                                <div class="shop-header__left__message">
                                                    Göstərilir: {{$products->currentPage()*$products->count()}} - məhsul, {{$products->total()}} - məhsuldan ({{$products->lastPage()}} səhifə)
                                                </div>
                                            @endif
                                        </div>

                                        <div class="shop-header__right">

                                            <div class="single-select-block d-inline-block">
                                                <span class="select-title">Göstər:</span>
                                                <select class="showCount">
                                                    <option value="9"  {{$filter[1]==9 ? 'selected' : ''}}>Varsayılan</option>
                                                    <option value="18" {{$filter[1]==18 ? 'selected' : ''}}>18</option>
                                                    <option value="27" {{$filter[1]==27 ? 'selected' : ''}}>27</option>
                                                    <option value="36" {{$filter[1]==36 ? 'selected' : ''}}>36</option>
                                                    <option value="45" {{$filter[1]==45 ? 'selected' : ''}}>45</option>
                                                </select>
                                            </div>

                                            <div class="single-select-block d-inline-block">
                                                <span class="select-title">Sırala:</span>
                                                <select class="pr-0 order">
                                                    <option value="id_asc_to_desc"   {{$filter[0]=='id_asc_to_desc' ? 'selected' : ''}}>Varsayılan</option>
                                                    <option value="price_asc_to_desc"{{$filter[0]=='price_asc_to_desc' ? 'selected' : ''}}>Ucuzdan Bahaya</option>
                                                    <option value="price_desc_to_asc"{{$filter[0]=='price_desc_to_asc' ? 'selected' : ''}}>Bahadan Ucuza</option>
                                                    <option value="name_asc_to_desc" {{$filter[0]=='name_asc_to_desc' ? 'selected' : ''}}>A-dan Z-yə</option>
                                                    <option value="name_desc_to_asc" {{$filter[0]=='name_desc_to_asc' ? 'selected' : ''}}>Z-dən A-ya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--=======  End of shop page header  =======-->
                                </div>
                                <div class="col-lg-3 order-2 order-lg-1">
                                    <!--=======  page sidebar wrapper =======-->
                                    <div class="page-sidebar-wrapper">
                                        <!--=======  single sidebar widget  =======-->
                                        <div class="single-sidebar-widget">

                                            <h4 class="single-sidebar-widget__title">Bütün Kateqoriyalar</h4>
                                            <ul class="single-sidebar-widget__category-list">
                                                @if(count($categories['categories']) >0)
                                                    @foreach($categories['categories'] as $categories)
                                                        <li class="has-children"><a href="{{route('category',$categories->slug)}}" class="{{$categories->id==$category->id ? 'active' : ''}}" >{{$categories->name}} <span class="counter">{{$categories->product()->count()}}</span></a>
                                                            @if($categories->child()->count()>0)
                                                                <ul>
                                                                    @foreach($categories->child as $childCategory)
                                                                        <li>
                                                                            <a href="{{route('category',[$categories->slug,$childCategory->slug])}}" class="{{$childCategory->id==$category->id ? 'active' : ''}}">{{$childCategory->name}} <span class="counter">{{$childCategory->product()->count()}}</span></a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                @endif

                                            </ul>
                                        </div>
                                        <!--=======  End of single sidebar widget  =======-->
                                        <!--=======  single sidebar widget  =======-->
                                        <div class="single-sidebar-widget">
                                            <div class="sidebar-sub-widget-wrapper">
                                                <div class="sidebar-sub-widget">
                                                    <h4 class="sidebar-sub-widget__title sidebar-sub-widget__title--price-title">Qiymәt</h4>
                                                    <div class="sidebar-price">
                                                        <div id="price-range" class="mb-10 filterPrice"></div>
                                                        <input type="text" id="price-amount" class="price-amount " readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--=======  End of single sidebar widget  =======-->
                                    </div>
                                    <!--=======  End of page sidebar wrapper  =======-->
                                </div>
                                <div class="col-lg-9 order-1 order-lg-2">
                                    <!--=======  shop page content  =======-->
                                    <div class="shop-page-content">

                                        <div class="row shop-product-wrap grid three-column">
                                            @if($products->count()>0)
                                                @foreach($products as $product)
                                                    <div class="col-12 col-lg-4 col-md-4 col-sm-6">
                                                        <!--=======  product grid view  =======-->
                                                        <div class="single-grid-product grid-view-product">
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
                                                                    @if(in_array($product->id,$basketItem))
                                                                        <a class="removeFromCart" data-product="{{$product->id}}" ><i class="ion-minus"></i></a>
                                                                    @else
                                                                        <a class="addToCart" data-product="{{$product->id}}" ><i class="ion-plus"></i></a>
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
                                                                <p class="single-grid-product__price">
                                                                    {!! $product->discount==1 ?  "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!--=======  End of product grid view  =======-->
                                                        <!--=======  list view product  =======-->
                                                        <div class="single-grid-product single-grid-product--list-view list-view-product">
                                                            <div class="single-grid-product__image single-grid-product--list-view__image">
                                                                <div class="single-grid-product__label">
                                                                    @if($product->discount==1)
                                                                        <span class="sale">-{{$product->interest}}%</span>
                                                                    @endif
                                                                    @if($product->checkIsNew()<=30)
                                                                        <span class="new">Yeni</span>
                                                                    @endif
                                                                </div>
                                                                <a href="single-product.html">
                                                                    <img src="{{asset("uploads/product").'/'.$product->parentPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                                    <img src="{{asset("uploads/product").'/'.$product->childPhoto()->photo}}" class="img-fluid" alt="{{$product->slug}}">
                                                                </a>

                                                                <div class="hover-icons">
                                                                    @if(in_array($product->id,$basketItem))
                                                                        <a class="removeFromCart" data-product="{{$product->id}}" ><i class="ion-minus"></i></a>
                                                                    @else
                                                                        <a class="addToCart" data-product="{{$product->id}}" ><i class="ion-plus"></i></a>
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
                                                            <div class="single-grid-product__content single-grid-product--list-view__content">

                                                                <div class="category"><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></div>
                                                                <h3 class="single-grid-product__title single-grid-product--list-view__title"> <a href="{{route('product.detail',$product->slug)}}">{{ucwords($product->name)}}</a></h3>
                                                                <div class="rating">
                                                                    <i class="ion-android-star-outline star {{star($product->id)['star']>=1 ? 'active' : ''}}" data-star="1" data-product="{{$product->id}}"></i>
                                                                    <i class="ion-android-star-outline star {{star($product->id)['star']>=2 ? 'active' : ''}}" data-star="2" data-product="{{$product->id}}"></i>
                                                                    <i class="ion-android-star-outline star {{star($product->id)['star']>=3 ? 'active' : ''}}" data-star="3" data-product="{{$product->id}}"></i>
                                                                    <i class="ion-android-star-outline star {{star($product->id)['star']>=4 ? 'active' : ''}}" data-star="4" data-product="{{$product->id}}"></i>
                                                                    <i class="ion-android-star-outline star {{star($product->id)['star']==5 ? 'active' : ''}}" data-star="5" data-product="{{$product->id}}"></i>
                                                                </div>
                                                                <p class="single-grid-product__price single-grid-product--list-view__price">
                                                                    {!! $product->discount==1 ?  "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product->price ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}
                                                                </p>
                                                                <p class="single-grid-product--list-view__product-short-desc">{{$product->description}}</p>
                                                            </div>
                                                        </div>
                                                        <!--=======  End of list view product  =======-->
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>

                                    <!--=======  pagination area =======-->
                                    @if($products->count()>0)
                                        <div class="pagination-area">
                                        <div class="pagination-area__left">
                                            Göstərilir: {{$products->currentPage()*$products->count()}} - məhsul, {{$products->total()}} - məhsuldan ({{$products->lastPage()}} səhifə)
                                        </div>
                                        <div class="pagination-area__right">
                                            @php
                                                $page=[];
                                                if(request()->has('order')) {
                                                    $page['order']=request('order');
                                                }
                                                if(request()->has('show')) {
                                                    $page['show']=request('show');
                                                }
                                            @endphp
                                            @if(count($page)>0)
                                                {{$products->appends($page)->links()}}
                                                @else
                                                {{$products->links()}}
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <!--=======  End of pagination area  =======-->
                                    <!--=======  End of shop page content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of shop page wrapper  =======-->
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
        $(document).on('click','.addToCart',function () {
            var product=$(this).data("product");
            var el = $(this);

            var url="{{route('addToCart')}}";
            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",product:product},
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
        $(function() {
            var min="{{$products->min('price')}}";
            var max="{{$products->max('price')}}";
            if(min!='' && max!='') {
                $('#price-range').slider({
                    range: true,
                    min: 0,
                    max: 5000,
                    values: [ min, max ],
                    slide: function( event, ui ) {
                        $('#price-amount').val(ui.values[ 0 ] + '-' + ui.values[ 1 ] );
                    }
                });
                $('#price-amount').val($('#price-range').slider( 'values', 0 ) +
                    '-' + $('#price-range').slider('values', 1 ) );
            } else {
                $('#price-range').slider({
                    range: true,
                    min: 0,
                    max: 5000,
                    values: [ 0, 5000 ],
                    slide: function( event, ui ) {
                        $('#price-amount').val(ui.values[ 0 ] + '-' + ui.values[ 1 ] );
                    }
                });
                $('#price-amount').val($('#price-range').slider( 'values', 0 ) +
                    '-' + $('#price-range').slider('values', 1 ) );
            }



        })
    </script>
    <script>
        $(document).on('click','.productModal',function (e) {
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
        $(document).on('change','.showCount,.order',function () {
            var count=$('.showCount').val();
            var order=$('.order').val();
            var price=$('#price-amount').val();
            var url="{{route('filterBy')}}";
            var slug="{{$category->slug}}";
            $.ajax({
                method:'Get',
                url:url,
                data:{"_token": "{{ csrf_token() }}",count:count,order:order,price:price,slug:slug},
                success:function (response) {
                    window.history.pushState("filterBy", "Title", "{{request()->url()}}?show="+count+"&order="+order+"&price="+price);

                    $('.filterItems').html(response.html)

                    $('#price-range').slider({
                        range: true,
                        min: 0,
                        max: 5000,
                        values: [ response.min, response.max ],
                        slide: function( event, ui ) {
                            $('#price-amount').val(ui.values[ 0 ] + '-' + ui.values[ 1 ] );
                        }
                    });
                    $('#price-amount').val($('#price-range').slider( 'values', 0 ) +
                        '-' + $('#price-range').slider('values', 1 ) );
                }
            })


        })
    </script>

    <script>
        $(document).on('slidechange','#price-range',function () {
            var price=$('#price-amount').val();
            var slug="{{$category->slug}}";
            if(price!="0-5000") {
                var count=$('.showCount').val();
                var order=$('.order').val();
                var url="{{route('filterBy')}}";

                $.ajax({
                    method:'Get',
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",count:count,order:order,price:price,slug:slug},
                    success:function (response) {
                        window.history.pushState("filterBy", "Title", "{{request()->url()}}?show="+count+"&order="+order+"&price="+price);
                        $('.filterItems').html(response.html)

                        $('#price-range').slider({
                            range: true,
                            min: 0,
                            max: 5000,
                            values: [ response.min, response.max ],
                            slide: function( event, ui ) {
                                $('#price-amount').val(ui.values[ 0 ] + '-' + ui.values[ 1 ] );
                            }
                        });
                        $('#price-amount').val($('#price-range').slider( 'values', 0 ) +
                            '-' + $('#price-range').slider('values', 1 ) );
                    }
                })
            }

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