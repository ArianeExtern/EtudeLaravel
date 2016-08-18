<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $fillable = ['titre', 'body', 'create_at', 'update_at'];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
