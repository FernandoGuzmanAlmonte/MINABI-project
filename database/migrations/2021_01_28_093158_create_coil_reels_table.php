<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoilReelsTable extends Migration
{
    /**
     * Huesos de bobina
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coil_reels', function (Blueprint $table) {
            $table->id();

            $table->string('nomenclatura', 20);
            $table->float('peso', 8,4); //peso del hueso
            $table->string('observaciones');
            $table->string('fechaAlta');

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
        Schema::dropIfExists('coil_reels');
    }
}
