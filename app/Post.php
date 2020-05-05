<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->belongsToMany('App\Comment')->withTimestamps();
    }

}
