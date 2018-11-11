<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDiplomeExterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_diplome_externe', function (Blueprint $table) {
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('typeDiplome_id');
            $table->string('numeroDiplome');
            $table->dateTime('dateDoptention');
            $table->string('mention')->default("")->nullable();

            $table->primary('personne_id', 'typeDiplome_id');

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
        Schema::dropIfExists('detail_diplome_externe');
    }
}
