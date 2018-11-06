<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkPtechniqueprojet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_partenariat_technique', function (Blueprint $table) {
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
        Schema::table('detail_partenariat_technique', function (Blueprint $table) {
          $table->dropForeign(['Pro_codeMuraz']);
        });
    }
}