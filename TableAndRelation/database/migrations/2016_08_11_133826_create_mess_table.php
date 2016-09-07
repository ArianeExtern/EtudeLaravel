<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessTable extends Migration {

	public function up()
	{
		Schema::create('mess', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('trophe')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('mess');
	}
}