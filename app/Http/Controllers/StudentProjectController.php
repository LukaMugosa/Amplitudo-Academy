<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadProjects;
use App\Project;
use Illuminate\Http\Request;

class StudentProjectController extends Controller
{
    public function index(){
        $projectsToBeDone = Project::getAllUndoneProjects();
        $projects = [];
        $projectsList = [];
        foreach ($projectsToBeDone as $proj){
            $p = Project::find($proj->project_id);
            array_push($projects,$p);
        }
        for($i=0;$i<count($projects);$i++){
            $b = $projects[$i];
            $projectsList[] = $b;
        }
//        $assignments = AssignmentUser::all()->where('user_id','=',auth()->user()->id);
        return view('users.students.projects.index')->with([
            'projects' => $projects,
            'projectsList' => $projectsList
        ]);
    }

    public function store(UploadProjects $request){
        $user = auth()->user();
        $project = Project::find($request->project1);
        if($request->hasFile('project')){
            $fileNameWithExt = $request->file('project')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('project')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_'.time().'.'.$extension;
            $path = $request->file('project')->storeAs('public/project_files',$fileNameToStore);
        }else{
            return redirect('/my-projects')->with('error','Please upload your .zip or .rar file!');
        }
        $proj = $user->projects;
        $index = -1;
        for($i=0;$i<count($proj);$i++){
            if($proj[$i]->id === $project->id)
                $index = $i;
        }
        $user->projects[$index]->pivot->is_done = 1;
        $user->projects[$index]->pivot->file_name = $fileNameToStore;
        $user->projects[$index]->pivot->save();
        return redirect('/my-projects')->with('success','Project turned in successfully!');
    }

}
