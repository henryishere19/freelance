<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pressrelease extends Model
{
	protected $table = 'pressrelease';
    protected $fillable = ['title','priority','description','link','image','status'];
}
