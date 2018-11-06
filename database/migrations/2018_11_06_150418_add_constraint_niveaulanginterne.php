<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintNiveaulanginterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_langue_interne', function (Blueprint $table) {
          $table->foreign('Lan_identifiantLangue')
          ->references('identifiantLangue')
          ->on('langues')
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
        Schema::table('niveau_langue_interne', function (Blueprint $table) {
            $table->dropForeign(['Lan_identifiantLangue']);
        });
    }
}
