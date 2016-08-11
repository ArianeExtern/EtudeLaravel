<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmRoleTable extends Migration {

	public function up()
	{
		Schema::create('film_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('film_id')->unsigned()->index();
			$table->integer('role_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('film_role');
	}
}