<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    
    protected $table = 'countries';

    protected $fillable = [
  		'title','iso_code','calling_code','currency','currency_code','currency_symbol','slug','status',
    ];
}
