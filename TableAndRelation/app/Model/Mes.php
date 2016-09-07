<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model {

	protected $table = 'mess';
	public $timestamps = false;
	protected $fillable = array('trophe');

	public function films()
	{
		return $this->hasMany('Model\Film');
	}

	public function personne()
	{
		return $this->morphMany('Model\Personne', 'info');
	}

}