<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewedItem extends Model
{
	protected $table = 'recently_viewed_items';
    protected $fillable = ['user_id','item_id','date'];
}