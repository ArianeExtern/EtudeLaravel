<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Liste des champs ecrasable après recuperation
    protected $fillable = ['title', 'slug', 'content'];

}
