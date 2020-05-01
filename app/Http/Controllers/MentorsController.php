<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('can:view_mentors');
//        $this->middleware('can:evaluate_mentors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::getAllMentors();
        return view('users.mentors.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.mentors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();
        return response()->json($user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $mentor = User::find($id);
        return view('users.mentors.edit')->with('mentor',$mentor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return view('users.mentors.index')->with('success','Mentor updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function destroy(User $user)
    {
        $user->delete();
        return view('users.mentors.index')->with('success','User deleted!');
    }
}
