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
            $table->unsignedInteger('Sta_identifiantStatut');
            $table->unsignedInteger('Pro_codeMuraz');
            $table->dateTime('debutStatut')->nullable();
            $table->dateTime('finStatut')->nullable();
            
            $table->primary('Sta_identifiantStatut', 'Pro_codeMuraz');
        
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
