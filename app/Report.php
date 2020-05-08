<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function intendedUser(){
        return $this->belongsTo('App\User','intended_user_id');
    }
    public static function retriveMyReports(){
        $reports = Report::all();
        $myusers = User::retriveMyUsers();
        $myreports = [];
        foreach ($reports as $report){
            if(in_array($report->intended_user_id,$myusers))
                array_push($myreports,$report);
        }
        return $myreports;
    }
}
