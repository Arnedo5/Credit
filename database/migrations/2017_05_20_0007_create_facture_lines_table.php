<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactureLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_lines', function (Blueprint $table) {
            $table->increments('FCLID');
            $table->integer('FCLNUM');
            $table->decimal('FCLPRICE',5,2);
            $table->integer('FCLQUANTITY');
            $table->integer('FCLIDPRODUCT')->unsigned();
            $table->foreign('FCLIDPRODUCT')->references('PRDID')->on('products');
            $table->integer('FCLIDORDER')->unsigned();
            $table->foreign('FCLIDORDER')->references('ORDID')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture_lines');
    }
}
