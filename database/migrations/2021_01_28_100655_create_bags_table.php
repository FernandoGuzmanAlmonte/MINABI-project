<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bags', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('ribbon_id');
            //$table->unsignedBigInteger('bag_measure_id');
            
            $table->string('nomenclatura', 24);
            $table->date('fechaInicioTrabajo');
            $table->date('fechaFinTrabajo');
            $table->time('horaInicioTrabajo');
            $table->time('horaFinTrabajo');
            $table->float('peso', 10, 4);
            $table->string('clienteStock', 10);
            $table->float('temperatura', 10, 4);
            $table->float('velocidad', 10, 4);
            $table->text('observaciones')->nullable();
            $table->string('pestania', 4);
            $table->string('status', 11);
            $table->integer('cantidad');
            //Usuario modifioc
            //Usuario Creo  
            $table->string('medida', 10);
            $table->string('tipoUnidad', 8); // si es millar o ciento

            /*$table->foreign('ribbon_id')
                ->references('id')
                ->on('ribbons');
                
            $table->foreign('bag_measure_id')
                ->references('id')
                ->on('bag_measures');
            */

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
        Schema::dropIfExists('bags');
    }
}
