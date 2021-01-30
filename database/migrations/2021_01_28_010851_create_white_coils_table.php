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
            $table->unsignedBigInteger('provider_id')->unique();
            $table->unsignedBigInteger('coil_type_id')->nullable();


            $table->float('peso', 8, 4);
            $table->float('largoM', 8, 4);
            $table->string('status', 9);
            $table->string('nomenclatura', 20);
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('provider_id')
                ->references('id')
                ->on('provider')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('coil_types_id')
                ->references('id')
                ->on('coil_types')
                ->onDelete('set null')
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
        Schema::dropIfExists('white_coils');
    }
}
