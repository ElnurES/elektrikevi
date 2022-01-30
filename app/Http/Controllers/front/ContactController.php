<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\ContactNotficationMailForAdmin;
use App\Models\Config;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $title='Əlaqə';
        $crumbs=[
            'Əlaqə'=>route('contact')
        ];

        $time=now()->addMinutes(3000);

        $config=Cache::remember('config',$time, function () {
            $config=Config::first();
            return $config;
        });

        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        $bImage='/elnur/img/Contact.jpg';
        return view('front.contact',compact('title','crumbs','desktopCategory','mobileCategory','config','bImage'));
    }


    public  function store()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'fullname'=>'required',
            'message'=>'required|min:15|max:300'
        ]);

        DB::transaction(function () {

            $contact=Contact::create(request()->all());

            Mail::to('admin@mail.ru')->send(new ContactNotficationMailForAdmin($contact));
        });

        return redirect()
            ->route('contact')
            ->with('mesaj','Mesaj göndərildi')
            ->with('type','success');
    }
}
