<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($parentSlug,$childSlug='')
    {
        $crumbs=[];
        $title="";
        $count=9;
        $min=0;
        $max=5000;
        if($childSlug=='') {
            $category=Category::with('product')->where('slug',$parentSlug)->firstOrFail();

            $crumbs=[
                'Bütün Kateqoriyalar'=>route('catalog'),
                $category->name=>route('category',$category->slug)
            ];

            $title=$category->name;
        }

        if($childSlug!='') {
            $category=Category::domain()->with('product')->where('slug',$childSlug)->firstOrFail();

            $crumbs=[
                'Bütün Kateqoriyalar'=>route('catalog'),
                $category->parent->name=>route('category',[$category->parent->slug]),
                $category->name=>route('category',$category->slug)
            ];
            $title=$category->name;
        }


        $order=request()->query('order');
        if(request()->has('price')) {
            $price=request()->query('price');
            $min=explode('-',$price)[0];
            $max=explode('-',$price)[1];
        }

        if(request()->has('show')) {
            $count=request()->query('show');
        }


        if ($order == 'id_asc_to_desc') {
            //dump('id_asc_to_desc');
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('id')
                ->paginate($count);
        } elseif ($order=='price_asc_to_desc') {
            //dump('price_asc_to_desc');
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('price','Asc')
                ->paginate($count);
        } elseif ($order=='price_desc_to_asc') {
           // dump('price_desc_to_asc');
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('price','Desc')
                ->paginate($count);
        } elseif ($order=='name_asc_to_desc') {
            //dump('name_asc_to_desc');
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('name','Asc')
                ->paginate($count);
        } elseif ($order=='name_desc_to_asc') {
            //dump('name_desc_to_asc');
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('name','Desc')
                ->paginate($count);
        } else {
            //dump('1');
            $products = $category->product()
                ->distinct()
                ->paginate($count);
        }

        $filter=[
            $order,
            $count
        ];

        //dd($products);
        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.category',compact('category','crumbs','products','filter','title','basketItem','desktopCategory','mobileCategory','wishlistItem','compareItem'));
    }


    public function filterBy()
    {
        //$previous = url()->previous();
        $order = request('order');
        $count = request('count');
        $price=request('price');
        $min=explode('-',$price)[0];
        $max=explode('-',$price)[1];
        $slug=request('slug');
//        $previous = explode('/', $previous);
//        if (isset($previous[6])) {
//            $previous = $previous[6];
//        } else {
//            $previous = $previous[5];
//        }
        //$slug = explode('?', $previous)[0];

        $category = Category::domain()->where('slug', $slug)->firstOrFail();

        if ($order == 'id_asc_to_desc') {
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('id')
                ->paginate($count);
        } elseif ($order=='price_asc_to_desc') {
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('price','Asc')
                ->paginate($count);
        } elseif ($order=='price_desc_to_asc') {
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('price','Desc')
                ->paginate($count);
            //return $count.$min.$max;
        } elseif ($order=='name_asc_to_desc') {
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('name','Asc')
                ->paginate($count);
        } elseif ($order=='name_desc_to_asc') {
            $products = $category->product()
                ->distinct()
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->orderBy('name','Desc')
                ->paginate($count);
        } else {
            $products = $category->product()
                ->distinct()
                ->paginate($count);
        }

        $filter=[
            $order,
            $count
        ];

        $basketItem=basketItem();
        $returnHTML = view('front.render.filter',compact('products','category','filter','basketItem'))->render();

       // return $products);
        $data=[
            'html'=>$returnHTML,
            'min'=>$products->min('price'),
            'max'=>$products->max('price')
        ];
        return $data;
        return response()->json( $data);

    }


    public function catalog()
    {
        $title='Kataloq';
        $crumbs=[
            'Bütün Kateqoriyalar'=>route('catalog')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.catalog',compact('title','crumbs','desktopCategory','mobileCategory'));
    }


}
