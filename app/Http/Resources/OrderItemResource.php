<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    
    public function toArray($request){
		
		// return parent::toArray($request);
		return [
            'id'                => (string) $this->id,
            'item_id'        	=> $this->item_id ? (string)$this->item_id : '',
            'title'             => $this->title ? (string)$this->title : 'Uknown',
            'image'             => $this->image ? $this->image : asset(config('constants.DEFAULT_THUMBNAIL')),
            'quantity'          => $this->quantity ? (string)$this->quantity : '',
            'price'             => $this->price ? (string)$this->price : '',
            'total'             => $this->total ? (string)$this->total : '',
        ];
    }
}