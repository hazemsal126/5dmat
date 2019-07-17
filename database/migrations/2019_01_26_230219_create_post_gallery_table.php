<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('image');
            $table->string('image_thumbnail');
            $table->string('image_preloader');
            $table->integer('status');
            $table->string('video');
            $table->date('createdAt');
            $table->date('updatedAt');
            $table->text('dimensions');
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
        Schema::dropIfExists('post_gallery');
    }
}
