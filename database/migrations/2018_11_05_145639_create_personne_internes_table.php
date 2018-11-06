<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_internes', function (Blueprint $table) {
            $table->increments('identifiantPersonne');
            $table->unsignedInteger('Equ_identifiantEquipe')->nullable();
            $table->unsignedInteger('Uni_identifiantUnite')->nullable();
            $table->string('posteOccupe',50)->nullable();
            $table->string('nom', 50);
            $table->string('prenom', 75);
            $table->dateTime('dateNaissance');
            $table->string('lieuNaissance', 50);
            $table->string('nationalite',50);
            $table->string('email')->unique();
            $table->string('residence', 75);
            $table->string('login')->unique();
            $table->string('motDePasse', 50);
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
        Schema::dropIfExists('personne_internes');
    }
}
