<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteRibbonsTable extends Migration
{
    /**
     * Cintilla
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_ribbons', function(Blueprint $table){
            $table->id();

            //idBobina con CintillaRollo???

            $table->float('peso', 12, 4);
            $table->float('pesoUtilizado', 12, 4);
            $table->string('status', 10);
            $table->float('largo', 12, 4);
            $table->string('nomenclatura', 24);
            $table->date('fArribo');
            $table->string('observaciones')->nullable();

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
        Schema::dropIfExists('white_ribbons');
    }
}
