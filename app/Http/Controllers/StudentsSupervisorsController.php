<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StudentsSupervisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::getAllStudentsForSupervisor();
        return view('users.supervisors.')->with('users',$users);
    }
}
