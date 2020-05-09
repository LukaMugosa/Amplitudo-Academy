<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MentorsStudentController extends Controller
{
    public function index(){
        $users = User::getAllMentorsForStudents();
        $i = 0;
//        dd($users);
        return view('users.students.mymentors')->with([
            'users' => $users,
            'i' => $i
        ]);
    }
}
