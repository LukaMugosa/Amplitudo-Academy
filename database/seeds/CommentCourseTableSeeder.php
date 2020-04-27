<?php

use Illuminate\Database\Seeder;

class CommentCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Course::all()->each(function ($course){
            $course->comments()->attach(App\Comment::all()->random(3));
        });
    }
}
