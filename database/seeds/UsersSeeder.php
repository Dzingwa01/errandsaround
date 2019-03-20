<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = \Illuminate\Support\Facades\Hash::make('secret');
        $verification_time = \Carbon\Carbon::now();
        $address = "7 Catriona Humewood, Port Elizabeth";
        $super = User::create(['name'=>'App Admin','surname'=>'User','address'=>$address,'email'=>'admin@errandsaround.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $super_role = Role::where('name','app-admin')->first();
        $super->roles()->attach($super_role->id);

//        $location = \App\Location::where('location_name','Fort Hare')->first();
        $clerk = User::create(['name'=>'Client','surname'=>'User','address'=>$address,'email'=>'client@errandsaround.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $agent_role = Role::where('name','client')->first();
        $clerk->roles()->attach($agent_role->id);
    }
}
