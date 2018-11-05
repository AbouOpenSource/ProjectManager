<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationPersonneInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_personne_internes', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Qua_identifiantQualification');
            
            $table->primary('Per_identifiantPersonne', 'Qua_identifiantQualification');
        
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
        Schema::dropIfExists('qualification_personne_internes');
    }
}
