<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkAssocieDetailclpinterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_laboratoire', function (Blueprint $table) {
            $table->foreign('personne_id')
            ->references('id')
            ->on('personne_internes')
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
        Schema::table('detail_chef_laboratoire', function (Blueprint $table) {
            $table->dropForeign(['personne_id']);
        });
    }
}
