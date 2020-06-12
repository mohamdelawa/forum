<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\role;
use App\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
public function authorizaion()
{
    if(Gate::denies('pages_admin')){
        return redirect()->route('403');
    }
}

    public function index()
    {
        $this->authorizaion();
        $users = user::all()->where('role_id','=', 2);
        return view('admin.all_user',compact('users'));
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->authorizaion();
        $rules =[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users|unique:user_temps',
            'password' => 'required|string|min:8',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
            'role' => 'required'
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user = new user();
        $user->name = $request->name ;
        $user->phone = $request->phone ;
        $user->dob = $request->dob ;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->role_id =  role::all()->where('type','=', $request->role)->pluck('id')[0];
        $user->image_path = '../../assets/images/users/1.jpg';
        $user->save();
        return redirect()->route('all_user')->with('success','The user was added successfully!');
    }

    /**
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->authorizaion();
        $user = user::find($id);

        return  view('admin.user_profile',compact('user'));
    }

    /**
     * @param  int  $id
     */
    public function show($id)
    {
        $this->authorizaion();
        $user = user::find($id);

        return  view('admin.visit_user',compact('user'));
    }

     /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $this->authorizaion();
        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
            'role' => 'required|string'
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $user = user::find($id);
        $user->name = $request->name ;
        $user->phone = $request->phone ;
        $user->dob = $request->dob ;
        $role= role::all()->where('type','=',$request->role)->first();
        $user->role_id = $role->id;
        if($request->password_new !=null) {
            $user->password = Hash::make($request->password_new);
        }
        $user->role_id =  role::all()->where('type','=', $request->role)->pluck('id')[0];
        $user->save();
        return redirect()->back()->with('success','User data  has been successfully updated!');
    }

    /**
     * @param  int  $id
    */
    public function destroy($id)
    {
        $this->authorizaion();
        user::find($id)->delete();
        return redirect()->route('all_user');
    }
}


