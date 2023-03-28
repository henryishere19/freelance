<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Http\Resources\ReviewListResource;
use App\Http\Resources\ProductListResource;

class ProductResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
    public function toArray($request)
    {
		$user				 = Auth::guard('api')->user();
		$count_in_cart 		 = Cart::select('quantity')->where(['product_id'=>$this->id, 'user_id'=>$user ? $user->id : 0])->first();
        $recommended_product = Product::whereNotIn('id',[$this->id])->limit(5)->get();
        $reviews 			 = Review::where('item_id',$this->id)->limit(50)->get();
        
        // return parent::toArray($request);
		return [
            'id'                => (string) $this->id,
            'title'             => $this->title ? $this->title : '',
            'image'             => $this->image ? asset($this->image) : '',
            'owner_id'          => (string)$this->owner_id,
            'count_in_cart'     => $count_in_cart ? (string)$count_in_cart->quantity : '0',
            'quantity'          => $this->quantity ? (string)$this->quantity : '0',
            'price'             => $this->price ? (string)$this->price : '0.00',
            'is_discount'		=> $this->is_discount ? (string)$this->is_discount : '0',
            'discount_price'	=> $this->price ? (string)$this->price : '0.00',
            'discount_label'	=> $this->discount_label ? (string)$this->discount_label : '',
            'description'       => $this->description ? (string)strip_tags($this->description) : '',
            'status'            => $this->status,
            'reviews'           => $reviews ? ReviewListResource::collection($reviews)  : [],
            'recommended_product'=> $recommended_product ? ProductListResource::collection($recommended_product)  : [],
        ];
    }
}
