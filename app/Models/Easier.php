<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Easier extends Model
{
	protected $table = 'easier';
    protected $fillable = ['title','description','video','image_second','priority','image','status'];
}
