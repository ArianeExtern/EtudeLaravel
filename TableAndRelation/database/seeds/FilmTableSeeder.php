<?php

use Illuminate\Database\Seeder;
use App\Film\Film;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Charger le fichier XML
        $xml = simplexml_load_file("App/Films.xml");

        //Parcours et insertion dans la base de données
        foreach($xml->children() as $film) {
            Film::create([
                'titre' => $film['titre'],
                'categorie' => $film->GENRE,
                'annee' => $film->ANNEE,
                'description' => $film->PAYS
            ]);
        }
    }
}
