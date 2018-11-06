<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsAttendusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats_attendus', function (Blueprint $table) {
            $table->increments('identifiantResultatAttendus');
            $table->unsignedInteger('Ide_identifiantIdeeProjet');
            $table->text('contenu');
            $table->boolean('realisation')->default(0);

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
        Schema::dropIfExists('resultats_attendus');
    }
}
