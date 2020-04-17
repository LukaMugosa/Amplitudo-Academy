<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Luka Mugosa',
            'email' => 'luka@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Ivana Djukic',
            'email' => 'ivana@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Drazen Vuletic',
            'email' => 'drazen@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Milos Ostojic',
            'email' => 'milos@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Andrija Musikic',
            'email' => 'andrija@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
    }
}
