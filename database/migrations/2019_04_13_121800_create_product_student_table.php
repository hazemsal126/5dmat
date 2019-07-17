<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_student', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('product');

            $table->integer('student_id')->unsigned();
            $table
                ->foreign('student_id')
                ->references('id')
                ->on('students');
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
        Schema::dropIfExists('product_student');
    }
}
