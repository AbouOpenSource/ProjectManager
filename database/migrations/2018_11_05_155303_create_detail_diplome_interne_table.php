<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDiplomeInterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_diplome_interne', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Typ_identifiantDiplome');
            $table->string('numeroDiplome');
            $table->dateTime('dateDoptention');
            $table->string('mention')->default("")->nullable();
           
            $table->primary('Per_identifiantPersonne', 'Typ_identifiantDiplome');
        
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
        Schema::dropIfExists('detail_diplome_interne');
    }
}
