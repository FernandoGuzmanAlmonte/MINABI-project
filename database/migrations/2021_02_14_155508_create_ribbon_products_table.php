<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRibbonProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ribbon_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ribbon_id');
            $table->unsignedBigInteger('ribbon_product_id');
            $table->string('ribbon_product_type');
            
            $table->string('nomenclatura', 20);
            
            $table->string('status', 15);
            $table->date('fAdquisicion');

            $table->foreign('ribbon_id')
                ->references('id')
                ->on('ribbons')
                ->onDelete('cascade');


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
        Schema::dropIfExists('ribbon_products');
    }
}
