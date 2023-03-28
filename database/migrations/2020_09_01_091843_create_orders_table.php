<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('custom_order_id')->nullable();
			$table->bigInteger('owner_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('address_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('coupon_id')->length(5)->nullable();
            $table->integer('offer_id')->length(5)->nullable();
            $table->integer('item_count')->length(11)->default(0);
            $table->string('quantity')->nullable();
            $table->decimal('item_total',10,2)->default(0);
            $table->decimal('delivery_charge',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0);
            $table->decimal('discount',10,2)->default(0);
            $table->decimal('grand_total',10,2)->default(0);
			$table->integer('payment_method_id')->length(11)->nullable();
			$table->string('payment_tracking_id')->nullable();
			$table->enum('payment_status',['Pending','Received','Refund'])->default('Pending');
            $table->string('order_notes')->nullable();
            $table->string('delivery_date',21)->nullable();
            $table->enum('status',['Temporary','New','Accepted','Rejected','Preparing','Scheduled','Dispatched','Out-For-Delivery','Delivered','Completed','Canceled','Failed','Refund'])->default('Temporary');
            $table->enum('goods_received',['Yes','No'])->nullable();
            $table->timestamps();
        });
		
		// Order Items
		Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->bigInteger('item_id')->unsigned()->nullable();
			$table->string('title')->nullable();
			$table->string('image')->nullable();
            $table->tinyInteger('quantity')->length(3)->nullable();
			$table->decimal('price',10,2)->nullable();
			$table->decimal('total',10,2)->nullable();
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
        Schema::dropIfExists('orders');
		Schema::dropIfExists('orders_items');
    }
}
