<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlanBenefit extends Model
{
	use SoftDeletes;
	
	protected $table = 'subscription_plan_benefits';
	
	protected $guarded = [];
	
	//protected $fillable = ['title'];
}