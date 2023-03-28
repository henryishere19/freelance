<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casestudy extends Model
{
	protected $table = 'casestudy';
    protected $fillable = ['title','page_for','image','description','file','link','type'];
}
