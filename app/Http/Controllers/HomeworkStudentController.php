<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $assignmentsList = [];
        foreach ($assignmentsToBeDone as $assign){
            $a = Assignment::find($assign->assignment_id);
            array_push($assignments,$a);
        }
        for($i=0;$i<count($assignments);$i++){
            $b = $assignments[$i];
            $assignmentsList[] = $b;
        }
        return view('users.students.homework.myhomework')->with([
            'assignments' => $assignments,
            'assignmentsList' => $assignmentsList
        ]);
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
        $user = auth()->user();
        $assignment = Assignment::find($request->homework1);
//        dd($assignment->id);
        if($request->hasFile('homework')){
            $fileNameWithExt = $request->file('homework')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('homework')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_'.time().'.'.$extension;
            $path = $request->file('homework')->storeAs('public/homework_files',$fileNameToStore);
        }else{
            return redirect('/homework')->with('error','Please upload your .zip or .rar file!');
        }
        $ass = $user->assignmentsManyToMany;
        $index = -1;
        for($i=0;$i<count($ass);$i++){
            if($ass[$i]->id === $assignment->id)
                $index = $i;
        }
        $user->assignmentsManyToMany[$index]->pivot->is_done = 1;
        $user->assignmentsManyToMany[$index]->pivot->file_name = $fileNameToStore;
        $user->assignmentsManyToMany[$index]->pivot->save();
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
