<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $table = 'section';
    protected $fillable = ['title','description','video','page','priority','image_second','mobile_video','image','link','status'];
}
