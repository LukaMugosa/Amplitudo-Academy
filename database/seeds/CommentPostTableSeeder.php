<?php

use Illuminate\Database\Seeder;

class CommentPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::all()->each(function ($post){
           $post->comments()->attach(App\Comment::all()->random(3));
        });
    }
}
