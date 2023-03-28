<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lifeatinstetive extends Model
{
	protected $table = 'lifeatinstetive';
    protected $fillable = ['title','description','status','priority'];
}
