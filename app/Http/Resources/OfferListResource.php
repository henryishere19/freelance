<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OfferListResource extends JsonResource
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
            'id'                    => (string) $this->id,
            'image'                 => $this->image ? asset($this->image) : asset(config('DEFAULT_IMAGE')),
            'title'            		=> $this->title ? $this->title : '',
            'code'            		=> $this->code ? $this->code : '',
            'description'			=> $this->description ? $this->description : '',
            'discount'				=> $this->discount ? $this->discount : '',
            'discount_type'			=> $this->discount_type ? $this->discount_type : '',
            'start_date'			=> $this->start_date ? $this->start_date : '',
            'end_date'				=> $this->start_date ? $this->end_date : '',
            'status'                => $this->status,
        ];
    }
}