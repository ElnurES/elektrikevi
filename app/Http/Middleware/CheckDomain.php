<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CheckDomain
{
    public $domain;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // session()->start();
        //1ci indexin sessiona atilmasi biz onu domainolaraq nezerde tutmuwuq
        $segment=$request->segment(1);
        $domainKey=['kabel-mehsullari','isiqlandirma','muhafize-cihazlari','kabel-aksesuarlari','skaflar-qutular-aksesuarlar','elektrik-aletleri'];

        if(in_array($segment,$domainKey)) {
            switch ($segment) {
                case "kabel-mehsullari":
                    $this->domain=1;
                    break;
                case "isiqlandirma":
                    $this->domain=2;
                    break;
                case "muhafize-cihazlari":
                    $this->domain=3;
                    break;

                case "kabel-aksesuarlari":
                    $this->domain=4;
                    break;

                case "skaflar-qutular-aksesuarlar":
                    $this->domain=5;
                    break;

                case "elektrik-aletleri":
                    $this->domain=6;
                    break;
                default:
                    $this->domain=1;
            }
        } else {
            $this->domain=session('domain');
        }


        $lastDomain=session('domain');
        if($lastDomain!=$this->domain) {
            Session::put('domain', $this->domain);
            Cache::forget('categories');
        }


        return $next($request);
    }
}
