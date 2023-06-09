<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';
    
    protected $fillable = ['user_id', 'balance'];

    // GET PRODUCT DETAILS
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
