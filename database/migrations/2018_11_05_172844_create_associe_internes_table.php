<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocieInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associe_internes', function (Blueprint $table) {
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('equipe_id');
            $table->unsignedInteger('projet_id')->nullable();
            $table->primary(['personne_id', 'equipe_id']);
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
        Schema::dropIfExists('associe_internes');
    }
}
