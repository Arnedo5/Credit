<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_steps', function (Blueprint $table) {
            $table->increments('ORSID');
            $table->integer('ORSNUM');
            $table->integer('ORSSTEP');
            $table->string('ORSNAME', 50);
            $table->string('ORSDESCRIPTION', 350);
            $table->string('ORSIMG', 300);
            $table->boolean('ORSSTATUS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_steps');
    }
}
