<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailChefLaboratoireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_chef_laboratoire', function (Blueprint $table) {
           $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Lab_identifiantLaboratoire');
            
            $table->primary('Per_identifiantPersonne', 'Lab_identifiantLaboratoire');
        
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
        Schema::dropIfExists('detail_chef_laboratoire');
    }
}
