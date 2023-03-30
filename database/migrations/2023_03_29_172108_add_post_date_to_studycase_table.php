<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostDateToStudycaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casestudy', function (Blueprint $table) {
            $table->string('show_content')->default('');
            $table->date('post_date')->nullable();
            $table->bigInteger('services_id')->nullable();
            $table->enum('status',['active','inactive','draft']);
            $table->bigInteger('user_id')->nullable();
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
