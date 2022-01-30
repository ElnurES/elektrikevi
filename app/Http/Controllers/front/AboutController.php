<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title='Şirkət Haqqında';
        $crumbs=[
            'Şirkət Haqqında'=>route('about')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.about',compact('title','crumbs','desktopCategory','mobileCategory'));
    }
}
