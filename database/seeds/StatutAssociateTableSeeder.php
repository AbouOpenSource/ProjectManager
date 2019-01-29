<?php

use Illuminate\Database\Seeder;
use App\Models\Projet\Projet;
class StatutAssociateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($idProjet=1;$idProjet<3;$idProjet++)
        {
	        $projet=Projet::find($idProjet); 
	        
	        $projet->Statut()->attach(4, ['debutStatut' => now()]);
	     }
        //App\User::find(1)->roles()->save($role, ['expires' => $expires]);	
    }
}
