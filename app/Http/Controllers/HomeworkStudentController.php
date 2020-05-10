<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentUser;
use App\User;
use Illuminate\Http\Request;

class HomeworkStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:do_homeworks');
        $this->middleware('can:view_homeworks');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $assignmentsToBeDone = Assignment::getAllUndoneHomework();
        $assignments = [];
        foreach ($assignmentsToBeDone as $assign){
            $a = Assignment::find($assign->assignment_id);
            array_push($assignments,$a);
        }
//        $assignments = AssignmentUser::all()->where('user_id','=',auth()->user()->id);
        return view('users.students.homework.myhomework')->with('assignments',$assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user->id);
        $user->assignmentsManyToMany->pivot->is_done = 1;
        $user->assignmentsManyToMany->pivot->file = $request->get('file');
        return redirect('/homework')->with('success','Homework turned in successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
