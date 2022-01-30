<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\PassordResetMail;
use App\Mail\UserActivationMail;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\PasswordReset;
use App\Models\UserDetail;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

//    public function __construct()
//    {
//       // $this->middleware('guest')->except(['logout','index','accountDetailChanges','accountChanges']);
//    }

    public function loginForm()
    {
        $title='Giriş';
        $crumbs=[
            'Giriş'=>route('login')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.auth.login',compact('crumbs','title','desktopCategory','mobileCategory'));
    }

    public function login()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $data=[
            'email'=>request('email'),
            'password'=>request('password'),
            'is_active'=>1
        ];

        if(Auth::guard('web')->attempt($data,request()->has('rememberme'))) {
            request()->session()->regenerate();


            $active_basket_id=Basket::active_basket_id();
            //dd($active_baseket_id);
            if(is_null($active_basket_id)) {
                $active_basket=Basket::create(['user_id'=>auth()->id()]);
                $active_basket_id=$active_basket->id;
            }
            //session()->put('active_basket_id',$active_basket_id);
            setcookie('active_basket_id', $active_basket_id, time() + (864000 * 30), "/");
            if(Cart::count()>0) {
                foreach (Cart::content() as $cartItem) {
                    BasketProduct::updateOrCreate(
                        ['basket_id'=>$active_basket_id,'product_id'=>$cartItem->id],
                        ['count'=>$cartItem->qty,'price'=>$cartItem->price,'status_id'=>6]
                    );
                }
            }

            Cart::destroy();

            $basketProducts=BasketProduct::with('product')->where('basket_id',$active_basket_id)->get();

            foreach ($basketProducts as $basketProduct) {
                Cart::add(
                    [
                        'id' => $basketProduct->product->id,
                        'name' => $basketProduct->product->name,
                        'qty' => 1,
                        'price' => $basketProduct->product->price,
                        'weight' => 0,
                        'options' => [
                            'slug' => $basketProduct->product->slug,
                            'photo'=>$basketProduct->product->parentPhoto()->photo
                        ]
                    ]
                );
            }

            return redirect()->back();
        } else {
            $errors=['email'=>'Xətalı giriş!'];
            return back()->withErrors($errors);
        }
    }


    public function registerForm()
    {
        $title='Qeydiyyat';
        $crumbs=[
            'Qeydiyyat'=>route('register')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.auth.register',compact('crumbs','title','desktopCategory','mobileCategory'));
    }

    public function register()
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
                'is_active'=>0
            ]);
            $user->detail()->save(new UserDetail());

            Mail::to(request('email'))->send(new UserActivationMail($user));
        });


        //auth()->login($user);

        return redirect()->route('register')
            ->with('mesaj','Qeyd olunan e-poçt ünvanına təstiq mesajı göndərildi')
            ->with('type','success');
    }

    public function activation($activation)
    {
        $user=User::where('activation',$activation)->firstOrFail();
        if(!is_null($user)) {
            $user->activation=null;
            $user->is_active=1;
            $user->email_verified_at=now();
            $user->save();
        }

        return redirect()
            ->route('login')
            ->with('mesaj','Profiliniz aktivləşdirildi')
            ->with('type','success');
    }

    public function resetPasswordForm()
    {
        $title='Şifrə Yeniləmə';
        $crumbs=[
            'Şifrə Yeniləmə'=>route('reset-password')
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();

        return view('front.auth.reset-password',compact('title','crumbs','desktopCategory','mobileCategory'));
    }

    public function resetPassword()
    {
        $email=request('email');
        PasswordReset::where('email',$email)->delete();
        $passwordReset=PasswordReset::create([
                           'email'=>$email,
                           'token'=>Str::random(55),
                            'created_at'=>now()
                        ]);

        Mail::to($email)->send(new PassordResetMail($passwordReset));
        return redirect()
            ->route('login')
            ->with('mesaj','Yeniləmə linki e-poçt ünvanınıza göndərildi')
            ->with('type','success');
    }


    public function resetPasswordTokenForm($token)
    {
        $title='Şifrəni bərpa et';
        $crumbs=[
            'Şifrəni bərpa et'=>route('reset-password-token',$token)
        ];
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.auth.reset-password-token',compact('title','crumbs','token','desktopCategory','mobileCategory'));
    }

    public function resetPasswordToken($token)
    {
        $this->validate(request(),[
            'password'=>'required|confirmed|min:5|max:15'
        ]);
        $reset=PasswordReset::with('user')->where('token',$token)->firstOrFail();

        if($reset->count()>0) {
            $reset->user()->update([
                'password'=>Hash::make(request('password'))
            ]);

            PasswordReset::where('token',$token)->delete();
            return redirect()
                ->route('login')
                ->with('mesaj','Şifrəniz bərpa edildi')
                ->with('type','success');
        } else {
            return redirect()
                ->route('reset-password-token',$token)
                ->with('mesaj','Belə bir istək tapılmadı')
                ->with('type','success');
        }
    }

    public function index()
    {
        $title='İstifadəçi Paneli';
        $crumbs=[
            'İstifadəçi Paneli'=>route('my-account')
        ];
        $user=auth()->user()->with('detail')->first();
        $orders=Order::with('basket')
            ->whereHas('basket',function ($query) {
                $query->where('user_id',auth()->id());
            })
            ->orderByDesc('created_at')
            ->get();
        $desktopCategory=view('front.layouts.include.header-one')->render();
        $mobileCategory=view('front.layouts.include.header-one-mobile')->render();
        return view('front.auth.my-account',compact('title','crumbs','user','orders','desktopCategory','mobileCategory'));
    }


    public function logout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('home');
    }


    public function accountDetailChanges()
    {
        $this->validate(request(),[
            'address'=>'required',
            'mobil_1'=>'required',
            'mobil_2'=>'required'
        ]);

        $user=User::findOrFail(request('user_id'));
        $user->detail()->update([
            'address'=>request('address'),
            'mobil_1'=>request('mobil_1'),
            'mobil_2'=>request('mobil_2')
        ]);

        return redirect()
            ->route('my-account')
            ->with('mesaj','Əlaqə məlumatları yeniləndi')
            ->with('type','success');
    }

    public function accountChanges()
    {
        $this->validate(request(),[
            'password'=>'required|confirmed|min:5|max:15'
        ]);
        $user_id=request('user_id');
        $current_pass=request('current_password');

        $user=User::findOrFail($user_id);

       // dd($user);
        if (Hash::check($current_pass,$user->password)) {
            $user->update([
                'password'=>Hash::make(request('password'))
            ]);

            return redirect()
                ->route('my-account')
                ->with('mesaj','Şifrəniz artıq dəyişmişdir.')
                ->with('type','success');

        }

        return redirect()
            ->route('my-account')
            ->with('mesaj','Belə bir istifadəçi tapılmadı!!!')
            ->with('type','danger');
    }




}
