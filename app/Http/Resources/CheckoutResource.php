<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartListResource;
use App\Http\Resources\CartItemListResource;
use App\Http\Resources\PaymentMethodListResource;

class CheckoutResource extends JsonResource
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
            'item_count'        => $this->item_count ? (string) $this->item_count : '0',
            'quantity'			=> $this->item_count ? (string) $this->quantity : '0',
            'item_total'      	=> $this->item_total ? (string)$this->item_total : '0.00',
            'delivery_charge'	=> $this->delivery_charge ? (string)$this->delivery_charge : '0.00',
            'text'				=> $this->text ? (string)$this->text : '0.00',
            'discount'			=> $this->discount ? (string)$this->discount : '0.00',
            'grand_total'		=> $this->grand_total ? (string)$this->grand_total : '0.00',
            'items'             => CartItemListResource::collection($this->items),
            'address'           => $this->address ? AddressListResource::collection($this->address) : [],
            'payment_methods'   => $this->payment_methods ? PaymentMethodListResource::collection($this->payment_methods) : [],
        ];
    }
}