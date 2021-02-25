<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteWastesTable extends Migration
{
    /**
     * Merma de cinta blanca de bobina
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_wastes', function (Blueprint $table) {
            $table->id();
            $table->float('peso', 8, 4); //peso de la cinta
            $table->float('largo', 8, 4); //largo que mide el rollo en metros
            $table->string('nomenclatura', 24);
            $table->string('status', 9);
            $table->date('fAlta'); //Fecha en la que llego
        
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
        Schema::dropIfExists('white_wastes');
    }
}
