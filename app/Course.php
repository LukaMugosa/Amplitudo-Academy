<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Course extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable =['mentor_id','title','about_course','description','price'];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo('App\User','mentor_id');
    }
    public function comments(){
        return $this->belongsToMany('App\Comment')->withTimestamps();
    }
    public function ratings(){
        return $this->hasMany('App\Rating');
    }
    public function avgRating(){
        return \DB::table('ratings')->avg('rating_value');
    }
    public function numOfRatings(){
        return count(\DB::select("select * from ratings where course_id={$this->id}"));
    }
    public function numOfStudents(){
        return count(\DB::select("select * from course_user where course_id={$this->id}"));
    }
    public function mentorOnCourses(){
        return \DB::select("SELECT * FROM users WHERE role_id=2");
    }
    public function studentsOnCourses(){
        return \DB::select("SELECT * FROM users WHERE role_id=3");
    }
    public function studentsOnThisCourse(){
        return count(\DB::select("SELECT * FROM course_user WHERE course_id={$this->id}"));
    }
}
