<?php

use Illuminate\Database\Seeder;

class BadgeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->where('role_id','=','3')->each(function ($user){
           $user->badges()->attach(App\Badge::all()->random(3));
        });
    }
}
