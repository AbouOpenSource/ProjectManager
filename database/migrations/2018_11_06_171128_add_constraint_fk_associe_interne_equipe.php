<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkAssocieInterneEquipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associe_internes', function (Blueprint $table) {
          $table->foreign('Equ_identifiantEquipe')
          ->references('identifiantEquipe')
          ->on('equipes')
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
        Schema::table('associe_internes', function (Blueprint $table) {
            $table->dropForeign(['Equ_identifiantEquipe']);
        });
    }
}