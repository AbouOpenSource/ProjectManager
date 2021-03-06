<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkAssocieExterneEquipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associe_externes', function (Blueprint $table) {
          $table->foreign('equipe_id')
          ->references('id')
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
        Schema::table('associe_externes', function (Blueprint $table) {
                $table->dropForeign(['equipe_id']);
        });
    }
}
