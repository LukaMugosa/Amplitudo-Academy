<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $fillable = ['name'];
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
}

