<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos_examens', function (Blueprint $table) {
              $table->unsignedInteger('Sec_identifiantSection');
              $table->unsignedInteger('Exa_identifiantExamen');
              $table->year('anneeExamen');
              $table->unsignedInteger('nombreExamen');

             $table->primary(['Sec_identifiantUnite', 'Exa_identifiantExamen', 'anneeExamen'])
             ->name('infos_examens_pk');

              $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos_examens');
    }
}
