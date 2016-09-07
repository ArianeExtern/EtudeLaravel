<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategorieFilm extends Model {

	protected $table = 'categorie_film';
	public $timestamps = false;
	protected $fillable = array('categorie_id', 'film_id');

}