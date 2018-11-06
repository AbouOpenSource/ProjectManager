<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkChefequipinterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_equipe', function (Blueprint $table) {
          $table->foreign('Per_identifiantPersonne')
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
        Schema::table('detail_chef_equipe', function (Blueprint $table) {
          $table->dropForeign(['Per_identifiantPersonne']);
        });
    }
}
