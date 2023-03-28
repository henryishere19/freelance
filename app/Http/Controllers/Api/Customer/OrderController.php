<?php

namespace App\Http\Controllers\Api\Customer;

use DB,Auth,AuthyApi,Validator,Settings;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\BaseController;
use App\Models\Helpers\CommonHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Cart;

use App\Http\Resources\MyOrderListResource;
use App\Http\Resources\OrderDetailResource;

class OrderController extends BaseController
{
	use CommonHelper;
	
	/**
	* ----------------------------------
	* CREATE ORDER
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function create(Request $request){
		$validator = Validator::make($request->all(), [
            'address_id'		=> 'required|exists:addresses,id',
            'payment_method_id'	=> 'required',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());
        }
		
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}
		
		try{
			$return = CommonHelper::createOrder($request->address_id, $request->payment_method_id, $request->order_notes);
			if($return['success'] == '1'){
				return $this->sendResponse($return, $return['message']);
			}else{
				return $this->sendError([], $return['message']);
			}
		}catch (\Exception $e) {
			return $this->sendError([], $e->getMessage());
		}
	}

	/**
	* ----------------------------------
	* ORDER LIST
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function orders(Request $request){
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}
		
		try{
			$query = Order::where('status','!=', 'Temporary')->where('user_id',$user->id);
			
			if($request->status){
				$query->where('status', $request->status);
			}
			
			$data = $query->orderBy('id','DESC')->get();
			if(count($data) > 0){
				return $this->sendArrayResponse(MyOrderListResource::collection($data),trans('customer_api.data_found_success'));
			}
			return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));

		}catch (\Exception $e) { 
			return $this->sendError([], $e->getMessage()); 
		}
	}

	/**
	* ----------------------------------
	* ORDER DETAILS
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function details($id = ''){
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.unauthorized_access'));
		}

		try{
			// Get Data
			$return = Order::where(['id'=>$id, 'user_id'=>$user->id])->first();
			if($return){
				return $this->sendResponse(new OrderDetailResource($return), trans('customer_api.data_found_success'));
			}
			return $this->sendResponse('', trans('customer_api.data_found_empty'));
		}catch (\Exception $e) { 
			return $this->sendError('', $e->getMessage()); 
		}
	}
}