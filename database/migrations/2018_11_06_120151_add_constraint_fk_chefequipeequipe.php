<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkChefequipeequipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_equipe', function (Blueprint $table) {
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
        Schema::table('detail_chef_equipe', function (Blueprint $table) {
            $table->dropForeign(['equipe_id']);
        });
    }
}
