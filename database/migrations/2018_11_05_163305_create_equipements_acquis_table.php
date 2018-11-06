<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementsAcquisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipements_acquis', function (Blueprint $table) {
             $table->increments('identifiantEquipement');
            $table->unsignedInteger('Pro_codeMuraz');
            $table->string('typeEquipement',50);
            $table->text('description');
            $table->integer('prix');
            
            
        
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
        Schema::dropIfExists('equipements_acquis');
    }
}
