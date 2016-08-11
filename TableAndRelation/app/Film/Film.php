<?php

namespace App\Film;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //Pas Obligatoire dans ce cas
    protected $table = "films";

    //Optionnel et empeche la conservation
    //des dates d'insertion et de mise à jour.
    public $timestamps = false;

    //Liste des champs autoriser à être inserer
    //à travers un table associative (Insertion en masse)
    protected $fillable = ["titre", "categorie", "description", "annee"];
}
