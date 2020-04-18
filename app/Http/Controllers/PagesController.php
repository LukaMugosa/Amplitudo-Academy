<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function courses(){
        return view('pages.courses');
    }
    public function posts(){
        $posts = Post::all();
        return view('pages.blog')->with('posts', $posts);
    }
    public function about(){
        return view('pages.about');
    }
}
