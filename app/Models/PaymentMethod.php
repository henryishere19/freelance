<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
	protected $fillable = ['title', 'slug','description','image', 'icon', 'status'];
}