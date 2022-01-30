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
                                <h4 class="sidebar-sub-widget__title sidebar-sub-widget__title--price-title">Fillter By Price</h4>
                                <div class="sidebar-price">
                                    <div id="price-range" class="mb-10"></div>
                                    <input type="text" id="price-amount" class="price-amount" readonly>
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
                                                @endif                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
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
                                            <p class="single-grid-product__price">
                                                {!! $product->discount==1 ?  "<span class='discounted-price'>$product->discount_price ⫙</span>" : "<span class='discounted-price'>$product-> ⫙</span>" !!} {!! $product->discount==1 ? "<span class='main-price discounted'>$product->price ⫙</span>" : '' !!}
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
                                                @endif                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                <a href="javascript:void(0)" class="productModal" data-toggle="modal" data-id="{{$product->id}}" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-grid-product__content single-grid-product--list-view__content">

                                            <div class="category"><a href="shop-left-sidebar.html">{{$category->name}}</a></div>
                                            <h3 class="single-grid-product__title single-grid-product--list-view__title"> <a href="single-product.html">{{ucwords($product->name)}}</a></h3>
                                            <div class="rating">
                                                <i class="ion-android-star active"></i>
                                                <i class="ion-android-star active"></i>
                                                <i class="ion-android-star active"></i>
                                                <i class="ion-android-star active"></i>
                                                <i class="ion-android-star-outline"></i>
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
                        {{--<div class="pagination-area__right">--}}
                            {{--@php--}}
                                {{--$page=[];--}}
                                {{--if(request()->has('order')) {--}}
                                    {{--$page['order']=request('order');--}}
                                {{--}--}}
                                {{--if(request()->has('show')) {--}}
                                    {{--$page['show']=request('show');--}}
                                {{--}--}}
                            {{--@endphp--}}
                            {{--@if(count($page)>0)--}}
                                {{--{{$products->appends($page)->links()}}--}}
                            {{--@else--}}
                                {{--{{$products->links()}}--}}
                            {{--@endif--}}
                            {{--{{request()->segment(1)}}--}}
                        {{--</div>--}}
                    </div>
            @endif
            <!--=======  End of pagination area  =======-->
                <!--=======  End of shop page content  =======-->
            </div>
        </div>
    </div>
</div>