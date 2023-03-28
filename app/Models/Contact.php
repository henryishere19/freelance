<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contact_us';
    protected $fillable = ['firstname','lastname','phone_number','email','message','updated_at','created_at'];
}
