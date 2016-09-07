<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model {

	protected $table = 'mess';
	public $timestamps = false;
	protected $fillable = array('trophe');

	public function films()
	{
		return $this->hasMany('App\Model\Film');
	}

	public function personne()
	{
		return $this->morphMany('App\Model\Personne', 'infoable');
	}

}