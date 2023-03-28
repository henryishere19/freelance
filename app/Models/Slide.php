<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $table = 'slides';
    protected $fillable = ['slider_id','priority','title','tagline','image','video','is_clickable','redirect_to','mobie_image','video_mobile','button_text','description','status'];
}
