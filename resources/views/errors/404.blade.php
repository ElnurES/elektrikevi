@extends('front.layouts.master')

@php
    $title='Səhifə tapılmadı';
        $crumbs=[
            'Səhifə tapılmadı'=>null
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
@endphp

@section('title',$title)

@section('header')
    @include('front.layouts.include.header-two',['desktopCategory'=>$desktopCategory,'mobileCategory'=>$mobileCategory])
@endsection
@section('breadcrumb')
    @include('front.layouts.include.breadcrumb',compact('crumbs','title'))
@endsection
@section('main-content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1>404</h1>
            <h3>Səhifə tapılmadı</h3>
            <a href="{{route('home')}}" class="btn btn-primary">Əsas Səhifə</a>
        </div>
    </div>
@endsection

