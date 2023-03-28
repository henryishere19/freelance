<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('device_type',['Android','iOS'])->default('Android');
            $table->enum('notification_type',['Android','iOS','Flutter'])->default('Flutter');
            $table->text('token')->nullable();
            $table->string('uuid')->nullable();
            $table->string('ip')->nullable();
            $table->string('os_version')->nullable();
            $table->string('model_name')->nullable();
            $table->timestamps();
            
			// $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_detail');
    }
}
