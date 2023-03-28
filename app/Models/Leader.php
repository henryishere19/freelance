<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
	protected $table = 'leader';
    protected $fillable = ['title','designation','priority','linkdinlink','image','status'];
}
