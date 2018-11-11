<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkAffeclabo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laboratoires', function (Blueprint $table) {
          $table->foreign('departement_id')
          ->references('id')
          ->on('departements')
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
        Schema::table('laboratoires', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
        });
    }
}
