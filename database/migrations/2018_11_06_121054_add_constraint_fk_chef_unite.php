<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkChefUnite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_unite', function (Blueprint $table) {
            $table->foreign('unite_id')
            ->references('id')
            ->on('unite_de_recherches')
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
        Schema::table('detail_chef_unite', function (Blueprint $table) {
          $table->dropForeign(['unite_id']);
        });
    }
}
