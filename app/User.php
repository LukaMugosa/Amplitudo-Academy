<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
    }
//    public function assignRole($role){
//        $this->role()->save($role);
//    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function isAdmin(){
        $name = $this->role->name;
        return ($name === 'ROLE_ADMIN');
    }
    public function isMentor(){
        $name = $this->role->name;
        return ($name === 'ROLE_MENTOR');
    }
    public function isSupervisor(){
        $name = $this->role->name;
        return ($name === 'ROLE_SUPERVISOR');
    }
    public function isGuest(){
        $name = $this->role->name;
        return ($name === 'ROLE_GUEST');
    }

    public function isStudent(){
        $name = $this->role->name;
        return ($name === 'ROLE_STUDENT');
    }
    public function abilities(){
        return $this->role->abilities->flatten()->pluck('name')->unique();
    }
    public function courses(){
        return $this->belongsToMany('App\Course')->withTimestamps();
    }
    public function course(){
        return $this->hasMany('App\Course');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function assignments(){
        return $this->hasMany('App\Assignment');
    }
    public function assignmentsManyToMany(){
        return $this->belongsToMany('App\Assignment')->withTimestamps();
    }
    public function reports(){
        return $this->hasMany('App\Report');
    }
    public function reportsManyToMany(){
        return $this->belongsToMany('App\Report');
    }
    public function ratings(){
        return $this->hasMany('App\Rating');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public static function getAllMentors(){
        $mentors = [];
        $users = User::all();
        foreach ($users as $user){
            if($user->isMentor())
                array_push($mentors, $user);
        }
        return $mentors;
    }
    public static function getAllMentorsForSupervisors(){
        $mentors = [];
        $users = User::all();
        foreach ($users as $user){
            if($user->isMentor() && $user->supervisor_id===auth()->user()->id)
                array_push($mentors, $user);
        }
        return $mentors;
    }
    public static function getAllStudents(){
        $students = [];
        $users = User::all();
        foreach ($users as $user){
            if($user->isStudent())
                array_push($students, $user);
        }
        return $students;
    }
    public static function getAllStudentsForSupervisor(){
        $students = [];
        $users = User::all();
        foreach ($users as $user){
            if($user->isStudent() && $user->supervisor_id===auth()->user()->id)
                array_push($students, $user);
        }
        return $students;
    }
    public static function getAllSupervisors(){
        $supervisors = [];
        $users = User::all();
        foreach ($users as $user){
            if($user->isSupervisor())
                array_push($supervisors, $user);
        }
        return $supervisors;
    }
    public function project(){
        return $this->hasMany('App\Project');
    }
    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps();
    }

}
