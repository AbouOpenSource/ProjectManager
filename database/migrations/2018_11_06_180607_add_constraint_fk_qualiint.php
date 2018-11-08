<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkQualiint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualification_personne_internes', function (Blueprint $table) {
          $table->foreign('Qua_identifiantQualification')
          ->references('identifiantQualification')
          ->on('qualifications')
          ->onUpdate('restrict')
          ->onDelete('restrict')
          ->name('qualifications_qualpexter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::table('qualification_personne_internes', function (Blueprint $table) {
          $table->dropForeign('qualifications_qualpexter');
        });
=======
        Schema::table('qualification_personne_internes', function (Blueprint $tabl) {
          $table->dropForeign(['Qua_identifiantQualification']);
           });
>>>>>>> ec85a2d6830659ccb7d67df229a7117f725068de
    }
}
