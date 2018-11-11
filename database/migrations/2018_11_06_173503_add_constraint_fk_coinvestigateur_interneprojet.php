<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkCoinvestigateurInterneprojet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('co_investigateur_internes', function (Blueprint $table) {
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
        Schema::table('co_investigateur_internes', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
}
