<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\user;
use App\user_temp;
use Illuminate\Support\Facades\Gate;

class UserTempController extends Controller
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
        $users =user_temp::all()->where('role_id','=', 2);

        return view('admin.user_requests',compact('users'));
    }


    /**
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->authorizaion();
        $user_temp = user_temp::find($id);
        $user = new user();
        $user->name = $user_temp->name;
        $user->phone = $user_temp->phone;
        $user->dob = $user_temp->dob;
        $user->email = $user_temp->email;
        $user->password = $user_temp->password;
        $user->role_id =  $user_temp->role_id;
        $user->image_path = $user_temp->image_path  ;
        $user->save();
        user_temp::find($id)->delete();
        return redirect()->route('user_requests')->with('success','The user was added successfully!');
    }

    /**
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->authorizaion();
        user_temp::find($id)->delete();
        return redirect()->route('user_requests')->with('success','The user was deleted successfully!');
    }
}
