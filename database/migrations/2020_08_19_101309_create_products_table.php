<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->nullable()->unsigned();
			$table->string('slug')->nullable();
			$table->integer('category_id')->length(11)->nullable();
			$table->integer('brand_id')->length(11)->nullable();
			$table->integer('priority')->length(11)->nullable();
            $table->string('image')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('offer_price',10,2)->nullable();
			$table->string('sku')->nullable();
            $table->enum('type',['simple','variable'])->default('simple');
			$table->string('rating')->nullable();
            $table->integer('total_rating')->nullable();
            $table->enum('status',['active','inactive','draft'])->default('draft');
			$table->string('seo_meta')->nullable();
			$table->string('seo_title')->nullable();
			$table->string('seo_keywords')->nullable();
			$table->string('seo_description')->nullable();
			$table->string('post_extra')->nullable();
            $table->timestamps();
        });
		
		Schema::create('products_translations', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['product_id','locale']);
			
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
