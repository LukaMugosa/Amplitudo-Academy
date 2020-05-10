<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('is_done')->withTimestamps();
    }
    public static function getAllUndoneProjects(){
        $id = auth()->user()->id;
        return DB::select("SELECT * FROM project_user WHERE user_id={$id} AND is_done=0");
    }
}
