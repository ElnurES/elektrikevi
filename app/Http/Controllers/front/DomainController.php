<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStar;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function index()
    {
        $latestProducts=Product::domain()
            ->with('photo')
            ->where('is_active',1)
            ->orderBy('updated_at','Desc')
            ->take(10)
            ->get();


        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        $sliders=Product::domain()->orderBy('created_at','Desc')->take(3)->get();
        $domain=session('domain');

       // dd($latestProducts);
        return view('front.domain',compact('latestProducts','basketItem','wishlistItem','compareItem','desktopCategory','mobileCategory','sliders','domain'));
    }

    public function getModalData()
    {
        $productId=request('productId');
        $product=Product::domain()
            ->with('photo')
            ->where('is_active',1)
            ->findOrFail($productId);

        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');
        $returnHTML = view('front.render.get-modal-data',compact('product','basketItem','wishlistItem','compareItem'))->render();

        return response()->json( ['html'=>$returnHTML]);
    }

    public function rating(Request $request)
    {
        $request->validate([
            'star'=>'required',
            'user'=>'required',
            'product_id'=>'required'
        ]);

        $product_id=request('product_id');

        $data=[
            'star'=>request('star'),
            'user_id'=>request('user'),
            'product_id'=>$product_id
        ];

        ProductStar::updateOrCreate(
            [
                'user_id'=>$request->user,
                'product_id'=>$product_id
            ],
            [
                'user_id'=>$request->user,
                'product_id'=>$product_id,
                'star'=>$request->star
            ]
        );


        $star=star($product_id)['star'];
        $count=star($product_id)['count'];
        $returnHTML = view('front.render.product-star',compact('product_id','star'))->render();
        return response()->json( ['html'=>$returnHTML,'star'=>$star,'count'=>$count]);
    }
}
