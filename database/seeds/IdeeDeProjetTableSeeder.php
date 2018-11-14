<?php

use Illuminate\Database\Seeder;

class IdeeDeProjetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\Projet\IdeeDeProjet::class,100)->create();
    }
}
