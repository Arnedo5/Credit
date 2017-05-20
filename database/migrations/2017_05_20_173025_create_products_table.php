<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('PRDID');
            $table->integer('PRDNUM');
            $table->integer('PRDIDCATEGORY')->unsigned();
            $table->foreign('PRDIDCATEGORY')->references('PRCID')->on('product_categories');
            $table->string('PRDNAME', 30);
            $table->string('PRDDESCRIPTION', 350);
            $table->string('PRDIMG ', 300);
            $table->integer('PRDSTOCK');
            $table->decimal('PRDPRICE', 5,2);
            $table->boolean('PRDSTATUS');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
