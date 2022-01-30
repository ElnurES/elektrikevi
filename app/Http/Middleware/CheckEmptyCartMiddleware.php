<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckEmptyCartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cartCount=Cart::count();
        if($cartCount==0) {
            return redirect()
                ->intended('/')
                ->with('type','info')
                ->with('swal','Sifariş üçün səbətdə məhsul tapılmadı');
        }
        return $next($request);
    }
}
