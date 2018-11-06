<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkDemandeurService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestation_de_services', function (Blueprint $table) {
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
        Schema::table('prestation_de_services', function (Blueprint $table) {
            $table->dropForeign(['Ins_identifiantInstitution']);
        });
    }
}
