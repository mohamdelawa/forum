<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\user_temp;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

   public  function register(){
        return view('auth.register');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\user_temp
     */
    protected function create(Request $request)
    {
        $rules =[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users|unique:user_temps',
            'password' => 'required|string|min:8',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

     user_temp::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'role_id' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_path' => "../../assets/images/users/1.jpg",
        ]);

       return redirect()->route('register')->with('success','Your request has been successfully submitted. Wait for your membership to be accepted Admin');
    }


}
