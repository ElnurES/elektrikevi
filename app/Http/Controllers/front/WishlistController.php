<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function addToWishlist()
    {
        $product_id=request('product');
        $product=Product::find($product_id);
        $wishlistProducts=session('wishlistProducts');
        if($product->count()>0) {

            $data=[
                'id'=>$product->id,
                'name'=>$product->name,
                'slug'=>$product->slug,
                'photo'=>$product->parentPhoto()->photo,
                'price'=>$product->discount==1 ? $product->discount_price : $product->price
            ];

            if($wishlistProducts=='') {
                Session::put('wishlistProducts',[
                    $product->id=>$data
                ]);
                $wishlistProducts=session('wishlistProducts');
                $countWishlist=count($wishlistProducts);
                return ['msj'=>1,'name'=>$product->name,'count'=>$countWishlist];
            } elseif (is_array($wishlistProducts) and !array_key_exists($product->id,$wishlistProducts)) {
                $result=$wishlistProducts+[$product->id=>$data];
                Session::put('wishlistProducts',$result);
                $countWishlist=count($result);
                return ['msj'=>1,'name'=>$product->name,'count'=>$countWishlist];

            } else {
                return ['msj'=>2,'name'=>$product->name,];
            }

        }

        return ['msj'=>0];
    }

    public function index()
    {
        $title='Seçilmişlər';
        $crumbs=[
            'Seçilmişlər'=>route('wishlist')
        ];
        $wishlistProducts=session('wishlistProducts');
        $basketItem=basketItem();
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.wishlist',compact('title','crumbs','wishlistProducts','basketItem','desktopCategory','mobileCategory'));

    }

    public function removeFromWishlist()
    {
        $product_id=request('product');
        $data=session('wishlistProducts');

            if (array_key_exists($product_id,$data)) {
                Session::forget($product_id);
                unset($data[$product_id]);
                Session::put('wishlistProducts',$data);
                $countWishlist=count($data);
                return ['msj'=>1,'count'=>$countWishlist];
            }


        return ['msj'=>0];
    }


    public function removeFromWishlistById($id)
    {
        $data=session('wishlistProducts');

        if (array_key_exists($id,$data)) {
            Session::forget($id);
            unset($data[$id]);
            Session::put('wishlistProducts',$data);

            return redirect()
                ->route('wishlist')
                ->with('mesaj','Seçilmişlər siyahısından çıxarıldı')
                ->with('type','success');

        }

        return redirect()
            ->route('wishlist')
            ->with('mesaj','Seçilmişlərdə siyahısında belə bir məhsul yoxdur!')
            ->with('type','warning');

    }
}
