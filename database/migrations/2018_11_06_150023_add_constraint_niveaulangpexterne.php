<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintNiveaulangpexterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_langue_externe', function (Blueprint $table) {
            $table->foreign('personne_id')
            ->references('id')
            ->on('personne_externes')
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
        Schema::table('niveau_langue_externe', function (Blueprint $table) {
            $table->dropForeign(['personne_id']);
        });
    }
}
