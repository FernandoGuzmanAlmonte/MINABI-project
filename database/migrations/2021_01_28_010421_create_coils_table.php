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
            $table->unsignedBigInteger('coil_type_id')->nullable();
            $table->unsignedBigInteger('provider_id');

            $table->string('nomenclatura', 20);
            $table->string('status', 10);
            $table->date('fArribo');
            $table->float('pesoBruto',12 ,4);
            $table->float('pesoNeto',12 ,4)->nullable();
            $table->text('observaciones')->nullable();
            $table->float('diametroBobina',12 ,4)->nullable();
            $table->float('diametroInterno',12 ,4)->nullable();
            $table->float('diametroExterno',12 ,4)->nullable();
            $table->float('largoM',12 ,4);
            $table->float('pesoUtilizado',12 ,4)->nullable();
            $table->float('costo',12 ,4);

           /* $table->foreign('coil_type_id')
                ->references('id')
                ->on('coil_types')
                ->onDelete('set null')
                ->onUpdate('cascade');*/
                
            $table->foreign('provider_id')
                ->references('id')
                ->on('providers');
           

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
