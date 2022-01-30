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
                            <div class="row">
                                <!-- My Account Tab Menu Start -->
                                <div class="col-lg-3 col-12">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            İstİfadəçİ Panelİ</a>

                                        <a href="{{route('cart')}}" ><i class="fa fa-shopping-bag"></i> Səbət({{Cart::count()}})</a>

                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Sİfarİşlər</a>

                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Ödəmə Metodları</a>

                                        <a href="#address-edit" data-toggle="tab"><i class="fa fa-info"></i> Əlaqə Məlumatları</a>

                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-lock"></i> Hesab Məlumatları</a>

                                        <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Çıxış</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-12">
                                    @include('front.layouts.include.alert-messages')
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>İstifadəçi Paneli</h3>

                                                <div class="welcome mb-20">
                                                    <p>Salam, <strong>{{$user->fullname}}</strong> </p>
                                                </div>

                                                <p class="mb-0 mt-2">Siz bu panel vasitəsilə  son sifarişlərinizi asanlıqla yoxlaya və nəzərdən keçirə,
                                                    çatdırılma və göndərilmə ünvanlarınızı idarə edə, şifrə və hesab məlumatlarınızı yeniləyə bilərsiniz.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>

                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Ad soyad</th>
                                                            <th>Status</th>
                                                            <th>Sifariş tarixi</th>
                                                            <th>Qiymət</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if($orders->count()>0)
                                                                @foreach($orders as $key=>$order)
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td>{{$order->fullname}}</td>
                                                                        <td>{{$order->status->name}}</td>
                                                                        <td>${{$order->order_total}}</td>
                                                                        <td>{{$order->order_created_at_no_pm()}}</td>
                                                                        <td>
                                                                            <a href="{{route('order-detail',$order->id)}}" class="btn">Ətraflı</a>
                                                                            <a href="{{route('invoice',$order->id)}}" class="btn">H-faktura</a>
                                                                            <a href="{{route('invoiceGeneratePdf',$order->id)}}" class="btn">Yüklə</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Payment Method</h3>

                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Əlaqə Məlumatları</h3>

                                                <div class="account-details-form">
                                                    <form action="{{route('account-detail-changes')}}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12 col-12">
                                                                <input  type="text" name="address" placeholder="Ünvan" value="{{old('address',isset($user->detail->address) ? $user->detail->address : '')}}">
                                                            </div>

                                                            <div class="col-lg-12 col-12">
                                                                <input  type="text" name="mobil_1" placeholder="Mobil 1" value="{{old('mobil_1',isset($user->detail->mobil_1) ? $user->detail->mobil_1 : '')}}">
                                                            </div>

                                                            <div class="col-lg-12 col-12">
                                                                <input  type="text" name="mobil_2" placeholder="Mobil 2" value="{{old('mobil_2',isset($user->detail->mobil_2) ? $user->detail->mobil_2 : '')}}">
                                                            </div>

                                                            <input type="hidden" value="{{$user->id}}" name="user_id">
                                                            <div class="col-12">
                                                                <button class="save-change-btn">Yenİlə</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Hesab Məlumatları</h3>

                                                <div class="account-details-form">
                                                    <form action="{{route('account-changes')}}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" value="{{$user->id}}" name="user_id">
                                                            <div class="col-12">
                                                                <input id="current-pwd" placeholder="Hazırkı şifrə" type="password" name="current_password">
                                                            </div>

                                                            <div class="col-lg-6 col-12">
                                                                <input id="new-pwd" placeholder="Yeni şifrə" type="password" name="password">
                                                            </div>

                                                            <div class="col-lg-6 col-12">
                                                                <input id="confirm-pwd" placeholder="Şifrə təsdiqi" type="password" name="password_confirmation">
                                                            </div>

                                                            <div class="col-12">
                                                                <button class="save-change-btn">Yenİlə</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
                            </div>
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection


