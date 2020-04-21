<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function mentorOnCourses(){
        return \DB::select("SELECT * FROM users WHERE role_id=2");
    }
    public function studentsOnCourses(){
        return \DB::select("SELECT * FROM users WHERE role_id=3");
    }
    public function studentsOnThisCourse(){
        return \DB::select("SELECT * FROM course_user WHERE course_id={$this->id}");
    }
}
