<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WhiteCoils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whiteCoils', function(Blueprint $table){
            $table->id();
            $table->float('peso', 8, 4);
            $table->float('largoM', 8, 4);
            $table->string('status', 9);
            $table->string('nomenclatura', 20);
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
        Schema::dropIfExists('whiteCoils');
    }
}
