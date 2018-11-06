<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkFormcourtyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formations_en_cours', function (Blueprint $table) {
          $table->foreign('Typ_identifiantTypeFormationEnCours')
          ->references('identifiantTypeFormationEnCours')
          ->on('type_formation_en_cours')
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
        Schema::table('formations_en_cours', function (Blueprint $table) {
            $table->dropForeign(['Typ_identifiantTypeFormationEnCours']);
        });
    }
}