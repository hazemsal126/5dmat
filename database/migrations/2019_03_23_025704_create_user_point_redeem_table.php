<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointRedeemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_point_redeem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->integer('voucher_id')->unsigned();
            $table
                ->foreign('voucher_id')
                ->references('id')
                ->on('vouchers');

            $table->integer('points_count');
            $table->boolean('status', true);

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
        Schema::dropIfExists('user_point_redeem');
    }
}
