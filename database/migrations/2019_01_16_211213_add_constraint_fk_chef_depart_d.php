<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkChefDepartD extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_chef_departement', function (Blueprint $table) {
          $table->foreign('departement_id')
          ->references('id')
          ->on('departements')
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
         Schema::table('activites', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
}
