<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:assign_project')->except('show');
        $this->middleware('can:evaluate_project')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::all()->where('user_id','=',auth()->user()->id);
        return view('projects.index')->with('projects',$projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProjectsRequest $request)
    {
        $project = new Project();
        $project->user_id = auth()->user()->id;
        $project->title = $request->input('title');
        $project->project_description = $request->input('project_description');
        $project->deadline =  $request->input('deadline');
        $project->save();
        User::all()->where('role_id','=','3')->each(function ($user) use ($project) {
            $user->projects()->attach($project);
        });
        return redirect('/projects')->with('success','Project added successfully!');
}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function show($id)
    {
        $project = Project::find($id);
        $returnHTML = view('projects.modal-body-view',['project'=> $project])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $returnHTML = view('projects.update-modal-form',['project'=> $project])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProjectsRequest $request, $id)
    {
        $project = Project::find($id);
        $project->user_id = auth()->user()->id;
        $project->title = $request->input('title');
        $project->project_description = $request->input('project_description');
        $project->deadline =  $request->input('deadline');
        $project->save();
        return redirect('/projects')->with('success','Project updated successfully!');
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
