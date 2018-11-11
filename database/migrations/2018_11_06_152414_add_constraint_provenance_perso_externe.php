<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintProvenancePersoExterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personne_externes', function (Blueprint $table) {
            $table->foreign('institution_id')
            ->references('id')
            ->on('institutions')
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
        Schema::table('personne_externes', function (Blueprint $table) {
            $table->dropForeign(['institution_id']);
        });
    }
}
