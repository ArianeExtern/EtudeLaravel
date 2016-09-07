<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FilmRole extends Model {

	protected $table = 'film_role';
	public $timestamps = false;
	protected $fillable = array('film_id', 'role_id');

}