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
            $table->foreign('Pro_codeMuraz')
            ->references('codeMuraz')
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
            $table->dropForeign(['Pro_codeMuraz']);
        });
    }
}
