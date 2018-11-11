<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeesDeProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idees_de_projet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institutionSouhaite_id')->nullable();
            //partenariat souhaite 
            $table->unsignedInteger('institutionProposeur_id')->nullable();
            //idee propose par institution
            $table->unsignedInteger('projet_id');
            //idee propose par personne interne
            $table->unsignedInteger('personneinterne_id')->nullable();
            //idee propose par personne externe
            $table->unsignedInteger('personneexterne_id')->nullable();
            $table->string('cheminProtocole', 40);
            $table->boolean('soumis')->default(0);
            $table->dateTime('dateSoumission')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idees_de_projet');
    }
}
