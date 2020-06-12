<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request){
       $validation = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       $login = [
           'email' => $request->email,
           'password' => $request->password,
       ];
       if(Auth::attempt($login)){
          $user = Auth::user();
           $token = $user->createToken('Token Name')->accessToken;
           return response([
               'status' => 'succees',
               'token' => $token,
           ]);
       }else{
           return response([
               'status' => 'error',
               'massage' => 'Auth fails'
           ]);
       }

    }


}
