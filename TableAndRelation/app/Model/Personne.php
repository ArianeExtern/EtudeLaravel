<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model {

	protected $table = 'personnes';
	public $timestamps = false;
	protected $fillable = array('nom', 'age', 'sexe', 'infoable_id', 'infoable_type');

	public function infoable()
	{
		return $this->morphTo();
	}

}