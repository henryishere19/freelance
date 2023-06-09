<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleListResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    public function toArray($request)
    {
		// return parent::toArray($request);
		return [
            'id'	=> (string) $this->id,
            'title'	=> $this->title ? $this->title : '',
            'slug'	=> $this->slug ? $this->slug : '',
        ];
    }
}