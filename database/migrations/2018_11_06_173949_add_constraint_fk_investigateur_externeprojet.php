<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkInvestigateurExterneprojet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigateur_externes', function (Blueprint $table) {
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
        Schema::table('investigateur_externes', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
}
