<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //kategoriyalarin kewden oxunub front papqasina gonderilmesi view composer ile etdik
        View::composer(['front.layouts.include.header-one','front.layouts.include.header-one-mobile','front.render.filter','front.catalog','front.category','front.domain'],function ($view) {
            //Kategoriyalarin kewe atilmasi
            $time=now()->addMinutes(30);
            $categories=Cache::remember('categories',$time, function () {
                    return [
                        'categories'=>Category::domain()
                            ->with('product.photo')
                            ->with('child')
                            ->where('parent_id',0)
                            ->get()
                    ];
            });
            $view->with('categories',$categories);
        });


        //mezennelerin cbar.az saytindan cekilib kewe atilmasi
        View::composer(['front.layouts.include.header-two'],function ($view) {
            //Mezennelerin kewe atilmasi
            $time=now()->addMinutes(3000);

            $currencys=Cache::remember('currencys',$time, function () {

                $url = "https://www.cbar.az/currencies/".date('d.m.Y').".xml";
                $xml = simplexml_load_file($url,"SimpleXMLElement",LIBXML_NOCDATA);
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);

                $mezenne=['USD','EUR','TRY','BYN'];
                $mList=[];

                foreach ($array['ValType'][1]['Valute'] as $key) {
                    if(in_array($key['@attributes']['Code'],$mezenne)) {
                        if($key['@attributes']['Code']=='USD') {
                            $mList[$key['@attributes']['Code']]=$key['Value'].'000';
                        } else {
                            $mList[$key['@attributes']['Code']]=$key['Value'];
                        }

                    }
                }
                return [
                    'currencys'=>$mList
                ];
            });
            $view->with('currencys',$currencys);
        });

        View::composer(['front.layouts.include.header-two'],function ($view) {
            $wishlistItem = session('wishlistProducts');
            $compareItem = session('compareProducts');
            if (is_array($wishlistItem)) {
                $wishlistCount = count($wishlistItem);
            } else {
                $wishlistCount = 0;
            }

            if (is_array($compareItem)) {
                $compareCount = count($compareItem);
            } else {
                $compareCount = 0;
            }

            $view->with(
                [
                    'wishlistCount'=>$wishlistCount,
                    'compareCount'=>$compareCount
                ]
            );

        });

        View::composer(['front.layouts.include.header-two','front.layouts.master','front.order.invoice','front.pdf.user-invoice'],function ($view) {
            $time=now()->addMinutes(3000);

            $config=Cache::remember('config',$time, function () {
                $config=Config::first();
                return $config;
            });

            $view->with('config',$config);
        });

    }
}
