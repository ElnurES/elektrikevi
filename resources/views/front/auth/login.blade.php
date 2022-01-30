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
                                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                                @include('front.layouts.include.alert-messages')
                                <!-- Login Form s-->
                                    <form action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="login-form">
                                            <h4 class="login-title">Giriş</h4>

                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <label>E-poçt*</label>
                                                    <input type="email"  name="email" value="{{old('email')}}">
                                                </div>
                                                <div class="col-12">
                                                    <label>Şifrə</label>
                                                    <input type="password"  name="password">
                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="check-box d-inline-block ml-0 ml-md-2">
                                                        <input type="checkbox" id="remember_me" name="rememberme">
                                                        <label for="remember_me">Məni xatırla</label>
                                                    </div>

                                                </div>

                                                <div class="col-sm-6 text-left text-sm-right">
                                                    <a href="{{route('reset-password')}}" class="forget-pass-link"> Şifrəni unutmusunuz?</a>
                                                </div>

                                                <div class="col-md-12">
                                                    <button class="register-button">Gİrİş</button>
                                                </div>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection

