<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('mes_id')->references('id')->on('mess')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->foreign('film_id')->references('id')->on('films')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->foreign('acteur_id')->references('id')->on('acteurs')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
		Schema::table('categorie_film', function(Blueprint $table) {
			$table->foreign('categorie_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('categorie_film', function(Blueprint $table) {
			$table->foreign('film_id')->references('id')->on('films')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
		Schema::table('film_role', function(Blueprint $table) {
			$table->foreign('film_id')->references('id')->on('films')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
		Schema::table('film_role', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('films')
						->onDelete('cascade');
						//->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_mes_id_foreign');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->dropForeign('roles_film_id_foreign');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->dropForeign('roles_acteur_id_foreign');
		});
		Schema::table('categorie_film', function(Blueprint $table) {
			$table->dropForeign('categorie_film_categorie_id_foreign');
		});
		Schema::table('categorie_film', function(Blueprint $table) {
			$table->dropForeign('categorie_film_film_id_foreign');
		});
		Schema::table('film_role', function(Blueprint $table) {
			$table->dropForeign('film_role_film_id_foreign');
		});
		Schema::table('film_role', function(Blueprint $table) {
			$table->dropForeign('film_role_role_id_foreign');
		});
	}
}