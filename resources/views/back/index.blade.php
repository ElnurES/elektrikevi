@extends('back.layouts.master')
@section('title','Əsas Səhifə')
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Məhsullar</div>
                <div class="panel-body">
                    <h4>{{$products->count()}}</h4>
                    <a href="{{route('admin.product')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Mesajlar</div>
                <div class="panel-body">
                    <h4>{{$contacts->count()}}</h4>
                    <a href="{{route('admin.contact')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Abunələr</div>
                <div class="panel-body">
                    <h4>{{$subscribes->count()}}</h4>
                    <a href="{{route('admin.subscribe')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">İstifadəçilər</div>
                <div class="panel-body">
                    <h4>{{$users->count()}}</h4>
                    <a href="{{route('admin.user')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sifarişlər</div>
                <div class="panel-body">
                    <h4>{{$orders->count()}}</h4>
                    <a href="{{route('admin.order')}}">Daha Çox</a>
                </div>
            </div>
        </div>
    </section>
@endsection