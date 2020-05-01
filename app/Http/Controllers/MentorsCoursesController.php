<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class MentorsCoursesController extends Controller
{
    public function index(){
        $mentor_id = auth()->user()->id;
        $courses = Course::all()->where('mentor_id', '=', $mentor_id);
        return view('users.mycourses.index')->with('courses',$courses);
    }
}
