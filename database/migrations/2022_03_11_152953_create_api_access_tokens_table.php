<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('api_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assign_with')->nullable();
            $table->string('token')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_access_tokens');
    }
}
