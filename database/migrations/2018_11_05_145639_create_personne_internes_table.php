<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_internes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipe_id')->nullable();
            $table->unsignedInteger('unite_id')->nullable();
            $table->string('posteOccupe',50)->nullable();
            $table->string('name', 50);
            $table->string('prenom', 75);
            $table->dateTime('dateNaissance');
            $table->string('lieuNaissance', 50);
            $table->string('nationalite',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('residence');
            $table->string('login')->unique();
            $table->string('password');
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
        Schema::dropIfExists('personne_internes');
    }
}
