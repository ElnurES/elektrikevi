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
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="faq-wrapper">

                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Sizdən Hissə-hissə ödənişlə məhsul almaq mümkündür? <span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Bəli, Siz məhsulları 24 ayadək hissə-hissə ödəniş şərtlərilə əldə edə bilərsiniz. Əksər məhsullar 18 ayadək Faizsiz hissə-hissə ödəniş şərtlərilə, İlkin ödənişsiz, iş yerindən arayış tələb olunmadan təqdim olunur.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Alınan malın ödənişi hansı valyuta ilə hesablanır? <span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Elektrikevi mağazalarından istər nağd, istərsə də hissə-hissə ödənişlə əldə olunan bütün məhsulların ödənişi yalnız Azərbaycan Respublikasının milli valyutası – Azərbaycan manatı ilə hesablanır.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Qiymətlər bütün mağazalarınızda eynidir? <span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Bəli, məhsulların qiymətləri bütün mağazalarımızda eynidir.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFour">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            Mağazalarınızın iş rejimi necədir? <span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Elektrikevi mağazaları həftənin 7 günü saat 9:00-dan, 19:00-dək xidmətinizdədir. Yeni il və digər bayram günlərində mağazaların iş rejimində dəyişikliklər ola bilər.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            Məhsullara zəmanət verilir?<span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Bəli, Elektrikevi mağazalarında aksessuarlar istisna olmaqla, bütün məhsullara rəsmi zəmanət verilir.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingSix">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                            Çatdırılma  pulsuzdur?<span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Bəli, çatdırılma  tamamilə pulsuzdur. Hazırda çatdırılma xidməti Bakı, Sumqayıt və Gəncə şəhərləri daxilində həyata keçirilir.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingSeven">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                            Təklif və ya tövsiyələr üçün necə müraciət edə bilərik?<span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Elektrikevi mağazalarına təklif və ya tövsiyələrinizi +99450 605 8444 əlaqə nömrəsinə zəng etməklə bildirə bilərsiniz. Həmçinin, saytımızda “Əlaqə” pəncərəsindən istifadə etmək də mümkündür.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingEight">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                            Siz hansı brendlərin rəsmi distribüterisiniz?<span> <i class="fa fa-chevron-down"></i>
                                                            <i class="fa fa-chevron-up"></i> </span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>
                                                            Elektrikevi ZANASİ,DOMİNO,VİDEOJET kimi brendlərin rəsmi distribüteridir.
                                                        </p>
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

