<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->integer('film_id')->unsigned();
			$table->integer('acteur_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}