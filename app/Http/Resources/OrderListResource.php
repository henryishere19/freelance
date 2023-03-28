<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;

class OrderListResource extends JsonResource
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
            'id'				=> (string) $this->id,
            'custom_order_id'	=> $this->custom_order_id ? (string)$this->custom_order_id : '',
            'payment_status'	=> $this->payment_status ? (string)$this->payment_status : 'Uknown',
            'item_total'		=> $this->item_total ? (string)$this->item_total : '0.00',
            'delivery_charge'	=> $this->delivery_charge ? (string)$this->delivery_charge : '0.00',
            'tax'				=> $this->tax ? (string)$this->tax : '0.00',
            'discount'			=> $this->discount ? (string)$this->discount : '0.00',
            'grand_total'		=> $this->grand_total ? (string)$this->grand_total : '0.00',
            'created_at'		=> $this->created_at ? (string)$this->created_at : '',
            'status'			=> $this->status ? (string)$this->status: 'Uknown',
            'items'				=> $items ? OrderItemResource::collection($order_items) : [],
        ];
    }
}