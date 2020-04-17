<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create(['name' => 'ROLE_ADMIN']);
        \App\Role::create(['name' => 'ROLE_MENTOR']);
        \App\Role::create(['name' => 'ROLE_STUDENT']);
        \App\Role::create(['name' => 'ROLE_SUPERVISOR']);
        \App\Role::create(['name' => 'ROLE_GUEST']);
    }
}
