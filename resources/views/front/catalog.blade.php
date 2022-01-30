@extends('front.layouts.master')
@section('title',$title)
@section('header')
    @include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
    <style>
        .title-holder h2 {
            margin-bottom: 4rem;
            font-size: 2rem;
            font-weight: 600;
        }

        .item-frame {
            background-color: rgb(237, 231, 220);
            padding: 1rem;
            border-radius: 1rem;
            height: 12rem;
        }

        .item-frame:hover {
            background-color: rgb(241, 229, 209);
        }

        .img-holder img {
            margin: auto;
            max-width: 94%;
            display: block;
        }
        .item{
            margin-bottom: 2rem;
        }
        .item-name {
            color: #020303;
            font-size: 1rem;
            position: absolute;
        }

        .img-holder {
            padding: 2rem 0px;
        }

        @media only screen and (max-width: 768px) {
            .item-frame {
                margin-bottom: 2rem;
            }

            .item-name {
                font-size: 0.8rem;
            }

            .img-holder img {
                width: 100%;
            }

            .item-frame {
                height: 10rem;
            }
        }

        @media only screen and (max-width: 320px) {

            .item-frame {
                padding: 1rem 0.5rem;
            }

            .item-name {
                font-size: 0.7rem;

            }
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
                            <section class="showcase-section showcase-section_portal" style="position: relative">
                                <div class="container">
                                    @if(count($categories['categories']) >0)
                                        @foreach($categories['categories'] as $category)
                                            <div class="product-categories" style="margin-bottom: 4rem">
                                                <div class="item item-title">
                                                    <div class="title-holder">
                                                        <h2>{{$category->name}}</h2>
                                                    </div>
                                                </div>
                                                @if($category->child()->count()>0)
                                                    <div class="row">
                                                        @foreach($category->child as $childCategory)
                                                            <div class="col-md-3 col-6 item">
                                                                <div class="item-frame">
                                                                    <a href="{{route('category',$childCategory->slug)}}"
                                                                       class="item__link">
                                                                        <span class="item-name">{{$childCategory->name}}</span>
                                                                        <div class="img-holder"><img
                                                                                    src="{{asset("uploads/catalog").'/'.$childCategory->photo}}"
                                                                                    alt="{{$childCategory->name}}"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </section>

                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

@endsection

