<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesSpecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences_specifiques', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('personne_id');
            $table->text('resume');
            $table->dateTime('dateFinExperience');
            $table->string('pays',50);
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
        Schema::dropIfExists('experiences_specifiques');
    }
}
