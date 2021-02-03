<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteBagsTable extends Migration
{
    /**
     * Merma de bolsas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_bags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ribbon_id'); //llave foranea de rollo
            $table->unsignedBigInteger('bag_mesure_id'); //llave foranea del catalogo de la medida de la bolsa
            $table->unsignedBigInteger('employee_id')->nullable(); //llave foranea de empleados
            $table->dateTime('fInicioTrabajo');  //fecha de inicio en la que se trabajo la merma
            $table->dateTime('fFinTrabajo');//fecha de fin en la que se trabajo la merma
            $table->float('peso', 8, 4); //peso de la merma
            $table->float('largo', 8, 4); //cantidad en metros
            $table->float('temperatura', 8, 4); //temperatura de la maquina
            $table->float('velocidad', 8, 4);  //velocidad de la maquina
            $table->string('observaciones');
            $table->string('status', 9); //disponible o terminada
            $table->float('cantidad', 8, 4); //cantidad de mermas generadas
            $table->string('tipoUnidad', 10); //millares o cientos

            $table->foreign('ribbon_id')
                ->references('id')
                ->on('ribbons');
    
            $table->foreign('bag_mesure_id')
                ->references('id')
                ->on('bag_measures');

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
        Schema::dropIfExists('waste_bags');
    }
}
