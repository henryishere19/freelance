<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return[
        'id'        => (string) $this->id,
        'title'     => $this->title ? (string) $this->title : '',
        'image' 	=> $this->image ? asset($this->image) : asset(env("DEFAULT_IMAGE")),
      ];
    }
}
