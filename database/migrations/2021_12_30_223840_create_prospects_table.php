<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('SIREN')->unique();
            $table->string('raison_sociale');
            $table->string('professions');
            $table->string('prenom');
            $table->string('nom');
            $table->string('role');
            $table->string('adresse');
            $table->unsignedInteger('code_postal');
            $table->string('ville');
            $table->unsignedInteger('tel');
            $table->unsignedInteger('fixe');
            $table->string('mail');
            $table->unsignedInteger('annee_de_creation');
            $table->string('form_legale');
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
        Schema::dropIfExists('prospects');
    }
}
