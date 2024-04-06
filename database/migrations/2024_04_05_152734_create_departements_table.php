<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Ajout de la colonne pour le nom du département
            $table->text('description')->nullable(); // Ajout de la colonne pour la description du département (optionnelle)
           // $table->unsignedBigInteger('responsable_id')->nullable(); // Ajout de la colonne pour l'encadrant responsable (optionnelle)
            //$table->foreign('responsable_id')->references('id')->on('encadrants')->onDelete('set null'); // Clé étrangère référençant l'encadrant responsable
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
        Schema::dropIfExists('departements');
    }
};
