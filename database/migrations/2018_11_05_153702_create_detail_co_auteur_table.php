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
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('publication_id');
            $table->integer('ordreDimplication');
            //->default(0);
            $table->text('descriptionParticipation')-> nullable();
            
            $table->primary(['personne_id', 'publication_id']);
        
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
