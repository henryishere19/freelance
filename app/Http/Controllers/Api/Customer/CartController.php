<?php

namespace App\Http\Controllers\Api\Customer;

use Validator;
use DB,Settings;
use Authy\AuthyApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Http\Resources\CartResource;
use App\Http\Resources\CheckoutResource;

class CartController extends BaseController
{

	/**
	* -----------------------------------
	* CARTS
	* @return \Illuminate\Http\Response
	* -----------------------------------
	*/
	public function index(Request $request){
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}

		try{
			$cartData = Cart::where(['user_id'=>$user->id])->orderBy('id', 'DESC')->get();
			if($cartData){
				$item_total					= $cartData->sum("total");
				$delivery_charge			= '0.00';
				$text 						= '0.00';
				$discount 					= '0.00';
				$grand_total 				= $item_total + $text + $delivery_charge - $discount;

				$details					= new \stdClass();
				$details->item_count		= $cartData->count();
				$details->quantity			= $cartData->sum('quantity');
				$details->item_total		= $item_total;
				$details->delivery_charge	= $delivery_charge;
				$details->text				= $text;
				$details->discount			= $discount;
				$details->grand_total		= $grand_total;
				$details->items				= $cartData;
				$details->address			= Address::where(['user_id'=>$user->id])->get();
				$details->payment_methods 	= PaymentMethod::where(['status'=>'active'])->get();

			  return $this->sendResponse(new CheckoutResource($details), trans('customer_api.data_found_success'));
			}
			return $this->sendError([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}

	/**
	* ---------------------------------
	* ADD TO CART
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function add(Request $request){
		$quantity = $request->quantity ?? '1';
		$validator = Validator::make($request->all(), [
			'item_id' => 'required|exists:products,id',
		]);
		if($validator->fails()){
			return $this->sendError([], $validator->errors()->first());
		}
		
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}

		try {
			$return = CommonHelper::addToCart($request->item_id, $quantity, $request->clear_cart);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->sendError([], $return['message']);
			}
		}catch (Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}

	/**
	* ---------------------------------
	* UPDATE CART
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function update(Request $request){
		$quantity = $request->quantity ?? '1';
		$validator = Validator::make($request->all(), [
		  'item_id'		=> 'required|exists:products,id',
		  'quantity'    => 'required',
		]);
		if($validator->fails()){
			return $this->sendError([], $validator->errors()->first());       
		}
		
		try {
			$return = CommonHelper::updateCart($request->item_id, $quantity);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->sendError([], $return['message']);
			}
		}catch (Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}

	/**
	* ----------------------------------
	* DELETE CART
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function delete(Request $request){
		$validator = Validator::make($request->all(), [
		  'item_id'  => 'required',
		]);
		if($validator->fails()){
		  return $this->sendError([], $validator->errors()->first());       
		}
		
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}

		try {
			$return = CommonHelper::deleteCart($request->item_id);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->sendError([], $return['message']);
			}
		}catch (Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}

	/**
	* ----------------------------------
	* CHECKOUT
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function checkout(Request $request){
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}

		try{
			$cartData = Cart::where(['user_id'=>$user->id])->orderBy('id', 'DESC')->get();
			if($cartData){
				$item_total					= $cartData->sum("total");
				$delivery_charge			= '0.00';
				$text 						= '0.00';
				$discount 					= '0.00';
				$grand_total 				= $item_total + $text + $delivery_charge - $discount;

				$details					= new \stdClass();
				$details->item_count		= $cartData->count();
				$details->quantity			= $cartData->sum('quantity');
				$details->item_total		= $item_total;
				$details->delivery_charge	= $delivery_charge;
				$details->text				= $text;
				$details->discount			= $discount;
				$details->grand_total		= $grand_total;
				$details->items				= $cartData;
				$details->address			= Address::where(['user_id'=>$user->id])->get();
				$details->payment_methods 	= PaymentMethod::where(['status'=>'active'])->get();

			  return $this->sendResponse(new CheckoutResource($details), trans('customer_api.data_found_success'));
			}
			return $this->sendResponse([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}
}