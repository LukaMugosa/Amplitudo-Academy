<?php

use Illuminate\Database\Seeder;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->where('role_id' ,'=',3)->each(function ($user){
            $user->courses()->attach(App\Course::all()->random(10));
        });
    }
}
