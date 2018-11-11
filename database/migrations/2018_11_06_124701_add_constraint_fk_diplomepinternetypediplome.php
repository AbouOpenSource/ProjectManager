<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkDiplomepinternetypediplome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_diplome_interne', function (Blueprint $table) {
          $table->foreign('typeDiplome_id')
          ->references('id')
          ->on('type_diplomes')
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
        Schema::table('detail_diplome_interne', function (Blueprint $table) {
            $table->dropForeign(['typeDiplome_id']);
        });
    }
}
