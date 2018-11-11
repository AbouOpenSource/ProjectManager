<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkBourseprojet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bourses', function (Blueprint $table) {
          $table->foreign('projet_id')
          ->references('id')
          ->on('projets')
          ->onDelete('restrict')
          ->onUpdate('restrict');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bourses', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
}
