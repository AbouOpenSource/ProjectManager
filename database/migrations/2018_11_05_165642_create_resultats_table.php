<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->increments('identifiantResultat');
            $table->unsignedInteger('Ide_identifiantIdeeProjet');
            $table->unsignedInteger('Pro_codeMuraz');
            $table->text('contenu');
            $table->dateTime('dateRealisation');
            $table->text('detailResutltat');
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
        Schema::dropIfExists('resultats');
    }
}
