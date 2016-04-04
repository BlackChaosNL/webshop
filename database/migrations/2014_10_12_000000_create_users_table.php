<?php

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
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('password', 60);
            $table->integer('role')->unsigned()->default(2);
            $table->string('address')->nullable();
            $table->string('housenr')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('place')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role')->references('id')->on('Role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
