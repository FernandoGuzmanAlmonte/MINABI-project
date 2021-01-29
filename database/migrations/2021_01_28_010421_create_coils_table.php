<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coils', function(Blueprint $table){
            $table->id();
            $table->string('nomenclatura', 20);
            $table->string('status', 9);
            $table->date('fArribo');
            $table->float('pesoBruto',8 ,4);
            $table->float('pesoNeto',8 ,4)->nullable();
            $table->string('Observaciones',8 ,4)->nullable();
            $table->float('diametroBobina',8 ,4)->nullable();
            $table->float('diametroInterno',8 ,4)->nullable();
            $table->float('diametroExterno',8 ,4)->nullable();
            $table->float('largoM',8 ,4);
            $table->float('pesoUtilizado',8 ,4)->nullable();
            $table->float('costo',8 ,4);
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
        Schema::dropIfExists('coils');
    }
}
