<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkIdeeprojet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('idees_de_projet', function (Blueprint $table) {
          $table->foreign('projet_id')
          ->references('id')
          ->on('projets')
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
          $table-> dropForeign(['projet_id']);
        });
    }
}
