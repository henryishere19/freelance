<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Years extends Model
{
	protected $table = 'years';
    protected $fillable = ['title','content','priority','status'];
}
