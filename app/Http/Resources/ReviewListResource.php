<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ReviewListResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request $request
	* @return array
	*/
    public function toArray($request)
    {
		
		$name 	= '';
		$image 	= '';
		$user 	= User::where('id', $this->user_id)->first();
		if($user){
			$name 	= $user->name;
			$image 	= $user->profile_image ? asset($user->profile_image) : '';
		}
		
        // return parent::toArray($request);
		return [
            'id'                => (string) $this->id,
            'name'             	=> $name ? $name : 'Uknown',
            'image'				=> $image ? $image : asset(config('constants.DEFAULT_THUMBNAIL')),
            'date'          	=> $this->created_at ? (string)$this->created_at : '',
            'rating'			=> $this->rating ? (string)$this->rating : '',
            'review'			=> $this->review ? (string)(string)$this->review : '',
        ];
    }
}