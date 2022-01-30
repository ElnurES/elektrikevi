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
                            @if(Cart::count()>0)
                                <form action="#">
                                    <!--=======  cart table  =======-->
                                    <div class="cart-table table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="pro-thumbnail"></th>
                                                <th class="pro-title">Ad</th>
                                                <th class="pro-price">Qİymət</th>
                                                <th class="pro-quantity">Ədəd</th>
                                                <th class="pro-subtotal">Cəmİ</th>
                                                <th class="pro-remove">Sİl</th>
                                            </tr>
                                            </thead>
                                            <tbody class="cartTable">
                                            @foreach(Cart::content() as $cart)
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="{{route('product.detail',$cart->options->slug)}}">
                                                            <img src="{{asset("uploads/product").'/'.$cart->options->photo}}" class="img-fluid" alt="{{$cart->name}}">
                                                        </a>
                                                    </td>
                                                    <td class="pro-title"><a class="locationChoose" href="{{route('product.detail',$cart->options->slug)}}">{{$cart->name}}</a></td>
                                                    <td class="pro-price"><span>{{$cart->price}} ⫙</span></td>
                                                    <td class="pro-quantity" data-id="{{$cart->rowId}}">
                                                        <div class="quantity-selection"><input  type="number" class="qty"  value="{{$cart->qty}}" min="1"></div>
                                                    </td>
                                                    <td class="pro-subtotal"><span>${{$cart->subtotal}}</span></td>
                                                    <td class="pro-remove"><a href="{{route('removeFromCartByRowId',$cart->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--=======  End of cart table  =======-->
                                </form>
                                <div class="row">
                                    <div class="col-lg-12 col-12 d-flex">
                                        <!--=======  Cart summery  =======-->

                                        <div class="cart-summary">
                                            <div class="cart-summary-wrap">
                                                <h4>Səbət xülasəsi</h4>
                                                <p>Cəmi <span>{{Cart::subtotal()}} ⫙</span></p>
                                                <p>ƏDV (21%)  <span>{{Cart::tax()}} ⫙</span></p>
                                                <h2>Cəmi(Ədv ilə) <span>{{Cart::total()}} ⫙</span></h2>
                                            </div>
                                            <div class="cart-summary-button">
                                                <button class="checkout-btn"><a href="{{route('checkout')}}">Sİfarİş Et</a></button>
                                                <button class="update-btn updateCart">Səbəti Yenilə</button>
                                            </div>
                                        </div>

                                        <!--=======  End of Cart summery  =======-->

                                    </div>

                                </div>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Səbətiniz boşdur!
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

@section('foot')
    <script>
        $(document).on('click','.updateCart',function () {
            var url="{{route('updateCartAsCountByRowId')}}";
            var a=[];
            var b=[];
            $('.cartTable > tr').each(function() {
                var trList=$(this);
                var td=trList.find( "td:eq(3)" );
                var qty=td.find('.qty').val();
                var rowId=td.data('id');
                a.push(qty);
                b.push(rowId);
            });

            $.ajax({
                url:url,
                dataType: "json",
                data:{"_token": "{{ csrf_token() }}",qty:a,rowId:b},
                type:'POST',
                success:function (response) {
                    location.reload(true);
                }
            });
        });
    </script>

@endsection
