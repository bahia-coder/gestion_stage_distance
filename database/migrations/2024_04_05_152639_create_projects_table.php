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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            
            $table->bigInteger('Departement_id')->unsigned();
            $table->foreign('Departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->bigInteger('Stagaire_id')->unsigned();
            $table->foreign('Stagaire_id')->references('id')->on('stagaires')->onDelete('cascade');
            $table->bigInteger('Employe_id')->unsigned();
            $table->foreign('Employe_id')->references('id')->on('employes')->onDelete('cascade');
            $table->date('Date_Expire');
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
        Schema::dropIfExists('projects');
    }
};
