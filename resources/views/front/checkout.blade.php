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
                            <!-- Checkout Form s-->
                            <form action="{{route('checkout')}}" class="checkout-form" method="Post">
                                @csrf
                                <div class="row row-40">
                                    <div class="col-lg-7">
                                        <!-- Billing Address -->
                                        <div id="billing-form">
                                            <h4 class="checkout-title">Çatdırılma ünvanı</h4>

                                            <div class="row">

                                                <div class="col-md-6 col-md-12">
                                                    <label>Ad Soyad*</label>
                                                    <input type="text" name="fullname" value="{{$user->fullname}}">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>E-Poçt*</label>
                                                    <input type="email" name="email" value="{{$user->email}}">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Telefon*</label>
                                                    <input type="text" name="mobil" value="{{$user->detail->mobil_1}}">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Şəhər/Rayon*</label>
                                                    <input type="text" name="city">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Rayon*</label>
                                                    <input type="text" name="region">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Küçə*</label>
                                                    <input type="text" name="street">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Poçt İndeks Kodu*</label>
                                                    <input type="text" name="zip_code">
                                                </div>

                                                <div class="col-12">
                                                    <label>Ünvan/Ətraflı*</label>
                                                    <textarea rows="7" style="width: 100%;" class="form-group" name="adress">{{$user->detail->address}}</textarea>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Sifarişim</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Məhsul <span>Cəmi</span></h4>

                                                    <ul>
                                                        @if(Cart::count()>0)
                                                            @foreach(Cart::content() as $cart)
                                                                <li><a href="{{route('product.detail',$cart->options->slug)}}">{{$cart->name}}</a>   X  <span>{{$cart->price}} ⫙</span></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>

                                                    <p>Cəmi <span>{{Cart::subtotal()}} ⫙</span></p>
                                                    <p>Ünvan çatdırılma <span>00.00 ⫙</span></p>
                                                    <p>ƏDV (21%)  <span>{{Cart::tax()}} ⫙</span></p>
                                                    <h4>Cəmi(Ədv ilə) <span>{{Cart::total()}} ⫙</span></h4>

                                                </div>

                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Ödəniş növü</h4>

                                                <div class="checkout-payment-method">

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_check" name="payment-method" value="1">
                                                        <label for="payment_check">Çatdırılma zamanı nağd ödəniş</label>
                                                        <p data-method="1">Bu ödəmə usulu ilə səbətdəki məhsullar iki günlüyünə sizin adınıza bron edilir.
                                                            İki gün ərzində ödəmə edilməzsə sifariş adınızdan çıxarılır.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_bank" disabled name="payment-method" value="bank">
                                                        <label for="payment_bank">Visa / Mastercard</label>
                                                        <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_cash" disabled name="payment-method" value="cash">
                                                        <label for="payment_cash">Taksit kartlar</label>
                                                        <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                </div>

                                                <button class="place-order">RƏSMİLƏŞDİR</button>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection

