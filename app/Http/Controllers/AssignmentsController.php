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
//        $this->middleware('can:assign_homework');
//        $this->middleware('can:evaluate_homework');
        $this->middleware('can:view_homeworks');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $assignments = Assignment::all()->where('user_id','=',auth()->user()->id);
        return view('assignments.index')->with('assignments',$assignments);
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
        $assignment->deadline =  $request->input('deadline');
        $assignment->save();
        return redirect('/assignments')->with('success','Assignment added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        $returnHTML = view('assignments.modal-body-view',['assignment'=> $assignment])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $assignment = Assignment::find($id);
        $returnHTML = view('assignments.update-modal-form',['assignment'=> $assignment])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AssignmentsRequest $request, $id)
    {
        $assignment = Assignment::find($id);
        $assignment->user_id = auth()->user()->id;
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->deadline =  $request->input('deadline');
        $assignment->save();
        return redirect('/assignments')->with('success2','Assignment updated successfully!');
    }

}
