<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable = ['id','title','category','slug','image','post_date','author','page_title','banner_image','author_id','short_description','description','status','post_type','post_meta','post_seo_title','post_seo_keywords','post_seo_description'];

    // GET USER DETAILS
    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }
}