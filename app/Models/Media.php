<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	protected $table = 'media';
	
	protected $fillable = ['title','media','reation','reation_id','size'];
	
	// PRODUCT
	public function product(){
		return $this->belongsTo(Product::class, 'reation_id', 'id');
    }
}