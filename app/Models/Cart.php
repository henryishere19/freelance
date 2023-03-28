<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    
    protected $fillable = ['user_id','token','item_id','price','quantity','title','total','date','counpon_id'];

    // GET PRODUCT DETAILS
    public function product(){
        return $this->belongsTo(Product::class, 'item_id', 'id');
    }
}
