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
                            @include('front.layouts.include.alert-messages')
                            @if(count($newCompareProducts)>0)
                                <form action="#">

                                    <!-- Compare Table -->
                                    <div class="compare-table table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="first-column">Ad</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="product-image-title">
                                                        <a href="{{route('product.detail',$newCompareProducts[0]['slug'])}}" class="image"><img src="{{asset("uploads/product").'/'.$newCompareProducts[0]['photo']}}" class="img-fluid" alt="{{$newCompareProducts[0]['name']}}"></a>
                                                        <a href="{{route('product.detail',$newCompareProducts[0]['slug'])}}" class="title">{{$newCompareProducts[0]['name']}}</a>
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="product-image-title">
                                                        <a href="{{route('product.detail',$newCompareProducts[1]['slug'])}}" class="image"><img src="{{asset("uploads/product").'/'.$newCompareProducts[1]['photo']}}" class="img-fluid" alt="{{$newCompareProducts[1]['name']}}"></a>
                                                        <a href="{{route('product.detail',$newCompareProducts[1]['slug'])}}" class="title">{{$newCompareProducts[1]['name']}}</a>
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="product-image-title">
                                                        <a href="{{route('product.detail',$newCompareProducts[2]['slug'])}}" class="image"><img src="{{asset("uploads/product").'/'.$newCompareProducts[2]['photo']}}" class="img-fluid" alt="{{$newCompareProducts[2]['name']}}"></a>
                                                        <a href="{{route('product.detail',$newCompareProducts[2]['slug'])}}" class="title">{{$newCompareProducts[2]['name']}}</a>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="first-column">Təsvir</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="pro-desc">
                                                        <p>{{$newCompareProducts[0]['description']}}</p>
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="pro-desc">
                                                        <p>{{$newCompareProducts[1]['description']}}</p>
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="pro-desc">
                                                        <p>{{$newCompareProducts[2]['description']}}</p>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="first-column">Qiymət</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="pro-price">{{$newCompareProducts[0]['price']}} ⫙</td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="pro-price">{{$newCompareProducts[1]['price']}} ⫙</td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="pro-price">{{$newCompareProducts[2]['price']}} ⫙</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="first-column">Stok</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="pro-stock">{{$newCompareProducts[0]['stock_count']>0 ? 'Vardır' : 'Yoxdur'}}</td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="pro-stock">{{$newCompareProducts[1]['stock_count']>0 ? 'Vardır' : 'Yoxdur'}}</td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="pro-stock">{{$newCompareProducts[2]['stock_count']>0 ? 'Vardır' : 'Yoxdur'}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="first-column">Add to cart</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="pro-addtocart">
                                                        @if(in_array($newCompareProducts[0]['id'],$basketItem))
                                                            <a class="add-to-cart" href="{{route('removeFromCartById',$newCompareProducts[0]['id'])}}">
                                                                <i class="ion-minus fa-2x"></i>
                                                            </a>
                                                        @else
                                                            <a class="add-to-cart" href="{{route('addToCartById',$newCompareProducts[0]['id'])}}">
                                                                <i class="ion-plus fa-2x"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="pro-addtocart">
                                                        @if(in_array($newCompareProducts[1]['id'],$basketItem))
                                                            <a class="add-to-cart" href="{{route('removeFromCartById',$newCompareProducts[1]['id'])}}">
                                                                <i class="ion-minus fa-2x"></i>
                                                            </a>
                                                        @else
                                                            <a class="add-to-cart" href="{{route('addToCartById',$newCompareProducts[1]['id'])}}">
                                                                <i class="ion-plus fa-2x"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="pro-addtocart">
                                                        @if(in_array($newCompareProducts[2]['id'],$basketItem))
                                                            <a class="add-to-cart" href="{{route('removeFromCartById',$newCompareProducts[2]['id'])}}">
                                                                <i class="ion-minus fa-2x"></i>
                                                            </a>
                                                        @else
                                                            <a class="add-to-cart"name=""  href="{{route('addToCartById',$newCompareProducts[2]['id'])}}">
                                                                <i class="ion-plus fa-2x"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="first-column">Sil</td>
                                                @if(isset($newCompareProducts[0]['id']))
                                                    <td class="pro-remove"><a href="{{route('removeFromCompareById',$newCompareProducts[0]['id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                                @endif
                                                @if(isset($newCompareProducts[1]['id']))
                                                    <td class="pro-remove"><a href="{{route('removeFromCompareById',$newCompareProducts[1]['id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                                @endif
                                                @if(isset($newCompareProducts[2]['id']))
                                                    <td class="pro-remove"><a href="{{route('removeFromCompareById',$newCompareProducts[2]['id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                                @endif
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Müqayisə ediləcək məhsul yoxdur!
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection

