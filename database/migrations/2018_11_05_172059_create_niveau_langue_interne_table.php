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
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Lan_identifiantLangue');
            $table->integer('niveauLu')->default(0);
            $table->integer('niveauParle')->default(0);
            $table->integer('niveauEcrit')->default(0);

            $table->primary('Per_identifiantPersonne', 'Lan_idLangue');

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
