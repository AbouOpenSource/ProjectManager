<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintMembrUniteR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personne_internes', function (Blueprint $table) {
          $table->foreign('Uni_identifiantUnite')
          ->references('identifiantUnite')
          ->on('unite_de_recherches')
          ->onUpdate('restrict')
          ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personne_internes', function (Blueprint $table) {
            $table->dropForeign(['Uni_identifiantUnite']);
        });
    }
}
