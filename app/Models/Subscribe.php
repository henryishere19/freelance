<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'mail_subscribe';
    
    protected $fillable = ['id','email','updated_at','created_at'];

}
