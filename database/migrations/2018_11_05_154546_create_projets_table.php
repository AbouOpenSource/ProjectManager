<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('codeMuraz');
            $table->unsignedInteger('Uni_identifientUnite')->nullable();
            $table->unsignedInteger('Equ_identifiantEquipe')->nullable();
            $table->unsignedInteger('Ide_identifiantIdeeProjet')->nullable();
            //ambiguie
            $table->unsignedInteger('Ins_identifiantInstitutionFinanceur');
            $table->integer('volumeProjetFinance');
            $table->dateTime('anneeFinancementProjet');
            
            $table->string('intitule', 30);
            $table->string('dureeProjet',30);
            $table->text('resumeProjet');
            $table->string('budgetProjet');
            $table->string('siteDeMiseEnOeuvre',40);
            $table->text('contexteProjet');
            $table->integer('nombreEmploi')->default(0);
            $table->float('fraisIndirectverseCM');
            $table->string('typeProjet', 40);
            
            $table->text('questionDeRecherche');
            $table->text('resumeDesMethodeEtude');
            $table->text('beneficeNational');
            $table->text('beneficeInstitutionnel');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
