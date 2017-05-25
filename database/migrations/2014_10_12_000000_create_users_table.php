<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('USRID');
            $table->integer('USRNUM');
            $table->enum('USRTYPE', ['user', 'admin']);
            $table->string('USRLOGIN', 50)->unique();
            $table->string('USRNAME', 50);
            $table->string('USRLASTNAME', 100);
            $table->string('USRMAIL')->unique();
            $table->string('USRPASSWORD');
            $table->string('USRCITY', 50);
            $table->string('USRDIRECTION', 100);
            $table->string('USRPOSTAL', 5);
            $table->string('USRDESCRIPTION', 350);
            $table->string('USRIMG', 300);
            $table->integer('USRIMG');
            $table->boolean('USRSTATUS');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
