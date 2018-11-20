<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPartenariatFinancierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_partenariat_financier', function (Blueprint $table) {
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('projet_id');
            $table->integer('volumeProjetFinance');
            $table->year('anneeFinancementProjet');
            $table->primary(['institution_id','projet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_partenariat_financier');
    }
}
