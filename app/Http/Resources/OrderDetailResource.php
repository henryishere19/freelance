<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\OrderItem;
use App\Http\Resources\OrderItemResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		$items = OrderItem::where(['order_id'=>$this->id])->get();
		
		// return parent::toArray($request);
        return [
            'id'        		=> (string)$this->id,
            'payment_status'	=> $this->payment_status ? (string)$this->payment_status : 'Uknown',
            'item_total'		=> $this->item_total ? (string)$this->item_total : '0.00',
            'delivery_charge'	=> $this->delivery_charge ? (string)$this->delivery_charge : '0.00',
            'tax'				=> $this->tax ? (string)$this->tax : '0.00',
            'discount'			=> $this->discount ? (string)$this->discount : '0.00',
            'grand_total'		=> $this->grand_total ? (string)$this->grand_total : '0.00',
            'created_at'		=> $this->created_at ? (string)$this->created_at : '',
            'contact_person'	=> $this->contact_person ? (string)$this->contact_person : '',
            'contact_email'		=> $this->contact_email ? (string)$this->contact_email : '',
            'contact_number'	=> $this->contact_phone_number ? (string)$this->contact_phone_number : '',
            'address'			=> $this->address ? (string)$this->address : '',
			'status'			=> $this->status ? (string)$this->status: 'Uknown',
            'items'				=> $items ? OrderItemResource::collection($order_items) : [],
        ];
    }
}