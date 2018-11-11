<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesProfessionnellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences_professionnelles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('societe_id')->nullable();
            $table->unsignedInteger('personne_id');
            $table->string('posteOccupe',30);
            $table->text('description');
            $table->dateTime('DebutExperience')->nullable();
            $table->dateTime('FinExperience')->nullable();
            $table->string('pays', 50);
            
          
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
        Schema::dropIfExists('experiences_professionnelles');
    }
}
