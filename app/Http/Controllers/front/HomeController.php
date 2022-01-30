<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $latestProducts=Product::with('photo')
            ->where('is_active',1)
            ->orderBy('updated_at','Desc')
            ->take(10)
            ->get();

        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');
        return view('front.index',compact('latestProducts','basketItem','wishlistItem','compareItem'));
    }


}
