<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailChefDepartement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_chef_departement', function (Blueprint $table) {
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('departement_id');
            $table->dateTime('debutMandat');
            $table->dateTime('finMandat')->nullable();
           
            $table->primary(['personne_id', 'departement_id']);
           
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
        Schema::dropIfExists('detail_chef_departement');
    }
}
