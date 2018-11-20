<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPartenariatTechniqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_partenariat_technique', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('projet_id');
            $table->text('descriptionPartenariat')->nullable();
            
            $table->primary('institution_id', 'projet_id');
        
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
        Schema::dropIfExists('detail_partenariat_technique');
    }
}
