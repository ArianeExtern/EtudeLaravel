<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
	public $timestamps = false;
	protected $fillable = array('nom');

	public function acteur()
	{
		return $this->belongsTo('Model\Acteur');
	}

	public function film()
	{
		return $this->belongsTo('Model\Film');
	}

}