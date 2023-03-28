<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletHistoryResource extends JsonResource
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
            'title'				=> $this->title ? $this->title : '',
            'balance'			=> $this->balance ? $this->balance : '',
            'type'				=> $this->type ? $this->type : '',
            'status'			=> $this->status ? $this->status : '',
            'date'				=> (string) date('Y-m-d', strtotime($this->created_at)),
            'time'				=> (string) date('h:i a', strtotime($this->created_at)),
        ];
    }
}