<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsAcademiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_academiques', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('personne_id');
            $table->string('nomFormationAcademique', 100);
            $table->dateTime('dateFormationAcademique');
            $table->string('lieuFormationAcademique', 50);
            
         
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
        Schema::dropIfExists('formations_academiques');
    }
}
