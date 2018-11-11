<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestationDeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestation_de_services', function (Blueprint $table) {
           $table->increments('id');
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('equipe_id');
            $table->text('nomDescription');
            $table->string('typePrestation', 50);    
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
        Schema::dropIfExists('prestation_de_services');
    }
}
