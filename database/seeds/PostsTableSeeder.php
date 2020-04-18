<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::create([
            'title' => 'Post 1',
            'description' => 'This is desc of body',
            'body' => 'This is body of post 1',
            'user_id' => 1
        ]);
        \App\Post::create([
            'title' => 'Post 2',
            'description' => 'This is desc of body',
            'body' => 'This is body of post 2',
            'user_id' => 1
        ]);
        \App\Post::create([
            'title' => 'Post 3',
            'description' => 'This is desc of body',
            'body' => 'This is body of post 3',
            'user_id' => 1
        ]);
        \App\Post::create([
            'title' => 'Post 4',
            'description' => 'This is desc of body',
            'body' => 'This is body of post 4',
            'user_id' => 1
        ]);
        \App\Post::create([
            'title' => 'Post 5',
            'description' => 'This is desc of body',
            'body' => 'This is body of post 5',
            'user_id' => 1
        ]);
    }
}
