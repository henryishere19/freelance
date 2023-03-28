<?php

namespace App\Http\Resources;
use App\Models\City;
use App\Models\Country;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressListResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    public function toArray($request)
    {
        $city_name	= City::where(['id'=>$this->city_id])->pluck('title')->first();
		
        // return parent::toArray($request);
        return [
            'id'        		=> (string)$this->id,
            'city_id'			=> $this->city_id ? (string)$this->city_id : '',
            'city_name'			=> $city_name ? (string)$city_name : '',
            'address_type'		=> $this->address_type ? (string)$this->address_type : '',
            'address'   		=> $this->address ? (string)$this->address : '',
            'pincode'			=> $this->pincode ? (string)$this->pincode : '',
            'latitude'			=> $this->latitude ? (string)$this->latitude : '',
            'longitude'			=> $this->longitude ? (string)$this->longitude : '',
        ];
    }
}
