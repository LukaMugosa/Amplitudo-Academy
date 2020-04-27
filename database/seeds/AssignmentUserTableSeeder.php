<?php

use Illuminate\Database\Seeder;

class AssignmentUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->where('role_id','=','3')->each(function ($user){
            $user->assignmentsManyToMany()->attach(App\Assignment::all()->random(3));
        });
    }
}
