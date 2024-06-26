<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('account_super_admin')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            // if (auth()->user()->role_id == 7 || auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            //     return redirect('/dashboard');
            // // }elseif(auth()->user()->role_id == 6){
            // //     return redirect()->route('home');
            // }else{
            //     return redirect('/');
            // }
            return redirect('/dashboard');

        }elseif(Auth::guard('user')->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            return redirect('/dashboard');

        }elseif(Auth::guard('account_admin_gudep')->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            return redirect('/dashboard');

        }elseif(Auth::guard('account_penguji_gudep')->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            return redirect('/dashboard');

        }elseif(Auth::guard('peserta_didik_gudep')->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            return redirect('/dashboard');

        }else{
            return redirect()->route('login')
                ->with('error','Email dan Kata Sandi yang Anda Masukkan Salah!');
        }

    }
}
