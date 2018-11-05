<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('identifiantRessource');
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->string('nomRessource', 30);
            $table->string('prenomRessource', 30);
            $table->string('emailRessource', 30);
            $table->string('telephoneRessource',20);
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
        Schema::dropIfExists('references');
    }
}
