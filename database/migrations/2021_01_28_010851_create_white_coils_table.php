<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteCoilsTable extends Migration
{
    /**
     * BobinaCintilla.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_coils', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('coil_type_id')->nullable();

            $table->float('peso', 12, 4);
            $table->string('status', 10);
            $table->string('nomenclatura', 24);
            $table->string('observaciones')->nullable();
            $table->float('pesoUtilizado', 12,4);
            $table->float('costo', 12, 4);
            $table->date('fArribo');
            $table->timestamps();

            $table->foreign('provider_id')
                ->references('id')
                ->on('providers');
            
            $table->foreign('coil_type_id')
                ->references('id')
                ->on('coil_types');               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('white_coils');
    }
}
