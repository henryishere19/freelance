<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    
    protected $fillable = ['user_id', 'item_id'];

    // GET USER DETAILS
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
	
	// GET PRODUCT DETAILS
    public function product(){
        return $this->belongsTo(Product::class, 'item_id');
    }
}