<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->integer('film_id')->nullable()->unsigned();
			$table->integer('acteur_id')->nullable()->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}