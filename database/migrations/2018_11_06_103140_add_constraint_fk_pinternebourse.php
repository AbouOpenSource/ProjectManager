<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkPinternebourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bourses', function (Blueprint $table) {
            $table->foreign('Per_identifiantPersonne')
            ->references('identifiantPersonne')
            ->on('personne_internes')
            ->onDelete('restrict')
            ->onUpdate('restrict');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bourses', function (Blueprint $table) {
            $table->dropForeign(['Per_identifiantPersonne']);
        });
    }
}
