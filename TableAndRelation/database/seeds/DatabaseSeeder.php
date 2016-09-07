<?php

use Illuminate\Database\Seeder;
use App\Model\Categorie;
use App\Model\Personne;
use App\Model\Acteur;
use App\Model\Mes;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creation et insertion dans la base 20 categories aléatoires.
        factory(Categorie::class, 20)->create();

        //Creation de 100 Personnes
        $personnes = factory(Personne::class, 100)->make()->toArray();

        //Creation et Sauvegarde de 50 Acteur & 50 Metteur en scène
        factory(Acteur::class, 50)->create();
        factory(Mes::class, 50)->create();

        $j = 0;
        $k = 50;
        foreach (Acteur::get() as $acteur){
            $tmp = new Personne($personnes[$j]);
            //Association de l'Acteur à une personne et sauvegarde
            $acteur->personne()->save($tmp);
            $j++;
        }
        foreach (Mes::get() as $mes){
            $tmp = new Personne($personnes[$k]);
            $mes->personne()->save($tmp);
            $k++;
        }
    }
}
