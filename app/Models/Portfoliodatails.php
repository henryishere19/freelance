<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfoliodatails extends Model
{
	protected $table = 'portfolio_detail';
    protected $fillable = ['port_id','image','title','description'];
}
