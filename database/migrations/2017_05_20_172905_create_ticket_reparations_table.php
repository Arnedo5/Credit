<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_reparations', function (Blueprint $table) {
            $table->increments('TIRID');
            $table->integer('TICNUM');
            $table->string('TIRNAME', 50);
            $table->integer('TIRIDUSER')->unsigned();
            $table->foreign('TIRIDUSER')->references('USRID')->on('users');
            $table->integer('TIRIDADMINISTRATION')->unsigned();
            $table->foreign('TIRIDADMINISTRATION')->references('USRID')->on('users');
            $table->integer('TIRCATEGORY')->unsigned();
            $table->foreign('TIRCATEGORY')->references('TCCID')->on('ticket_categories');
            $table->string('TIRDESCRIPTION', 350);
            $table->string('TIRPIECE', 350);
            $table->string('TIROBJECT', 350);
            $table->string('TIRADMINMESSAGE', 350);
            $table->boolean('TIRSTATUS');
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
        Schema::dropIfExists('ticket_reparations');
    }
}
