<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    
    protected $fillable = ['user_id', 'item_id','date'];

    // GET PRODUCT DETAILS
    public function product(){
        return $this->belongsTo(Product::class, 'item_id');
    }
}