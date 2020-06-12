<?php

use Illuminate\Database\Seeder;
use  App\role as role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $role = new role;
     $role->type = "admin";
     $role->save();

     $role = new role;
     $role->type = "user";
     $role->save();

    }
}
