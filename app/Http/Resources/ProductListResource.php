<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Cart;

class ProductListResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    public function toArray($request)
    {
		$user 			= Auth::guard('api')->user();
		$is_favorite 	= Favorite::where(['item_id'=>$this->id, 'user_id'=>$user ? $user->id : 0])->first();
		$count_in_cart 	= Cart::select('quantity')->where(['item_id'=>$this->id, 'user_id'=>$user ? $user->id : 0])->first();
        
		// return parent::toArray($request);
		return [
            'id'                => (string) $this->id,
            'title'             => $this->title ? $this->title : '',
            'image'             => $this->image ? asset($this->image) : asset(config('constants.DEFAULT_THUMBNAIL')),
            'owner_id'          => (string)$this->owner_id,
            'count_in_cart'     => $count_in_cart ? (string)$count_in_cart->quantity : '0',
            'is_favorite'     	=> $is_favorite ? '1' : '0',
            'quantity'          => $this->quantity ? (string)$this->quantity : '0',
            'price'             => $this->price ? (string)$this->price : '0.00',
            'status'            => $this->status,
        ];
    }
}