<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


//Frabrique pour le model Categorie
$factory->define(App\Model\Categorie::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR'); //Element générer en francais
    return [
        'nom' => $faker->word,
    ];
});

//Fabrique pour le Model Personne
$factory->define(App\Model\Personne::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR'); //Element générer en francais
    return [
        'nom' => $faker->name,
        'age' => intval($faker->year),
        'sexe' => ($faker->boolean ? 'Male' : 'Femelle'),
    ];
});

//Fabrique pour le Model Metteur en Scène
$factory->define(App\Model\Mes::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR'); //Element générer en francais
    return [
        'trophe' => $faker->boolean,
    ];
});

//Fabrique pour le Model Acteur
$factory->define(App\Model\Acteur::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR'); //Element générer en francais
    return [
        'star' => $faker->word,
    ];
});