<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $crumbs=[];
        $title="";
        $route=[];
        //::domain()
        $product=Product::with('category','photo','feature')->where('slug',$slug)->firstOrFail();

        $crumbs=[
            'Bütün Kateqoriyalar'=>route('catalog')
        ];

        foreach ($product->category as $category) {
            if($product->category->last()->id!=$category->id) {
                $crumbs[$category->name]=route('category',$category->slug);
                array_push($route,$category->slug);
            } else {
                array_push($route,$category->slug);
                $crumbs[$category->name]=route('category',$route);
            }

        }

        $crumbs[$product->name]=$product->slug;
        $title=$product->name;

        $latestProducts=Product::domain()
            ->with('photo')
            ->where('is_active',1)
            ->orderBy('updated_at','Desc')
            ->take(10)
            ->get();

        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');

        return view('front.product-detail',compact('product','crumbs','title','latestProducts','desktopCategory','mobileCategory','basketItem','wishlistItem','compareItem'));
    }


    public function search()
    {
        $search=request()->query('search');
        $crumbs=[];
        $title="";
        $route=[];
        //::domain()
        $product=Product::with('category','photo')
            ->where('name','LIKE',"%$search%")
            ->orWhere('slug','LIKE',"%$search%")
            ->orWhere('description','LIKE',"%$search%")
            ->orWhere('price','LIKE',"%$search%")
            ->where('is_active',1)
            ->first();

        $latestProducts = Product::domain()
            ->with('photo')
            ->where('is_active', 1)
            ->orderBy('updated_at', 'Desc')
            ->take(10)
            ->get();
        $desktopCategory = view('front.layouts.include.header-one')->render();
        $mobileCategory = view('front.layouts.include.header-one-mobile')->render();
        $crumbs = [
            'Bütün Kateqoriyalar' => route('catalog')
        ];
        if(!is_null($product)) {

            foreach ($product->category as $category) {
                if ($product->category->last()->id != $category->id) {
                    $crumbs[$category->name] = route('category', $category->slug);
                    array_push($route, $category->slug);
                } else {
                    array_push($route, $category->slug);
                    $crumbs[$category->name] = route('category', $route);
                }

            }

            $crumbs[$product->name] = $product->slug;
            $title = $product->name;


        } else {

            $crumbs['404'] = 'Belə bir məhsul tapılmadı';
            $title = 'Belə bir məhsul tapılmadı';
        }

        $basketItem=basketItem();
        $wishlistItem=session('wishlistProducts');
        $compareItem=session('compareProducts');
        return view('front.product-detail', compact('product', 'crumbs', 'title', 'latestProducts', 'desktopCategory', 'mobileCategory','basketItem','wishlistItem','compareItem'));

    }
}
