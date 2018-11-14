<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkUniteRecheraddLabo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unite_de_recherches', function (Blueprint $table) {
            $table->foreign('laboratoire_id')
            ->references('id')
            ->on('laboratoires')
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
        Schema::table('unite_de_recherches', function (Blueprint $table) {
            $table->dropForeign(['laboratoire_id']);
        });
    }
}
