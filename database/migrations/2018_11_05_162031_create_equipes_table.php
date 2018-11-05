<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipes', function (Blueprint $table) {
            $table->increments('identifiantEquipe');
            $table->unsignedInteger('Dep_identifiantDepartement');
            $table->string('nomEquipe',50);
            $table->text('descriptionEquipe');
            $table->text('objectifEquipe');
            
            $table->primary('identifiantEquipe');
        
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
        Schema::dropIfExists('equipes');
    }
}
