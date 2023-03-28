<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlan extends Model
{
	use SoftDeletes;
	
	protected $table = 'subscription_plans';
	
	protected $guarded = [];
	
	//protected $fillable = ['title'];
}