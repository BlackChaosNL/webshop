<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('category');
            $table->string('small_desc', 200);
            $table->string('large_desc', 255);
            $table->string('small_pic');
            $table->string('large_pic');
            $table->decimal('price');
            $table->timestamps();
            $table->foreign('category')->references('cat_name')->on('Category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Product');
    }
}
