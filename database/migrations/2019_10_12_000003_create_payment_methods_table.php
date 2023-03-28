<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
	* Run the migrations.
	* @return void
	*/
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
			$table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
	* Reverse the migrations.
	* @return void
	*/
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}