<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkCoAuteurPubl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_co_auteur', function (Blueprint $table) {
            $table->foreign('Pub_identifiantPublication')
            ->references('identifiantPublication')
            ->on('publications')
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
        Schema::table('detail_co_auteur', function (Blueprint $table) {
          $table->dropForeign(['Pub_identifiantPublication']);
        });
    }
}
