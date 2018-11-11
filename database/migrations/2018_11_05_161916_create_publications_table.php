<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('typePublication_id');
            $table->unsignedInteger('evenement_id')-> nullable();
            $table->unsignedInteger('projet_id') -> nullable();
            $table->unsignedInteger('personne_id')-> nullable();
            $table->string('libellePublication', 100);
            $table->text('description');
            $table->dateTime('datePublication');
            $table->string('sourcePublication',100);
            $table->string('media',100)-> nullable();
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
        Schema::dropIfExists('publications');
    }
}
