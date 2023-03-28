<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accolades extends Model
{
	protected $table = 'accolades';
    protected $fillable = ['title','description','priority','dropbox_img','dropbox_title','status'];
}
