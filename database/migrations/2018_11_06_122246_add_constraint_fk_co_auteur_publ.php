<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintFkCoAuteurPubl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_co_auteur', function (Blueprint $table) 
        {
            $table->foreign('publication_id')
            ->references('id')
            ->on('publications')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_co_auteur', function (Blueprint $table) 
        {
        

          $table->dropForeign(['publication_id']);
        

        });
    }
}
