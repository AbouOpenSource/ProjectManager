<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkStatutprojetstatut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_statut_projet', function (Blueprint $table) {
          $table->foreign('Sta_identifiantStatut')
          ->references('identifiantStatut')
          ->on('statuts')
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
        Schema::table('detail_statut_projet', function (Blueprint $table) {
          $table->dropForeign(['Sta_identifiantStatut']);
        });
    }
}
