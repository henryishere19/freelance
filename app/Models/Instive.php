<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instive extends Model
{
	protected $table = 'intuitive';
    protected $fillable = ['title','description','video','image_second','priority','image','status'];
}
