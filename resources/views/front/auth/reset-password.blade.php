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
                                    <form action="{{route('reset-password')}}" method="POST">
                                        @csrf
                                        <div class="login-form">
                                            <h4 class="login-title">Şifrə Yeniləmə</h4>

                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <label>E-poçt*</label>
                                                    <input type="email"  name="email" value="{{old('email')}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <button class="register-button">Yenİlə</button>
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

