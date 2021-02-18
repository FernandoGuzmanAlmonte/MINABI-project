<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteRibbonsTable extends Migration
{
    /**
     * Merma de rollos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_ribbons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('white_ribbon_id')->nullable(); //llave forante de cintilla blanca
            $table->unsignedBigInteger('employee_id')->nullable(); //llave forane de empleado que encontre la merma
            $table->string('nomenclatura', 20);
            $table->float('peso', 10, 4 ); //peso de la merma en rollo
            $table->float('largo', 10, 4); //cantidad de metros que mide la merma
            $table->string('observaciones')->nullable();
            $table->date('fechaInicioTrabajo'); //Fecha en la que se provoco la merma
            $table->date('fechaFinTrabajo');
            $table->time('horaInicioTrabajo');
            $table->string('status', 10);
            $table->time('horaFinTrabajo'); //fecha en la que se provoco la merma
            $table->float('temperatura', 10, 4)->nullable(); //temperatura a la que se encontraba la maquina
            $table->float('velocidad', 10,4)->nullable(); //velocidad a la que se estaba trabajando la maquina

                
            $table->foreign('white_ribbon_id')
                ->references('id')
                ->on('white_ribbons');

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
        Schema::dropIfExists('waste_ribbons');
    }
}
