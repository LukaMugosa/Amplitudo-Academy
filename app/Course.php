<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->belongsToMany('App\Comment')->withTimestamps();
    }
    public function ratings(){
        return $this->hasMany('App\Rating');
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
