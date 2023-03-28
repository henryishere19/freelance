<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APIAccessToken extends Model
{
	protected $table = 'api_access_tokens';
    
	protected $guarded = [];
}
