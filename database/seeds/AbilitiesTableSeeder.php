<?php

use Illuminate\Database\Seeder;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ability::create([
            'name' => 'edit_posts'
        ]);
        \App\Ability::create([
            'name' => 'update_posts'
        ]);
        \App\Ability::create([
            'name' => 'create_posts'
        ]);
        \App\Ability::create([
            'name' => 'view_users'
        ]);
        \App\Ability::create([
            'name' => 'update_users'
        ]);
    }
}
