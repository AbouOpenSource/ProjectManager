<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniteDeRecherchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unite_de_recherches', function (Blueprint $table) {
            $table->increments('identifiantUnite');
            $table->unsignedInteger('Lab_identifiantLaboratoire');
            $table->string('nomUnite', 30);
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
        Schema::dropIfExists('unite_de_recherches');
    }
}
