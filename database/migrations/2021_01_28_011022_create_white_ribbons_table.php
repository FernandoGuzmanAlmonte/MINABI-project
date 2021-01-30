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
            $table->unsignedBigInteger('coil_id')->nullable();//se puede dejar sin nulleable o unique?
            $table->unsignedBigInteger('user_id')->nullable();

            $table->float('peso');
            $table->string('status', 9);
            $table->float('largoM');
            $table->string('nomenclatura', 20);
            $table->date('fArribo');
            $table->string('tipo', 10);

            $table->foreign('coil_id')
                ->references('id')
                ->on('coils')
                ->onDelete('set null')//?
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')//?
                ->onUpdate('cascade');
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
