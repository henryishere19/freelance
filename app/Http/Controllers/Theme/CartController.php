<?php
namespace App\Http\Controllers\Theme;

use App\Http\Controllers\CommonController;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage;
use Illuminate\Validation\Rule;
use App\Models\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\Cart;

class CartController extends CommonController
{   
	use CommonHelper;
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		//$this->middleware(['auth']);
	}

	/**
	* --------------------------
	* Show Cart Page.
	* @return void
	* --------------------------
	*/
	public function index(Request $request){
		try{
			$page 		= 'cartPage';
			$page_title	= trans('title.'. $page .'.page_title');
			
			$seo_data 	= [
				'seo_title' 		=> trans("title.$page.seo_title"),
				'seo_image' 		=> trans("title.$page.seo_image"),
				'seo_keywords' 		=> trans("title.$page.seo_keywords"),
				'seo_description'	=> trans("title.$page.seo_description"),
			];
			
			return view('theme.shop.cart', compact('page','page_title', 'seo_data'));
		} catch (Exception $e) {
			return redirect()->route('shopPage')->withError($e->getMessage());
		}
	}
	
	/**
	* ---------------------------
	* Show Checkout Page.
	* @return void
	* ---------------------------
	*/
	public function checkOut(Request $request){
		try{
			$page 		= 'checkOutPage';
			$page_title	= trans('title.'. $page .'.page_title');
			
			$seo_data 	= [
				'seo_title' 		=> trans("title.$page.seo_title"),
				'seo_image' 		=> trans("title.$page.seo_image"),
				'seo_keywords' 		=> trans("title.$page.seo_keywords"),
				'seo_description'	=> trans("title.$page.seo_description"),
			];
			
			return view('theme.shop.checkout', compact('page','page_title', 'seo_data'));
		} catch (Exception $e) {
			return redirect()->route('shopPage')->withError($e->getMessage());
		}
	}
	
	
	/**
	* Cart List.
	* @return void
	*/
	public function ajax_list(Request $request){
		
		$page     = $request->page ?? '1';
		$count    = $request->count ?? '100';

		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		try{
			$user	= Auth()->user();
			$query 	= Cart::select('carts.*')->join('products as t2', 't2.id', '=', 'carts.item_id');
			
			if(empty($user)){
				$query->where('token', csrf_token());
			}else{
				$query->where('user_id', $user->id);
			}
			$data  = $query->orderBy('id', 'DESC')->offset($start)->limit($count)->get();
			
			if($data->count() > 0){
				foreach($data as $key=> $list){
					$image 		= asset(config('constants.DEFAULT_IMAGE'));
					$item_id 	= '';
					$title 		= 'Unknown';

					if($list->product){ 
						if($list->product->image){ $image = asset($list->product->image); }
						$title 				= $list->product->title;
						$item_id 			= $list->product->id;
					}
					$data[$key]->image  	= $image;
					$data[$key]->item_id 	= $item_id;
					$data[$key]->title  	= $title;
				}
				
				$sub_total 							= $data->sum('total');
				$discount 							= '0.00';
				$return['count'] 	 				= $data->count();
				$return['list'] 	 				= $data;
				$return['sub_total'] 				= number_format($sub_total, 2, '.', '');
				$return['discount'] 				= $discount;
				$this->sendResponse($return, trans('cart.data_found_success'));
			}
			
			$this->sendResponse([], trans('cart.data_found_empty'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// ADDD TO CART
	public function ajax_add(Request $request){
		
		$quantity  = $request->quantity ?? 1;
		
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], trans('common.error'));
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}
		
		try{
			$return = CommonHelper::addToCart($request->item_id, $quantity, $request->clear_cart);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->ajaxError([], $return['message']);
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// UPDATE CART
	public function updateCartItem(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' 	=> 'required|numeric',
			'type'		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}
		
		try {
			$return = CommonHelper::updateCart($request->item_id, $quantity);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->ajaxError([], $return['message']);
			}
		}catch (Exception $e) {
			return $this->ajaxError([], $e->getMessage());
		}
	}
	
	// Delete Cart
	public function deleteCart(Request $request){
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}
		
		try {
			$return = CommonHelper::deleteCart($request->item_id);
			if($return['success'] == '1'){
				return $this->sendResponse([], $return['message']);
			}else{
				return $this->ajaxError([], $return['message']);
			}
		}catch (Exception $e) {
			return $this->ajaxError([], $e->getMessage());
		}
	}
	
	// Check Cart Count
	public function cartCount(Request $request){
		$user = Auth()->user();
		if(empty($user)){
			//$this->ajaxError([], trans('common.invalid_user'));
		}
		
		try{
			if(empty($user)){
				$cartData = Cart::where('token', csrf_token())->get();
			}else{
				$cartData = Cart::where('user_id', $user->id)->get();
			}
			if($cartData->count() > 0){
				$return['count'] = $cartData->count();
				$this->sendResponse($return, trans('cart.delete_success'));
			}
			
			$this->sendResponse([], trans('cart.data_found_empty'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// AJAX Checkout List
	public function ajax_checkout(Request $request){
		$user = Auth::user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
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

				$this->sendResponse(new CheckoutResource($details), trans('customer_api.data_found_success'));
			}
			$this->sendResponse([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
}