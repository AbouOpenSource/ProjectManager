<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkIdeeproResultatAttend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultats_attendus', function (Blueprint $table) {
          $table->foreign('ideeDeProjet_id')
          ->references('id')
          ->on('idees_de_projet')
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
        Schema::table('resultats_attendus', function (Blueprint $table) {
            $table->dropForeign(['ideeDeProjet_id']);
        });
    }
}
