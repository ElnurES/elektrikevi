<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\AdminOrderInfoMail;
use App\Mail\UserOrderInfoMail;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\City;
use App\Models\Order;
use App\Models\Region;
use App\User;
use App\Models\Street;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkoutForm()
    {
        $title='Sifarişin rəsmiləşdirilməsi';
        $crumbs=[
            'Sifarişin rəsmiləşdirilməsi'=>route('checkout')
        ];

        $user=User::with('detail')->where('id',auth()->id())->first();

        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.checkout',compact('title','crumbs','user','desktopCategory','mobileCategory'));
    }

    public function checkout()
    {
        $this->validate(request(),[
           'email'=>'required|email',
           'fullname'=>'required',
           'mobil'=>'required',
           'city'=>'required',
           'region'=>'required',
           'street'=>'required',
           'zip_code'=>'required',
           'payment-method'=>'required',
        ]);

        $paymentMethod=request('payment-method');
        if($paymentMethod==1) {
            DB::transaction(function () {
                $data=[];
                if(isset($_COOKIE['active_basket_id'])) {
                    $active_basket_id=$_COOKIE['active_basket_id'];
                } else {
                    $active_basket_id=null;
                }


                //$active_basket_id=session('active_basket_id');
                if(is_null($active_basket_id)) {
                    $active_baseket=Basket::create(['user_id'=>auth()->id()]);
                    $active_basket_id=$active_baseket->id;


                }

                if(Cart::count()>0) {
                    foreach (Cart::content() as $cartItem) {
                        BasketProduct::updateOrCreate(
                            ['basket_id'=>$active_basket_id,'product_id'=>$cartItem->id],
                            ['count'=>$cartItem->qty,'price'=>$cartItem->price,'status_id'=>3]
                        );
                    }
                }

                Cart::destroy();

                $order_total=str_replace(',','',Cart::total());
                $sub_total=str_replace(',','',Cart::subtotal());
                $city=City::firstOrCreate(['name'=>request('city')]);
                $region=Region::firstOrCreate(['name'=>request('region')]);
                $street=Street::firstOrCreate(['name'=>request('street')]);
                $data=[
                    'basket_id'=>$active_basket_id,
                    'order_total'=>$order_total,
                    'status_id'=>4,
                    'fullname'=>request('fullname'),
                    'adress'=>request('adress'),
                    'mobil'=>request('mobil'),
                    'zip_code'=>request('zip_code'),
                    'bank'=>'Kapital Bank',
                    'edv_total'=>Cart::tax(),
                    'email'=>request('email'),
                    'city_id'=>$city->id,
                    'region_id'=>$region->id,
                    'street_id'=>$street->id,
                    'sub_total'=>$sub_total
                ];

                $order = Order::create($data);
                Cart::destroy();
                setcookie("active_basket_id", "", time() - 3600);
                //session()->forget('active_basket_id');
                Mail::to($order->email)->send(new UserOrderInfoMail($order));
                Mail::to('info@elektrikevi.az')->send(new AdminOrderInfoMail($order));
            });
            return redirect()
                ->route('home')
                ->with('type','success')
                ->with('swal','Sifariş verildi');

        }

        return redirect()
            ->route('checkout')
            ->with('type','warning')
            ->with('swal','Təkrar cəhd edin');



    }
}