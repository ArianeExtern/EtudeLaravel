<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {

	protected $table = 'films';
	public $timestamps = false;
	protected $fillable = array('titre', 'annee', 'description', 'mes_id');

	public function mess()
	{
		return $this->belongsTo('Model\Mes');
	}

	public function categories()
	{
		return $this->belongsToMany('Model\Categorie');
	}

	public function roles()
	{
		return $this->hasMany('Model\Role');
	}

}