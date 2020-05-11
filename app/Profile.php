<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Profile extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\User','id');
    }
}
