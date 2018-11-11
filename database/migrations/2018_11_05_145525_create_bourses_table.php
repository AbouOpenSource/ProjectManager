<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bourses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projet_id');
            $table->unsignedInteger('personne_id');
            $table->string('libelletBourse',30);
            $table->text('description');
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
        Schema::dropIfExists('bourses');
    }
}
