<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDiplomeExterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_diplome_externe', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Typ_identifiantTypeDiplome');
            $table->string('numeroDiplome');
            $table->dateTime('dateDoptention');
            $table->string('mention')->default("")->nullable();

            $table->primary('Per_identifiantPersonne', 'Typ_identifiantTypeDiplome');

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
        Schema::dropIfExists('detail_diplome_externe');
    }
}
