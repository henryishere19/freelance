<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartListResource extends JsonResource
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
            'id'                => (string) $this->id,
            'item_id'        	=> (string) $this->item_id,
            'title'             => $this->product->title ? $this->product->title : '',
            'image'             => $this->product->image ? asset($this->product->image) : '',
            'quantity'          => $this->quantity ? (string)$this->quantity : '0',
            'price'             => $this->price ? (string)$this->price : '0.00',
            'price_txt'         => $this->price ? (string)$this->price : '0.00',
        ];
    }
}
