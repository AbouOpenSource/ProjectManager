<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkPassociationassoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personne_associations', function (Blueprint $table) {
          $table
          ->foreign('association_id')

          ->references('id')
          ->on('associations')
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
        Schema::table('personne_associations', function (Blueprint $table) {
            $table->dropForeign(['association_id']);
        });
    }
}
