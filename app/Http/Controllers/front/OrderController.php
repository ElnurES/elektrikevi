<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    public function detail($id)
    {
        $title='Sifariş Xülasəsi';
        $crumbs=[
            'İstifadəçi Paneli'=>route('my-account'),
            'Sifariş Xülasəsi'=>route('my-account')
        ];

        $order=Order::with('basket.basket_products.product')
            ->whereHas('basket',function ($query) {
                $query->where('user_id',auth()->id());
            })
            ->where('order.id',$id)
            ->firstOrFail();
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.order.detail',compact('order','title','crumbs','desktopCategory','mobileCategory'));
    }

    public function invoice($id)
    {
        $title='Hesab Faktura';
        $crumbs=[
            'İstifadəçi Paneli'=>route('my-account'),
            'Hesab Faktura'=>route('my-account')
        ];

        $order=Order::with('basket.basket_products.product')
            ->with('city')
            ->with('region')
            ->with('street')
            ->whereHas('basket',function ($query) {
                $query->where('user_id',auth()->id());
            })
            ->where('order.id',$id)
            ->firstOrFail();
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.order.invoice',compact('title','crumbs','order','desktopCategory','mobileCategory'));
    }

    public function invoiceGeneratePdf($id)
    {
        $order=Order::with('basket.basket_products.product')
            ->with('city')
            ->with('region')
            ->with('street')
            ->whereHas('basket',function ($query) {
                $query->where('user_id',auth()->id());
            })
            ->where('order.id',$id)
            ->firstOrFail();

        $pdf = PDF::loadView('front.pdf.user-invoice', compact('order'));

        return $pdf->download($order->id.'.pdf');
    }
}
