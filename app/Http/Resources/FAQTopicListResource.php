<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQTopicListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        // return parent::toArray($request);
		return [
            'id'		 	=> (string) $this->id,
            'title'		 	=> $this->title ? $this->title : '',
            'list' 			=> $this->list ? $this->list : [],
        ];
    }
}