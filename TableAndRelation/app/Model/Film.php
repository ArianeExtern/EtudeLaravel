<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {

	protected $table = 'films';
	public $timestamps = false;
	protected $fillable = array('titre', 'annee', 'description');

	public function mes()
	{
		return $this->belongsTo('App\Model\Mes');
	}

	public function categories()
	{
		return $this->belongsToMany('App\Model\Categorie');
	}

	public function roles()
	{
		return $this->hasMany('App\Model\Role');
	}

}