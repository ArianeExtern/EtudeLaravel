<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //Pas obligatoire dans notre cas
    protected $table = "videos";
    //Optionnel
    public $timestamps = false;
    //Liste des champs autoriser en masse :
    protected $fillable = ["name", "url", "description","duree"];
}
