<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class StudentProjectController extends Controller
{
    public function index(){
        $projectsToBeDone = Project::getAllUndoneProjects();
        $projects = [];
        foreach ($projectsToBeDone as $proj){
            $p = Project::find($proj->project_id);
            array_push($projects,$p);
        }
//        $assignments = AssignmentUser::all()->where('user_id','=',auth()->user()->id);
        return view('users.students.projects.index')->with('projects',$projects);
    }
}
