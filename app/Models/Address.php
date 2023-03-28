<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses';
    
	protected $guarded = [];
	
    /**
     * @return mixed
	*/
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}