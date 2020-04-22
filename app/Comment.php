<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
    public function courses(){
        return $this->belongsToMany('App\Course');
    }
}
