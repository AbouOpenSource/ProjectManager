<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContraintTypeProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('projets', function (Blueprint $table) {
          $table->foreign('typeProjet_id')
          ->references('id')
          ->on('type_projets')
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
        Schema::table('projets', function (Blueprint $table) {
            $table->dropForeign(['typeProjet_id']);
        });
    }
}
