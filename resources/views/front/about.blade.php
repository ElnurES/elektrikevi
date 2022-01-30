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
                        <div class="page-content-wrapper" style="border-bottom: 0px;">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="about-top-content-wrapper">
                                        <div class="row row-30">
                                            <!-- About Image -->
                                            <div class="col-lg-6">
                                                <div class="about-image">
                                                    <img src="/front/assets/img/banners/img2-middle-eposi1.jpg" class="img-fluid" alt="">
                                                </div>
                                            </div>

                                            <!-- About Content -->
                                            <div class="about-content col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h1>Əziz Həmkarlar və <span>Tərəfdaşlar!</span></h1>
                                                        <p class="mb-3">Fəaliyyətimizin mənası adımızda əks olunur "Elektrikevi".
                                                            Üçüncü onillikdə, müxtəlif bazar seqmentləri üçün yüksək keyfiyyətli elektrik məhsullarının tədarükündə ixtisaslaşmışıq. 
                                                            Hər hansı bir mürəkkəb obyektlərin elektrik avadanlıqları
                                                            ilə təchiz edilməsi məsələsinə peşəkarlıqla yanaşmağa imkan verən bazarı inkişaf etdiririk və inkişaf etdirik,
                                                            dəyişiklikləri və yenilikləri izləyirik.
                                                            </p>
                                                    </div>

                                                    <div class="col-12">
                                                        <h4>2020-ci ilin ƏN YAXŞI ONLINE MƏHSULU</h4>
                                                        <p>Fəaliyyətimiz inteqrasiya olunmuş bir yanaşmaya - Ədalətli qiymətə keyfiyyətli məhsul! Müştərilərimiz üçün yüksək səviyyəli xidmətlərin yaradılması şirkətimiz üçün prioritet məsələdir.
                                                           <p>
                                                                <ul style="list-style-type: disc; padding-left: 15px !important;">
                                                                    <li>Elektrik məhsullarının keyfiyyəti və təhlükəsizliyi;</li>
                                                                    <li>Müasir elektrik avadanlıqlarının təşviqi və istehlak mədəniyyəti;</li>
                                                                    <li>Enerji qənaəti və alternativ (ekoloji cəhətdən təmiz) enerji;</li>
                                                                    <li>Müştəri yönümlü yanaşma və ədalətli iş.</li>
                                                                </ul>
                                                            </p>
                                                           <p> Bizə güvənən, əməkdaşlıq edən və inkişaf etdirən bütün Müştərilərimizə, Tərəfdaşlarımıza minnətdarıq. Ümidvarıq ki, gələcəkdə münasibətlərimiz daha da möhkəmlənəcək və genişlənəcəkdir.</p>
                                                        </p>
                                                        <p style="text-align:right;"> Hörmətlə, Xaqani Məmmədov</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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