<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $fillable = ['content'];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function reponses(){
        return $this->hasMany('App\Reponse');
    }
}
