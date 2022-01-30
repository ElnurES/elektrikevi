<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Mail\UserActivationMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $crumbs=[
            'İstifadəçilər'=>route('admin.user')
        ];
        $title='İstifadəçi listi';
        $users=User::with('detail')->get();
        return view('back.user.index',compact('title','crumbs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crumbs=[
            'İstifadəçilər'=>route('admin.user'),
            'Yeni'=>route('admin.user.create')
        ];
        $title='Yeni İstifadəçi';
        return view('back.user.create',compact('crumbs','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'fullname'=>'required|min:5|max:55',
            'email'=>'required|email|unique:user',
            'password'=>'required|confirmed|min:5|max:15'
        ]);

        DB::transaction(function () {

            $user=User::create([
                'fullname'=>request('fullname'),
                'email'=>request('email'),
                'password'=>Hash::make(request('password')),
                'activation'=>Str::random(55),
                'is_active'=>0,
                'is_admin'=>request('is_admin')
            ]);

            $user->detail()->create([
                'address'=>request('address'),
                'mobil_1'=>request('mobil_1'),
                'mobil_2'=>request('mobil_2')
            ]);

            Mail::to(request('email'))->send(new UserActivationMail($user));
        });


        //auth()->login($user);

        return redirect()->route('admin.user.create')
            ->with('mesaj','İstifadəçi əlavə edildi')
            ->with('type','success');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::with('detail')->find($id);

        $crumbs=[
            'İstifadəçilər'=>route('admin.user'),
            $user->fullname=>route('admin.user.create')
        ];
        $title=$user->fullname;

  
        return view('back.user.edit',compact('user','crumbs','title'));
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
        $this->validate(request(),[
            'fullname'=>'required|min:5|max:55',
            'email'=>'required|email',
        ]);

        $data=[
            'fullname'=>$request->fullname,
            'is_admin'=>request('is_admin'),
            'email'=>$request->email
        ];

        if($request->password!='') {
            $data['password']=Hash::make($request->password);
        }
        $user=User::findOrFail($id);
        $user->update($data);

        $user->detail()->update([
            'address'=>$request->address,
            'mobil_1'=>$request->mobil_1,
            'mobil_2'=>$request->mobil_2
        ]);

        return redirect()
            ->route('admin.user.edit',$id)
            ->with('type','success')
            ->with('mesaj',$request->fullname.' adlı istifadəçini yenilədiniz');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()
            ->route('admin.user')
            ->with('type','success')
            ->with('mesaj','Silinmə tamamlandı');
    }
}