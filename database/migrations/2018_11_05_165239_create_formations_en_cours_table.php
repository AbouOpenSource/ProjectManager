<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsEnCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_en_cours', function (Blueprint $table) {
            $table->increments('identifiantFormation');
            $table->unsignedInteger('Type_identifiantTypeFormationEncours');
            $table->string('libelleFormation', 254);
            $table->string('lieuFormation', 254);
            
        
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
        Schema::dropIfExists('formations_en_cours');
    }
}
