<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkAssocieDetailclLabo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_laboratoire', function (Blueprint $table) {
            $table->foreign('Lab_identifiantLaboratoire')
            ->references('identifiantLaboratoire')
            ->on('laboratoires')
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
          $table->dropForeign(['Lab_identifiantLaboratoire']);
        });
    }
}
