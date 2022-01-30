<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with('city')
            ->with('region')
            ->with('street')
            ->with('status')
            ->get();

        $crumbs=[
            'Sifariş'=>route('admin.order'),
        ];
        $title='Sifariş listi';
        $status=Status::all();
        return view('back.order.index',compact('orders','title','crumbs','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($basketId)
    {
        $products=BasketProduct::with('product')->where('basket_id',$basketId)->get();

        $crumbs=[
            'Sifariş'=>route('admin.order'),
            'Məhsullar'=>route('admin.order'),
        ];
        $title='Sifariş edilənlər';

       // dd($products);
        return view('back.order.show',compact('products','title','crumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
