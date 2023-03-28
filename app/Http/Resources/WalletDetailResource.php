<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletDetailResource extends JsonResource
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
            'balance'			=> $this->balance ? $this->balance : '0',
            'history'			=> $this->history ? $this->history : [],
        ];
    }
}