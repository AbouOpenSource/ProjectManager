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
            $table->unsignedInteger('Ins_identifiantInstitution');
            $table->unsignedInteger('Pro_codeMuraz');
            $table->text('descriptionPartenariat');
            
            $table->primary('Ins_identifiantInstitution', 'Pro_codeMuraz');
        
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
