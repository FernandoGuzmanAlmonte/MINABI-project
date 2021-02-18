<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRibbonsTable extends Migration
{
    /**
     * Tabla de rollos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ribbons', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('coil_product_id'); //llave fonarea de producto bobina
            $table->unsignedBigInteger('white_ribbon_id'); //llave foranea de cintilla blanca
            $table->unsignedBigInteger('employee_id'); //llave foranea de empleados
            $table->string('nomenclatura', 20); //identificador
            $table->float('peso', 10, 4); //peso del rollo
            $table->float('largo', 10, 4); //metros de largo del rollo
            $table->text('observaciones')->nullable();
            $table->date('fechaInicioTrabajo'); //fecha en que se inicio a crear el rollo
            $table->date('fechaFinTrabajo')->nullable(); //fecha en la que termino de crear el rollo
            $table->time('horaInicioTrabajo'); 
            $table->time('horaFinTrabajo')->nullable();
            //Usuario creo
            //Usuario modifico
            /*tipo*/
            $table->float('temperatura', 10, 4); //temperatura de la maquina
            $table->float('velocidad', 10, 4); //velocidad de la maquina
            $table->string('status', 10); //disponible o terminado
            $table->float('pesoUtilizado', 8, 4);//peso que se ha comprado en bolsas relacionadas

           // $table->foreign('coil_product_id')
           //     ->references('id')
           //     ->on('coils_products');
            
          /*  $table->foreign('white_ribbon_id')
                ->references('id')
                ->on('white_ribbons');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees'); */   

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
        Schema::dropIfExists('ribbons');
    }
}
