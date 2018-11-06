<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkIdeeproResultatObtenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultats_obtenus', function (Blueprint $table) {
          $table->foreign('Pro_codeMuraz')
          ->references('codeMuraz')
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
        Schema::table('resultats_obtenus', function (Blueprint $table) {
            $table->dropForeign(['Pro_codeMuraz']);
        });
    }
}
