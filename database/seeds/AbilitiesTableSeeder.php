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
            'name' => 'create_posts'
        ]);
        \App\Ability::create([
            'name' => 'view_posts'
        ]);
        \App\Ability::create([
            'name' => 'comment_posts'
        ]);
        \App\Ability::create([
            'name' => 'like_posts'
        ]);
        \App\Ability::create([
            'name' => 'interact_with_users'
        ]);
        \App\Ability::create([
            'name' => 'assign_roles'
        ]);
        \App\Ability::create([
            'name' => 'view_students'
        ]);
        \App\Ability::create([
            'name' => 'assign_homework'
        ]);
        \App\Ability::create([
            'name' => 'evaluate_homework'
        ]);
        \App\Ability::create([
            'name' => 'assign_project'
        ]);
        \App\Ability::create([
            'name' => 'evaluate_project'
        ]);
        \App\Ability::create([
            'name' => 'evaluate_student'
        ]);
        \App\Ability::create([
            'name' => 'view_my_courses'
        ]);
        \App\Ability::create([
            'name' => 'view_mentors'
        ]);
        \App\Ability::create([
            'name' => 'evaluate_mentors'
        ]);
        \App\Ability::create([
            'name' => 'view_homeworks'
        ]);
        \App\Ability::create([
            'name' => 'do_homeworks'
        ]);
        \App\Ability::create([
            'name' => 'evaluate_course'
        ]);
        \App\Ability::create([
            'name' => 'ban_users'
        ]);
        \App\Ability::create([
            'name' => 'view_reports'
        ]);
        \App\Ability::create([
            'name' => 'view_ratings'
        ]);
        \App\Ability::create([
            'name' => 'add_courses'
        ]);
        \App\Ability::create([
            'name' => 'download_content'
        ]);
        \App\Ability::create([
            'name' => 'view_payments'
        ]);
    }
}
