<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function abilities(){
        return $this->belongsToMany('App\Ability')->withTimestamps();
    }
    public function allowTo($ability){
        $this->abilities()->sync($ability,false);
    }
}
