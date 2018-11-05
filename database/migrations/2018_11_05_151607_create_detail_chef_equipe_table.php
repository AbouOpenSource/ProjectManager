<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailChefEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_chef_equipe', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Equ_identifiantEquipe');
            $table->dateTime('debutMandat');
            $table->dateTime('finMandat')->nullable();
           
            $table->primary('Per_identifiantPersonne', 'Equ_identifiantEquipe');
           
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
        Schema::dropIfExists('detail_chef_equipe');
    }
}
