<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productvariation extends Model
{
	protected $table = 'product_variations';
	
	protected $fillable = ['product_id','variation_id','variation_group_id','price','sale_price'];
	
	// Resview USER
	public function product(){
		return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}