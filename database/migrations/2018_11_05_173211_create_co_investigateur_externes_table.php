<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoInvestigateurExternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_investigateur_externes', function (Blueprint $table) {
            $table->unsignedInteger('personne_id');
            $table->unsignedInteger('projet_id');

            $table->primary(['personne_id', 'projet_id']);

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
        Schema::dropIfExists('co_investigateur_externes');
    }
}
