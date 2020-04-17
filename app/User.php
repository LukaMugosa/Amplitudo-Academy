<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function isAdmin(){
        $name = $this->role()->name;
        return ($name === 'ROLE_ADMIN');
    }
    public function isMentor(){
        $name = $this->role()->name;
        return ($name === 'ROLE_MENTOR');
    }
    public function isSupervisor(){
        $name = $this->role()->name;
        return ($name === 'ROLE_SUPERVISOR');
    }
    public function isGuest(){
        $name = $this->role()->name;
        return ($name === 'ROLE_GUEST');
    }
    public function isStudent(){
        $name = $this->role()->name;
        return ($name === 'ROLE_STUDENT');
    }

    public function role(){
        return $this->belongsTo('App\Post');
    }
}
