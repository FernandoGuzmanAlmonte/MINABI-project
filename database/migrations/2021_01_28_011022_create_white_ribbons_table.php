<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteRibbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_ribbons', function(Blueprint $table){
            $table->id();
            $table->float('peso');
            $table->string('status', 9);
            $table->float('largoM');
            $table->string('nomenclatura', 20);
            $table->date('fArribo');
            $table->string('tipo', 10);
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
