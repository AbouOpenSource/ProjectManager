<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkSectionexamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos_examens', function (Blueprint $table) {
          $table->foreign('examen_id')
          ->references('id')
          ->on('examens')
          ->onUpdate('restrict')
          ->onDelete('restrict');
          ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infos_examens', function (Blueprint $table) {
            $table->dropForeign(['examen_id']);
        });
    }
}
