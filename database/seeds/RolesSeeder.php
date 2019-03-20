<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = [
            'super-delete' => true,
            'super-add' => true,
            'super-update' => true,
            'super-view' => true,
        ];

        $agent_permissions = [
            'client-delete' => true,
            'client-add' => true,
            'client-update' => true,
            'client-view' => true,
        ];

        $employee_permissions = [
            'employee-delete' => true,
            'employee-add' => true,
            'employee-update' => true,
            'employee-view' => true,
        ];


        $super_user = Role::create([
            'name' => 'app-admin',
            'display_name'=>'App Admin',
            'permissions' =>$super_admin,
            'guard_name'=>'web'
        ]);

        $agent = Role::create([
            'name' => 'client',
            'display_name'=>'Client',
            'permissions' =>$agent_permissions,
            'guard_name'=>'web'
        ]);

        $employee = Role::create([
            'name' => 'employee',
            'display_name'=>'Employee',
            'permissions' =>$employee_permissions,
            'guard_name'=>'web'
        ]);

    }
}
