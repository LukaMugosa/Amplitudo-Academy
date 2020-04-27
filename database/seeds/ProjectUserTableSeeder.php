<?php

use Illuminate\Database\Seeder;

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->where('role_id','=',3)->each(function ($user){
           $user->projects()->attach(App\Project::all()->random(3));
        });
    }
}
