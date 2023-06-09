<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
	* Run the migrations.
	* @return void
	*/
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title')->nullable();
			$table->string('slug')->nullable();
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
        Schema::dropIfExists('modules');
    }
}