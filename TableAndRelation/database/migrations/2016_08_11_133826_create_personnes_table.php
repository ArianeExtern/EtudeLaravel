<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonnesTable extends Migration {

	public function up()
	{
		Schema::create('personnes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->integer('age');
			$table->string('sexe');
			$table->integer('infoable_id');
			$table->string('infoable_type');
		});
	}

	public function down()
	{
		Schema::drop('personnes');
	}
}