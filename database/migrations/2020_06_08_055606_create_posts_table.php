<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['draft','active','inactive'])->default('active');
			$table->string('post_type')->default('blog');
			$table->string('post_meta')->nullable();
			$table->string('post_seo_title')->nullable();
			$table->string('post_seo_keywords')->nullable();
			$table->string('post_seo_description')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
