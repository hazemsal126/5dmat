<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('user_points', function (Blueprint $table) {
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

            $table->integer('voucher_id')->unsigned();
            $table
                ->foreign('voucher_id')
                ->references('id')
                ->on('vouchers');

            $table->integer('amount')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
