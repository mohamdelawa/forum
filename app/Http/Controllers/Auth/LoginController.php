<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\user;
use App\user_temp;
use http\Cookie;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $login =['email'=> $request->email , 'password'=>$request->password];
        if(Auth::attempt($login)) {
            $user = Auth::user();
            Session::put('session_user',$user);
            \Illuminate\Support\Facades\Cookie::queue('fourm post',60*60*24*3);

            return redirect()->route('dashboard');
        }
        $user =user_temp::all()->where('email','=',$request->email)->first();
        if ($user != null){
            return redirect()->route('login')->with('error','Your membership is not accepted. Wait for it to be accepted before Admin');
        }
        return redirect()->route('login')->with('error','Login fails, please try again');
    }

    public  function  logout(){
        if (Auth::check()){

            Auth::logout();
        }
        return redirect()->route('login');
    }
}
