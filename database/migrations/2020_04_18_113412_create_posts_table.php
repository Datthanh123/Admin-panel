<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('post_title')->nullable();
            $table->text('post_tease')->nullable();
            $table->text('post_content')->nullable();
            $table->string('post_author')->nullable();
            $table->string('post_image')->nullable();
            $table->string('post_image_dec')->nullable();
            $table->integer('cate_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
