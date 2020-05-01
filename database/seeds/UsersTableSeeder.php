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
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Ivana Djukic',
            'email' => 'ivana@test.com',
            'role_id' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Drazen Vuletic',
            'email' => 'drazen@test.com',
            'role_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Milos Ostojic',
            'email' => 'milos@test.com',
            'role_id' => 4,
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        \App\User::create([
            'name' => 'Andrija Musikic',
            'email' => 'andrija@test.com',
            'role_id' => 5,
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        factory(App\User::class,50)->create();
    }
}
