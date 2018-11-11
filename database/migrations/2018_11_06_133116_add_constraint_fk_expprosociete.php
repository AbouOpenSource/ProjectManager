<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkExpprosociete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiences_professionnelles', function (Blueprint $table) {
          $table->foreign('societe_id')
          ->references('id')
          ->on('societes')
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
        Schema::table('experiences_professionnelles', function (Blueprint $table) {
            $table->dropForeign(['societe_id']);
        });
    }
}
