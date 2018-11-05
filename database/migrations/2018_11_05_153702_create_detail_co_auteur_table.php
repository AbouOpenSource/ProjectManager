<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCoAuteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_co_auteur', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Pub_identifiantPublication');
            $table->integer('ordreDimplication');
            //->default(0);
            $table->text('descriptionParticipation')-> nullable();
            
            $table->primary('Per_identifiantPersonne', 'Pub_identifiantPublication');
        
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
        Schema::dropIfExists('detail_co_auteur');
    }
}
