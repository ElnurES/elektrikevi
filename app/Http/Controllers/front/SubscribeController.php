<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\SubscribeNotficationMail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'email'=>'required|email|unique:subscribe'
        ]);

        if(!$validator->fails()) {
            $subscribe=Subscribe::create([
                'email'=>request('email'),
                'created_at'=>now(),
                'is_active'=>0
            ]);

            Mail::to($subscribe->email)->send(new SubscribeNotficationMail($subscribe));
            return redirect()
                ->back()
                ->with('swal','Abunə olundunuz')
                ->with('type','success');
        }

        return redirect()
            ->back()
            ->with('swal','Daha öncədən abunə olunub')
            ->with('type','info');


    }
}
