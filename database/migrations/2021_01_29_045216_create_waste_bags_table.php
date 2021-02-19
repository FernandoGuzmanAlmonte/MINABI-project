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
            $table->unsignedBigInteger('bag_mesure_id')->nullable(); //llave foranea del catalogo de la medida de la bolsa
            $table->unsignedBigInteger('employee_id')->nullable(); //llave foranea de empleados
            $table->date('fechaInicioTrabajo');  //fecha de inicio en la que se trabajo la merma
            $table->date('fechaFinTrabajo');//fecha de fin en la que se trabajo la merma
            $table->time('horaIncioTrabajo')->nullable();
            $table->time('horaFinTrabajo')->nullable();
            $table->float('peso', 10, 4); //peso de la merma
            $table->float('largo', 10, 4); //cantidad en metros
            $table->float('temperatura', 10, 4); //temperatura de la maquina
            $table->float('velocidad', 10, 4);  //velocidad de la maquina
            $table->string('observaciones')->nullable();
            $table->string('status', 15); //disponible o terminada
            $table->float('cantidad', 10, 4); //cantidad de mermas generadas
            $table->string('tipoUnidad', 10); //millares o cientos
            $table->string('nomenclatura', 15);

    
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
