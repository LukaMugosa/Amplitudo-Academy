<?php

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Badge::create([
           'name' => 'Junior Frontend Developer'
        ]);
        App\Badge::create([
           'name' => 'Junior Backend Developer'
        ]);
        App\Badge::create([
           'name' => 'Fullstack Developer'
        ]);
        App\Badge::create([
           'name' => 'Software Engineer'
        ]);
        App\Badge::create([
           'name' => 'Senior Frontend Developer'
        ]);
        App\Badge::create([
           'name' => 'Senior Backend Developer'
        ]);
        App\Badge::create([
           'name' => 'React Developer'
        ]);
        App\Badge::create([
           'name' => 'Laravel Developer'
        ]);
        App\Badge::create([
           'name' => 'Data Scientist'
        ]);
        App\Badge::create([
           'name' => 'Database Manger'
        ]);
    }
}
