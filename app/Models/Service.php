<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = 'service';
    protected $fillable = ['item_position','image','title','description','page_title','home_page_title','content_title_main','priority','content_image','double_title','double_description','double_value','mobile_banner','content_title','title_migration','imapact_title','maincontentdescription','innovation_title','title_migration','slug','banner_image','content','innovation','migration','impact','meta_title','seo_keywords','meta_description','status'];
}
