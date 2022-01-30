<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addToCart()
    {
        $product_id=request('product');
        $product=Product::find($product_id);

        if($product->count() >0) {
            if($product->discount==1) {
                $cartItem=Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->discount_price,
                        'weight' => 0,
                        'options' => [
                            'slug' => $product->slug,
                            'photo'=>$product->parentPhoto()->photo
                        ]
                    ]
                );
            }

            if($product->discount==0) {
                $cartItem=Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->price,
                        'weight' => 0,
                        'options' => [
                            'slug' => $product->slug,
                            'photo'=>$product->parentPhoto()->photo
                        ]
                    ]
                );
            }

            $returnHTML = view('front.render.header-cart-item')->render();
            return ['msj'=>1,'cartCount'=>Cart::count(),'name'=>$product->name,'html'=>$returnHTML];
        }

        $returnHTML = view('front.render.header-cart-item')->render();

        return ['msj'=>0,'cartCount'=>Cart::count(),'html'=>$returnHTML];

    }

    public function removeFromCart()
    {
        $product_id=request('product');
        $product=Product::findOrFail($product_id);
        foreach (Cart::content() as $cart) {
            if($cart->id==$product_id) {
                Cart::remove($cart->rowId);
            }
        }
        $returnHTML = view('front.render.header-cart-item')->render();
        return ['msj'=>1,'cartCount'=>Cart::count(),'name'=>$product->name,'html'=>$returnHTML];

    }

    public function removeFromCartByRowId()
    {
        $rowId=request('rowId');
        $product=Cart::get($rowId);
        Cart::remove($rowId);

        return redirect()
            ->back()
            ->with('mesaj',$product->name.' Səbətdən çıxarıldı')
            ->with('type','warning');
    }

    public function index()
    {
        $title='Səbət';
        $crumbs=[
            'Səbət'=>route('cart')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.cart',compact('title','crumbs','desktopCategory','mobileCategory'));
    }

    public function updateCartAsCountByRowId()
    {
       $qty=request('qty');
       $rowId=request('rowId');

        foreach ($rowId as $key=>$row)
        {
            Cart::update($row, ['qty' => $qty[$key]]);
        }

        return 1;

    }

    public function addToCartWithQty()
    {
        $product_id=request('product');
        $qty=request('qty');
        $product=Product::find($product_id);

        if($product->count() >0) {

            $cartItem=Cart::add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $qty,
                    'price' => $product->discount==1 ? $product->discount_price : $product->price,
                    'weight' => 0,
                    'options' => [
                        'slug' => $product->slug,
                        'photo'=>$product->parentPhoto()->photo
                    ]
                ]
            );



            $returnHTML = view('front.render.header-cart-item')->render();
            return ['msj'=>1,'cartCount'=>Cart::count(),'name'=>$product->name,'html'=>$returnHTML];
        }

        $returnHTML = view('front.render.header-cart-item')->render();

        return ['msj'=>0,'cartCount'=>Cart::count(),'html'=>$returnHTML];
    }

    public function addToCartById($product_id)
    {
        $product=Product::find($product_id);

        if($product->count() >0) {
            if($product->discount==1) {
                $cartItem=Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->discount_price,
                        'weight' => 0,
                        'options' => [
                            'slug' => $product->slug,
                            'photo'=>$product->parentPhoto()->photo
                        ]
                    ]
                );
            }

            if($product->discount==0) {
                $cartItem=Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->price,
                        'weight' => 0,
                        'options' => [
                            'slug' => $product->slug,
                            'photo'=>$product->parentPhoto()->photo
                        ]
                    ]
                );
            }

            return redirect()
                ->back()
                ->with('mesaj',$product->name.' Səbətə əlavə edildi')
                ->with('type','success');
        }


        return redirect()
            ->back()
            ->with('mesaj','Nəticə tapılmadı!')
            ->with('type','warning');
    }

    public function removeFromCartById($product_id)
    {
        $product=Product::findOrFail($product_id);
        foreach (Cart::content() as $cart) {
            if($cart->id==$product_id) {
                Cart::remove($cart->rowId);
            }
        }

        return redirect()
            ->back()
            ->with('mesaj',' Səbətdən çıxarıldı')
            ->with('type','success');
    }

}
