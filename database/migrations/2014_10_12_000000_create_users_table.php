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
            $table->increments('id');
            $table->string('firstname')->nullable();;
            $table->string('lastname')->nullable();;
            $table->string('second_lastname')->nullable();;
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(1);
            $table->string('avatar')->default('public/avatars/user-default.png')->nullable();
            $table->rememberToken();

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

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
