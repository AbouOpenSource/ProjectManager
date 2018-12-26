<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailStatutProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_statut_projet', function (Blueprint $table) {
            $table->unsignedInteger('statut_id');
            $table->unsignedInteger('projet_id');
            $table->dateTime('debutStatut')->nullable();
            $table->dateTime('finStatut')->nullable();
            $table->primary(['statut_id', 'projet_id']);
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
        Schema::dropIfExists('detail_statut_projet');
    }
}
