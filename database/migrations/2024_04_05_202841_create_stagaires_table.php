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
        Schema::create('stagaires', function (Blueprint $table) {
            $table->id();
            $table->string('FullName')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('Departement_id')->unsigned();
            $table->foreign('Departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->bigInteger('Gender_id')->unsigned();
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->date('Date_debut');
            $table->date('Date_fin');
            $table->string('telephone');
            $table->text('Address');
            $table->string('photo');
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
        Schema::dropIfExists('stagaires');
    }
};
