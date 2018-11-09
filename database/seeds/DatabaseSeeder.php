<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          DirectionsTableSeeder::class,
          DepartementsTableSeeder::class,
          LaboratoiresTableSeeder::class,
          EquipesTableSeeder::class,
          SectionsTableSeeder::class,
          UniteDeRecherchesTableSeeder::class,
          LanguesTableSeeder::class,
          TypeDiplomesTableSeeder::class,
          TypeFormationEnCoursTableSeeder::class,
          TypeInstitutionsTableSeeder::class,
          TypePublicationsTableSeeder::class,
          StatutsTableSeeder::class,
          AssociationsTableSeeder::class,
          PersonneInternesTableSeeder::class,



        ]);
    }
}
