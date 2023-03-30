<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostAuthorToCasestudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casestudy', function (Blueprint $table) {
            $table->longText('short_description')->nullable();
            $table->string('post_author')->default('');
            $table->string('image_header')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casestudy', function (Blueprint $table) {
            //
        });
    }
}
