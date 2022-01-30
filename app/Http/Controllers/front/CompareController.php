<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompareController extends Controller
{
    public function addToCompare()
    {
        $product_id=request('product');
        $product=Product::find($product_id);
        $compareProducts=session('compareProducts');
        if($product->count()>0) {
            $data=[
                'id'=>$product->id,
                'name'=>$product->name,
                'slug'=>$product->slug,
                'photo'=>$product->parentPhoto()->photo,
                'price'=>$product->discount==1 ? $product->discount_price : $product->price,
                'description'=>$product->description,
                'stock_count'=>$product->stock_count
            ];

            if($compareProducts=='') {
                Session::put('compareProducts',[
                    $product->id=>$data
                ]);
                $compareProducts=session('compareProducts');
                $countCompare=count($compareProducts);
                return ['msj'=>1,'name'=>$product->name,'count'=>$countCompare];

            }

            if(is_array($compareProducts) and count($compareProducts)<3) {
                if(!array_key_exists($product->id,$compareProducts)) {
                    $result=$compareProducts+[$product->id=>$data];
                    Session::put('compareProducts',$result);
                    $countCompare=count($result);
                    return ['msj'=>1,'name'=>$product->name,'count'=>$countCompare];
                } else {
                    return ['msj'=>2,'name'=>$product->name,];
                }

            }


            return ['msj'=>3];

        }

        return ['msj'=>0];
    }

    public function removeFromCompare()
    {
        $product_id=request('product');
        $data=session('compareProducts');

        if (array_key_exists($product_id,$data)) {
            Session::forget($product_id);
            unset($data[$product_id]);
            Session::put('compareProducts',$data);
            $countCompare=count($data);
            return ['msj'=>1,'count'=>$countCompare];
        }


        return ['msj'=>0];
    }


    public function index()
    {
        $title='Müqayisə';
        $crumbs=[
            'Müqayisə'=>route('compare')
        ];
        $compareProducts=session('compareProducts');
        $basketItem=basketItem();

        $newCompareProducts=[];
        if(is_array($compareProducts) and count($compareProducts)>0) {
            foreach ($compareProducts as  $compare)
            {
                $newCompareProducts[]=[

                        'id'=>$compare['id'],
                        'name'=>$compare['name'],
                        'slug'=>$compare['slug'],
                        'photo'=>$compare['photo'],
                        'price'=>$compare['price'],
                        'description'=>$compare['description'],
                        'stock_count'=>$compare['stock_count']

                ];
            }
        }
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.compare',compact('title','crumbs','newCompareProducts','basketItem','desktopCategory','mobileCategory'));

    }

    public function removeFromCompareById($id)
    {
        $data=session('compareProducts');

        if (array_key_exists($id,$data)) {
            Session::forget($id);
            unset($data[$id]);
            Session::put('compareProducts',$data);

            return redirect()
                ->route('compare')
                ->with('mesaj','Müqayisə siyahısından çıxarıldı')
                ->with('type','success');

        }

        return redirect()
            ->route('compare')
            ->with('mesaj','Müqayisə siyahısında belə bir məhsul yoxdur!')
            ->with('type','warning');

    }
}
