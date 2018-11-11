<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsEnCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_en_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('typeFormationEnCours_id');
            $table->string('libelleFormation', 254);
            $table->dateTime('debut');
            $table->string('lieuFormation', 254);
            $table->unsignedInteger('personne_id');


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
        Schema::dropIfExists('formations_en_cours');
    }
}
