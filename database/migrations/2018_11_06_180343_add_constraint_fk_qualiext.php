<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkQualiext extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('qualification_personne_externes', function (Blueprint $table) {
        $table->foreign('Qua_identifiantQualification')
        ->references('identifiantQualification')
        ->on('qualifications')
        ->onUpdate('restrict')
        ->onDelete('restrict')
        ->name('foreignkeyqualification');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('qualification_personne_externes', function (Blueprint $table) {
          $table->dropForeign('Qua_identifiantQualification');
      });
  }
}
