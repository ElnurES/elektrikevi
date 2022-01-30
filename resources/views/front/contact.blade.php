@extends('front.layouts.master')
@section('title',$title)
@section('header')
    @include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
@endsection
@section('breadcrumb')
    @include('front.layouts.include.breadcrumb',compact('crumbs','title','bImage'))
@endsection
@section('main-content')
    <div class="page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <!--=============================================
                    =            google map container         =
                    =============================================-->

                            <div class="google-map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3030.0142823764318!2d49.66376981513318!3d40.5854401532858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403096dcd5c6f035%3A0xb1e11f0f23d4280e!2sSumgayit%20Plaza%20Hotel!5e0!3m2!1saz!2s!4v1577988329012!5m2!1saz!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>

                            <!--=====  End of google map container  ======-->

                            <div class="row">
                                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                                    <!--=======  contact page side content  =======-->

                                    <div class="contact-page-side-content">
                                        <p class="contact-page-message">
                                        <h3 style="margin-bottom: 25px">Bizimlə əlaqə saxlayın</h3>
                                           "Elektikevi" şirkəti müasir elektrik avadanlıqlarının satışı, Azərbaycan və xarici istehsalçıların məhsullarını təklif edir. 
                                           Bu sahədə məsuliyyətli iş bizə nüfuz və hörmət qazanmağa imkan verdi, bunun sayəsində müştərilər inamla əlaqə saxlayır.

                                        </p>
                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h3><i class="fa fa-fax"></i> Ünvan</h3>
                                            <p>{{$config->location}}</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->

                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h3><i class="fa fa-phone"></i> Telefon</h3>
                                            <p>{{$config->mobil_1}}</p>
                                            <p>{{$config->mobil_2}}</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->

                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h3><i class="fa fa-envelope-o"></i> E-poçt</h3>
                                            <p>{{$config->email}}</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->
                                    </div>

                                    <!--=======  End of contact page side content  =======-->

                                </div>
                                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                                    <!--=======  contact form content  =======-->

                                    <div class="contact-form-content">
                                        <h3 class="contact-page-title">Bizə Bildir</h3>
                                        @include('front.layouts.include.alert-messages')
                                        <div class="contact-form">
                                            <form id="contact-form" action="{{route('contact.store')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Ad Soyad <span class="required">*</span></label>
                                                    <input type="text" name="fullname" id="con_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>E-poçt <span class="required">*</span></label>
                                                    <input type="email" name="email" id="con_email" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Mesaj</label>
                                                    <textarea name="message" id="con_message"></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" value="submit" id="submit" class="contact-button" >Göndər</button>
                                                </div>
                                            </form>
                                        </div>
                                        <p class="form-messege"></p>
                                    </div>

                                    <!--=======  End of contact form content =======-->
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