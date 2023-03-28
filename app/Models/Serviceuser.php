<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serviceuser extends Model
{
	protected $table = 'service_user';
    protected $fillable = ['name','number','email','message','service'];
}
