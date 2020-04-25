<?php

namespace App\Http\Controllers;

use App\Course;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $courses = Course::latest();
        return view('pages.index',compact('courses'));
    }
    public function posts(){
        $posts = Post::all();
        return view('pages.blog')->with('posts', $posts);
    }
    public function about(){
        return view('pages.about');
    }
}
