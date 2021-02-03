<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteWastesTable extends Migration
{
    /**
     * Merma de cinta blanca
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_wastes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coil_id'); //llave foranea de bobina de cinta blanca
            $table->unsignedBigInteger('employee_id'); //llave foranea de catalogo de empleado
            $table->float('peso', 8, 4); //peso de la cinta
            $table->float('largo', 8, 4); //largo que mide el rollo en metros
            $table->string('nomenclatura', 20);
            $table->dateTime('fArribo'); //Fecha en la que llego
            
            $table->foreign('coil_id')
                ->references('id')
                ->on('coils');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees');

                

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
