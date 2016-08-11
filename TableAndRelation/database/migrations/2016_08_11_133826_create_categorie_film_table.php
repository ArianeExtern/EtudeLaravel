<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategorieFilmTable extends Migration {

	public function up()
	{
		Schema::create('categorie_film', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('categorie_id')->unsigned()->index();
			$table->integer('film_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('categorie_film');
	}
}