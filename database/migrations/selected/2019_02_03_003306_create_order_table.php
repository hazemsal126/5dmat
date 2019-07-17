<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order');
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total');
            $table->unsignedInteger('user_id')->nullable();
            $table->integer('item_count');
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'INNODB';
        });

        Schema::table('order', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
