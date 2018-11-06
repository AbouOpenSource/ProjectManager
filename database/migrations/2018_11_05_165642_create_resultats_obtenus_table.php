<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsObtenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats_obtenus', function (Blueprint $table) {
            $table->increments('identifiantResultat');
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
        Schema::dropIfExists('resultats_obtenus');
    }
}
