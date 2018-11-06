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
            $table->unsignedInteger('Ins_identifiantInstitutionFinanceur');
            $table->unsignedInteger('Pro_codeMuraz');
            $table->integer('volumeProjetFinance');
            $table->dateTime('anneeFinancementProjet');
            $table->primary('Ins_identifiantInstitutionFinanceur','Pro_codeMuraz');
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
