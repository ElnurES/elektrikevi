<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribe;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $crumbs=[];
        $title='Əsas Səhifə';

        $products=Product::all();
        $contacts=Contact::all();
        $users=User::all();
        $subscribes=Subscribe::all();
        $orders=Order::all();
        return view('back.index',compact('crumbs','title','products','contacts','users','subscribes','orders'));
    }
}
