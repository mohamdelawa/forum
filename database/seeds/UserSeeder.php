<?php

use Illuminate\Database\Seeder;
use App\user;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = new user();
        $user->name = 'Mohammed';
        $user->phone = '0597485314';
        $user->dob = '2000-4-14';
        $user->email = 'admin@admin.com';
        $user->password =Hash::make('adminadmin');
        $user->role_id = '1';
        $user->image_path = '../../assets/images/users/1.jpg'  ;
        $user->save();

        $user = new user();
        $user->name = 'omer';
        $user->phone = '0597485201';
        $user->dob = '1988-4-14';
        $user->email = 'user@user.com';
        $user->password =Hash::make('useruser');
        $user->role_id = '2';
        $user->image_path = '../../assets/images/users/1.jpg'  ;
        $user->save();

        factory('App\user',20)->create();
        factory('App\user_temp',20)->create();


    }
}
