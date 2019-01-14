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
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('qualification_id');
            
            $table->primary(['personne_id', 'qualification_id']);
        
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
