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
            $table->foreign('Ins_identifiantInstitution')
            ->references('identifiantInstitution')
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
            $table->dropForeign(['Ins_identifiantInstitution']);
        });
    }
}
