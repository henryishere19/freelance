<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQListResource extends JsonResource
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
            'id'			=> (string) $this->id,
            'title'			=> $this->title ? $this->title : 'Uknown',
            'description'	=> $this->description ? $this->description : '',
        ];
    }
}