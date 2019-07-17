<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('product', function (Blueprint $table) {
        //     $table->integer('gift_type')->unsigned();
        //     $table
        //         ->foreign('gift_type')
        //         ->references('id')
        //         ->on('gift_types');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('gift_type');
        });
    }
}
