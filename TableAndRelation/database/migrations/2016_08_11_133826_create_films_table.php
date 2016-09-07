<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmsTable extends Migration {

	public function up()
	{
		Schema::create('films', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titre', 100);
			$table->string('annee', 4);
			$table->string('categorie');
			$table->text('description');
			$table->integer('mes_id')->nullable()->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('films');
	}
}