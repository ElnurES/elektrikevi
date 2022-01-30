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
                            @if(is_array($wishlistProducts) and count($wishlistProducts)>0)
                                <form action="#">
                                    <!--=======  cart table  =======-->
                                    <div class="cart-table table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="pro-thumbnail"></th>
                                                <th class="pro-title">Ad</th>
                                                <th class="pro-price">Qİymət</th>
                                                <th class="pro-remove">Sİl</th>
                                                <th class="pro-title">Səbət</th>
                                            </tr>
                                            </thead>
                                            <tbody class="cartTable">
                                            @foreach($wishlistProducts as $wishlist)
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="{{route('product.detail',$wishlist['slug'])}}">
                                                            <img src="{{asset("uploads/product").'/'.$wishlist['photo']}}" class="img-fluid" alt="{{$wishlist['name']}}">
                                                        </a>
                                                    </td>
                                                    <td class="pro-title"><a class="locationChoose" href="{{route('product.detail',$wishlist['slug'])}}">{{$wishlist['name']}}</a></td>
                                                    <td class="pro-price"><span>{{$wishlist['price']}} ⫙</span></td>
                                                    <td class="pro-remove"><a href="{{route('removeFromWishlistById',$wishlist['id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                                    <td>
                                                        @if(in_array($wishlist['id'],$basketItem))
                                                            <a href="{{route('removeFromCartById',$wishlist['id'])}}">
                                                                <i class="ion-minus fa-2x"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{route('addToCartById',$wishlist['id'])}}">
                                                                <i class="ion-plus fa-2x"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--=======  End of cart table  =======-->
                                </form>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Seçilmiş məhsul yoxdur!
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

