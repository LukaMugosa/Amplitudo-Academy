<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorRequest;
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
        $usersList = User::all()->where('role_id','=','4')->pluck('name','id');
        return view('users.mentors.create')->with('usersList',$usersList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MentorRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password1'));
        $user->role_id = '2';
        $user->supervisor_id = $request->get('supervisor_id');
        $user->save();
        return redirect('/mentors/create')->with('success', 'Mentor added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $usersList = User::all()->where('role_id','=','4')->pluck('name','id');
        return view('users.mentors.edit')->with([
            'user' => $user,
            'usersList' => $usersList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|void
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password1'));
        $user->save();
        return redirect('mentors/')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|void
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/mentors')->with('success','User deleted!');
    }
}
