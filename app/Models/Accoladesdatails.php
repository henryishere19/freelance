<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accoladesdatails extends Model
{
	protected $table = 'accolades_details';
    protected $fillable = ['acc_id','image','title'];
}
