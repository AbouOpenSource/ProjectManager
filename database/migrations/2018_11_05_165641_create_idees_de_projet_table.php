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
            $table->increments('identifiantIdeeProjet');
            $table->unsignedInteger('Ins_identifiantInstitutionSouhaite')->nullable();
            //partenariat souhaite 
            $table->unsignedInteger('Ins_identifiantInstitutionProposeur')->nullable();
            //idee propose par institution
            $table->unsignedInteger('Pro_codeMuraz');
            //idee propose par personne interne
            $table->unsignedInteger('Per_identifiantPersonneInterne')->nullable();
            //idee propose par personne externe
            $table->unsignedInteger('Per_identifiantPersonneExterne')->nullable();
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
