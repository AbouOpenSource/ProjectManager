<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailChefUniteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_chef_unite', function (Blueprint $table) {
            $table->unsignedInteger('Per_identifiantPersonne');
            $table->unsignedInteger('Uni_identifientUnite');
            $table->dateTime('debutMandat');
            $table->dateTime('finMandat')->nullable();
           
            $table->primary('Per_identifiantPersonne', 'Uni_identifientUnite');
        
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
        Schema::dropIfExists('detail_chef_unite');
    }
}
