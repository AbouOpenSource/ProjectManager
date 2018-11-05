<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('identifiantInstitution');
            $table->unsignedInteger('Typ_identifiantInstituion');
            $table->string('nomInstitution',100);
            $table->string('emailInstitution',60);
            $table->string('adresseInstitution',100);
            $table->string('paysInstitution', 50);
            
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
        Schema::dropIfExists('institutions');
    }
}
