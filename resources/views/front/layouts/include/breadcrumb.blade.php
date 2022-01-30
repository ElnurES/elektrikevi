<div class="breadcrumb-area section-space--half">
    <div class="container wide">
        <div class="row">
            <div class="col-lg-12">

                <!--=======  breadcrumb wrpapper  =======-->
                <div class="breadcrumb-wrapper breadcrumb-bg" style="background-image: url({{(isset($bImage) and !is_null($bImage)) ? $bImage : '/uploads/banner/s10.jpg'}});">
                    <!--=======  breadcrumb content  =======-->
                    <div class="breadcrumb-content">

                        <h2 class="breadcrumb-content__title">{{$title}}</h2>


                        <ul class="breadcrumb-content__page-map">
                            <li><a href="{{route('home')}}">Əsas Səhifə</a></li>

                            @if(count($crumbs)>0)
                                @foreach($crumbs as $key=>$crumb)
                                    @if(!$loop->last)
                                        <li><a href="{{$crumb}}">{{$key}}</a></li>
                                        @else
                                            <li class="active">{{$key}}</li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <!--=======  End of breadcrumb content  =======-->
                </div>
                <!--=======  End of breadcrumb wrpapper  =======-->
            </div>
        </div>
    </div>
</div>