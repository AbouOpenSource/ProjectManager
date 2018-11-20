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
            $table->increments('id');
            $table->string('codeMuraz');
            $table->unsignedInteger('unite_id')->nullable();
            $table->unsignedInteger('equipe_id')->nullable();
            $table->unsignedInteger('ideeDeProjet_id')->nullable();
            $table->string('intitule');
            $table->string('dureeProjet',30);
            $table->text('resumeProjet');
            $table->string('budgetProjet')->nullable();
            $table->string('siteDeMiseEnOeuvre',40)->nullable();
            $table->text('contexteProjet')->nullable();
            $table->integer('nombreEmploi')->default(0);
            $table->float('fraisIndirectverseCM')->nullable();
            //$table->string('typeProjet', 40)->nullable();
            
            $table->unsignedInteger('typeProjet_id');
            $table->text('questionDeRecherche')->nullable();
            $table->text('resumeDesMethodeEtude')->nullable();
            $table->text('beneficeNational')->nullable();
            $table->text('beneficeInstitutionnel')->nullable();

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
