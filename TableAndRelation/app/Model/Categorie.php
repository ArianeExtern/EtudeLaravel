<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

	protected $table = 'categories';
	public $timestamps = false;
	protected $fillable = array('nom');

	public function films()
	{
		return $this->belongsToMany('Model\Film');
	}

}