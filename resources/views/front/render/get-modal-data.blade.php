<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <a href="" class="close" id='close' >
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-body">
            <div class="col-xl-12 col-lg-12">
                <!--=======  single product main content area  =======-->
                <div class="single-product-main-content-area">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <!--=======  product details slider area  =======-->

                            <div class="product-details-slider-area">


                                <div class="big-image-wrapper">

                                    <div class="product-details-big-image-slider-wrapper-quick product-details-big-image-slider-wrapper--bottom-space ht-slick-slider" data-slick-setting='{
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
                                            @foreach($product->photo() as $photo)
                                                <div class="single-image">
                                                    <img src="{{asset("uploads/product").'/'.$photo->photo}}" class="img-fluid" alt="{{asset("uploads/product").'/'.$photo->photo}}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--horizontal-space ht-slick-slider" data-slick-setting='{
            "slidesToShow": 4,
            "slidesToScroll": 1,
            "arrows": true,
            "autoplay": false,
            "autoplaySpeed": 5000,
            "speed": 500,
            "asNavFor": ".product-details-big-image-slider-wrapper-quick",
            "focusOnSelect": true,
            "centerMode": false,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
        }' data-slick-responsive='[
            {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": false} },
            {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": false} },
            {"breakpoint":991, "settings": {"slidesToShow": 5, "arrows": false, "slidesToScroll": 1} },
            {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1} },
            {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1} },
            {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1} }
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

                            <!--=======  End of product details slider area  =======-->
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <!--=======  single product content description  =======-->
                            <div class="single-product-content-description">
                                <p class="single-info"><a ></a> </p>
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

                                <div class="product-actions product-actions--quick-view">
                                    <div class="quantity-selection">
                                        <label>Ədəd</label>
                                        <input type="number" value="1" class="qty" min="1">
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
                            </div>
                            <!--=======  End of single product content description  =======-->
                        </div>
                    </div>
                </div>
                <!--=======  End of single product main content area  =======-->
            </div>
        </div>
    </div>

</div>