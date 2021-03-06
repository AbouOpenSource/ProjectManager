<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiveauLangueInterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_langue_interne', function (Blueprint $table) {
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('langue_id');
            $table->integer('niveauLu')->default(0);
            $table->integer('niveauParle')->default(0);
            $table->integer('niveauEcrit')->default(0);

            $table->primary(['personne_id', 'langue_id']);

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
        Schema::dropIfExists('niveau_langue_interne');
    }
}
