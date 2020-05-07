<?php

use Illuminate\Database\Seeder;

class UpdateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function ($user){
            $flag = true;
            if($user->isAdmin() || $user->isSupervisor() || $user->isGuest())
                $user->supervisor_id = null;
            else
                $user->supervisor_id = 4;
            $user->save();
        });
    }
}
