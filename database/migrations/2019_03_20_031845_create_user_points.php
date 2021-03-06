<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('order');
            $table->integer('product_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('product');
            $table->integer('amount')->unsigned();

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
        Schema::dropIfExists('user_points');
    }
}
