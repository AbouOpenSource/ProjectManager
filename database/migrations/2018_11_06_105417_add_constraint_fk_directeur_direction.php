<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkDirecteurDirection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_direction', function (Blueprint $table) {
            $table->foreign('direction_id')
            ->references('id')
            ->on('directions')
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
        Schema::table('detail_chef_direction', function (Blueprint $table) {
            $table->dropForeign(['direction_id']);
        });
    }
}
