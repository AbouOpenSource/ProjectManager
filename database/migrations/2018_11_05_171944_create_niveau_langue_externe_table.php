<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiveauLangueExterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_langue_externe', function (Blueprint $table) {
            $table->integer('Per_identifiantPersonne');
            $table->integer('Lan_idLangue');
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
        Schema::dropIfExists('niveau_langue_externe');
    }
}