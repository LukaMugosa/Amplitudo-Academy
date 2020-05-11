<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('is_done','file_name')->withTimestamps();
    }
    public static function getAllUndoneHomework(){
        $id = auth()->user()->id;
        return DB::select("SELECT * FROM assignment_user WHERE user_id={$id} AND is_done=0");
    }
}
