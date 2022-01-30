@extends('front.layouts.master')
@section('title',$title)
@section('header')
    @include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
@endsection
@section('head')
    <style>
        .cart-summary {
            /*float: right;*/
            width: 100%;
            max-width: 100%!important;
            margin-left: auto;
        }
    </style>
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
                                <!--=======  cart table  =======-->
                                <div class="cart-table table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pro-thumbnail"></th>
                                            <th class="pro-title">Ad</th>
                                            <th class="pro-price">Alış Qİymətİ</th>
                                            <th class="pro-quantity">Ədəd</th>
                                            <th class="pro-subtotal">Cəmİ</th>
                                        </tr>
                                        </thead>
                                        <tbody class="cartTable">

                                        @foreach($order->basket->basket_products as $basket)
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    <a href="{{route('product.detail',$basket->product->slug)}}">
                                                        <img src="{{asset("uploads/product").'/'.$basket->product->parentPhoto()->photo}}" class="img-fluid" alt="{{$basket->product->name}}">
                                                    </a>
                                                </td>
                                                <td class="pro-title"><a class="locationChoose" href="{{route('product.detail',$basket->product->slug)}}">{{$basket->product->name}}</a></td>
                                                <td class="pro-price"><span>{{$basket->price}} </span></td>
                                                <td class="pro-quantity">
                                                    {{$basket->count}}
                                                </td>
                                                <td class="pro-subtotal"><span>${{$basket->count*$basket->price}}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-12 d-flex">
                                        <!--=======  Cart summery  =======-->

                                        <div class="cart-summary">
                                            <div class="cart-summary-wrap">
                                                <p>Cəmi <span>{{$order->sub_total}} ⫙</span></p>
                                                <p>ƏDV (21%)  <span>{{$order->order_total-$order->sub_total}} ⫙</span></p>
                                                <h2>Cəmi(Ədv ilə) <span>{{$order->order_total}} ⫙</span></h2>
                                            </div>
                                        </div>

                                        <!--=======  End of Cart summery  =======-->

                                    </div>

                                </div>
                                <!--=======  End of cart table  =======-->
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection

