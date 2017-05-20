<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('TICID');
            $table->integer('TICNUM');
            $table->integer('TICCATEGORY')->unsigned();
            $table->foreign('TICCATEGORY')->references('TCCID')->on('ticket_categories');
            $table->integer('TICIDORDER')->unsigned();
            $table->foreign('TICIDORDER')->references('ORDID')->on('orders');
            $table->integer('TICIDUSER')->unsigned();
            $table->foreign('TICIDUSER')->references('USRID')->on('users');
            $table->integer('TICIDADMINISTRATOR')->unsigned();
            $table->foreign('TICIDADMINISTRATOR')->references('USRID')->on('users');
            $table->string('TICNAME', 50);
            $table->string('TICDESCRIPTION', 350);
            $table->string('TICADMINMESSAGE', 350);
            $table->boolean('TICSTATUS');
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
        Schema::dropIfExists('tickets');
    }
}
