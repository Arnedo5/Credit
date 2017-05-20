<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('ORDID');
            $table->integer('ORDNUM');
            $table->integer('ORDIDUSER')->unsigned();
            $table->foreign('ORDIDUSER')->references('USRID')->on('users');
            $table->decimal('ORDSUBTOTAL ',10,2);
            $table->integer('ORDIDSTEP')->unsigned();
            $table->foreign('ORDIDSTEP')->references('ORSID')->on('order_steps');
            $table->integer('ORDIDCATEGORY')->unsigned();
            $table->foreign('ORDIDCATEGORY')->references('ORCID')->on('order_categories');
            $table->integer('ORIDREPARE')->unsigned();
            $table->foreign('ORIDREPARE')->references('TIRID')->on('ticket_reparations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
