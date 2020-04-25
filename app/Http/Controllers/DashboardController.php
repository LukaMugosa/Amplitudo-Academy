<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = count(User::getAllStudents());
        $mentors = count(User::getAllMentors());
        $supervisors = count(User::getAllSupervisors());
        return view('dashboards.dashboard',compact('students','mentors','supervisors'));
    }
}
