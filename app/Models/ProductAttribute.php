<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
	protected $table = 'product_attributes';
	
	protected $fillable = ['product_id','attribute_id'];
	
	// USER
	public function product(){
		return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}