<?php

namespace App\Http\Resources;
use App\Models\UserInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		$userinfi_uodate = UserInfo::where('user_id',$this->id)->first();
		
        // return parent::toArray($request);
        return [
            'id'            		=> (string)$this->id,
            'profile_image'			=> $this->profile_image ? (string) asset($this->profile_image) : asset(config('constants.DEFAULT_THUMBNAIL')),
            'name'          		=> (string)$this->name,
            'relation'				=> $this->relation ? $this->relation : '',
            'email'         		=> $this->email ? (string)$this->email : '',
            'country_code'  		=> $this->country_code ? (string)$this->country_code : '+91',
            'phone_number'  		=> $this->phone_number ? (string)$this->phone_number : '',
            //'gender'        		=> $this->gender ? (string)$this->gender : '',
            'activity'				=> $this->activity ? (string)$this->activity : '',
            'dob'           		=> $this->dob ? date('Y-m-d', strtotime($this->dob)) : '',
            'age'           		=> $this->dob ? (string)(date('Y') - date('Y',strtotime($this->dob))) : '',
			'height'  				=> isset($userinfi_uodate->height )? $userinfi_uodate->height : '',
            'weight'  				=> isset($userinfi_uodate->weight) ? $userinfi_uodate->weight : '',
        ];
    }
}