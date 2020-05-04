<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Http\Requests\AssignmentsRequest;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:assign_homework');
        $this->middleware('can:evaluate_homework');
        $this->middleware('can:view_homeworks');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index')->with('assignments',$assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AssignmentsRequest $request)
    {
        $assignment = new Assignment();
        $assignment->user_id = auth()->user()->id;
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->deadline =  substr($request->input('deadline'), 10).now();
        $assignment->save();
        return redirect('/assignments')->with('success','Assignment added successfully!');
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
