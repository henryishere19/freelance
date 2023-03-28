<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price' ,10 ,2);
            $table->integer('days')->default('30');
            $table->text('comments')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
		
		// Plan Benefits
		Schema::create('subscription_plan_benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('plan_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plans');
    }
}
