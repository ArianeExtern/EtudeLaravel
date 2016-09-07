<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model {

	protected $table = 'acteurs';
	public $timestamps = false;
	protected $fillable = array('star');

	public function roles()
	{
		return $this->hasMany('App\Model\Role');
	}

	public function personne()
	{
		return $this->morphMany('App\Model\Personne', 'infoable');
	}

}