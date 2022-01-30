<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {

        $title='Tez-tez verilən suallar';
        $crumbs=[
            'Tez-tez Verilən Suallar'=>route('delivery')
        ];

        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        $bImage='/elnur/img/FAQ.jpg';

        return view('front.delivery',compact('title','crumbs','desktopCategory','mobileCategory','bImage'));
    }
}
