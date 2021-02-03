<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoilProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coil_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coil_id');
            $table->unsignedBigInteger('ribbon_id')->nullable();
            $table->unsignedBigInteger('coil_reel_id')->nullable();
            $table->unsignedBigInteger('waste_ribbon_id')->nullable();
            
            $table->string('nomenclatura', 20);
            //folio
            $table->string('status', 15);
            $table->string('10', 10);// merma, rollo, hueso

            $table->foreign('coil_id')
                ->references('id')
                ->on('coils');

            $table->foreign('ribbon_id')
                ->references('id')
                ->on('ribbons');        

            $table->foreign('coil_reel_id')
                ->references('id')
                ->on('coil_reels'); 

            $table->foreign('waste_ribbon_id')
                ->references('id')
                ->on('waste_ribbons');    

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
        Schema::dropIfExists('coil_product');
    }
}
