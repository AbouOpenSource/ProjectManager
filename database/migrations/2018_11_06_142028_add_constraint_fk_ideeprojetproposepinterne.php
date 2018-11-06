<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkIdeeprojetproposepinterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('idees_de_projet', function (Blueprint $table) {
          $table->foreign('Per_identifiantPersonneInterne')
          ->references('identifiantPersonne')
          ->on('personne_internes')
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
        Schema::table('idees_de_projet', function (Blueprint $table) {
              $table->dropForeign(['Per_identifiantPersonneInterne']);
        });
    }
}
