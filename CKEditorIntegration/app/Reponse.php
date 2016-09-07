<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    //
    public $fillable = ['content'];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
