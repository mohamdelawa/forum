<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $session_id = Session::get('session_user')->id;
        if($session_id != $request->id){
            return redirect()->route('403');
        }
        $user = user::find($request->id);
        if($request->image_path  != null){
            $file = $request->file('image_path');
            $filename = time().'.'.$file->extension();
            $file->move('image_users',$filename);

            $user->image_path ="../../image_users/".$filename;
            $user->save();
            Session::put('session_user',$user);
            return redirect()->route('my_profile',['id'=>$request->id])->with('success','Update My Image Success!');
        }
        return redirect()->route('my_profile',['id'=>$request->id])->with('error','You did not enter the image!');
    }

    /**
     * @param  int  $id
     */
    public function show($id)
    {
        $session_id = Session::get('session_user')->id;
        if($session_id != $id){
            return redirect()->route('403');
        }

       $user = user::find($id);

        return  view('user.my_profile',compact('user'));
    }

    /**
     * @param  int  $id
     */
    public function visit_user($id)
    {
        $user = user::find($id);

        return  view('user.visit_user',compact('user'));
    }




    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id){
        $session_id = Session::get('session_user')->id;
        if($session_id != $id){
            return redirect()->route('403');
        }
        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'dob' => 'required|date',


        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
       $user = user::find($id);
       $user->name = $request->name;
       $user->phone = $request->phone;
       $user->dob = $request->dob;
       if($request->password_new != null) {
           $user->password =Hash::make($request->password_new);

       }
       $user->save();
        Session::put('session_user',$user);
       return redirect()->route('my_profile',['id'=>$id])->with('success','The my profile was update successfully!');

    }




}
