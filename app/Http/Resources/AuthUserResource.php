<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Helpers\CommonHelper;

class AuthUserResource extends JsonResource
{
    /**
	* Transform the resource into an array
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'token'            		=> $this->token ? (string)$this->token : '',
            'id'            		=> (string)$this->id,
            'profile_image'			=> $this->profile_image ? (string) asset($this->profile_image) : asset(config('constants.DEFAULT_THUMBNAIL')),
            'name'          		=> (string)CommonHelper::decryptData($this->name),
            'email'         		=> (string)CommonHelper::decryptData($this->email),
            'country_code'  		=> $this->country_code ? (string)$this->country_code : '',
            'phone_number'  		=> $this->phone_number ? (string)CommonHelper::decryptData($this->phone_number) : '',
            'gender'        		=> $this->gender ? (string)CommonHelper::decryptData($this->gender) : '',
            'dob'           		=> $this->dob ? date('Y-m-d', strtotime(CommonHelper::decryptData($this->dob))) : '',
            'user_type'  			=> $this->user_type ? (string)$this->user_type : '',
            'status'        		=> (string)$this->status,
        ];
    }
}