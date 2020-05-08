<?php

use Illuminate\Database\Seeder;

class AbilityRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::all()->where('id','=', 1)->each(function ($role){
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'interact_with_users'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'edit_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'create_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'assign_roles'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'ban_users'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_ratings'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_reports'));
        });
        App\Role::all()->where('id','=', 2)->each(function ($role){
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_students'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'assign_homework'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_homework'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_homeworks'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'assign_project'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_project'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_student'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'edit_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_my_courses'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'comment_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'like_posts'));
        });
        App\Role::all()->where('id','=', 3)->each(function ($role){
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_my_courses'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_homeworks'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'do_homeworks'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'edit_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'create_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_course'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_mentors'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'comment_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'like_posts'));
        });
        App\Role::all()->where('id','=', 4)->each(function ($role){
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_students'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_mentors'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'edit_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'assign_project'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'create_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_project'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'evaluate_mentors'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'comment_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'like_posts'));
            $role->allowTo(App\Ability::all()->where('name' ,'=', 'view_reports'));
        });
    }
}
