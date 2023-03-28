<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\Storage;
use DB,Auth;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Setting;
use App\Models\OTPVerification;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Models\Wishlist;
use App\Models\RecentlyViewedItem;


trait CommonHelper
{
    //public variables
    public $media_path = 'uploads/';
	
    
	/**
	* GET Directory
	*/
	public function get_upload_directory($folder = ''){
	    $year 	= date("Y");
		$month 	= date("m");
		$folder = $folder ? $folder . '/' : '';
		
		$media_path1 = public_path($this->media_path . $folder . $year.'/');
		$media_path2 = public_path($this->media_path . $folder . $year .'/'. $month.'/');
		$media_path3 = $this->media_path . $folder . $year .'/'. $month.'/';
		
		if(!is_dir($media_path1)){
			mkdir($media_path1, 0755, true);
		}
		if(!is_dir($media_path2)){
			mkdir($media_path2, 0755, true);
		}
		return $media_path3;
	}
	
	/**
	* Save different type of media into different folders
	*/
	public function saveMedia($file, $folder = '',  $type = '', $width = '', $height = ''){
		
		if(empty($file)){ return; }
		
		$upload_directory 	= $this->get_upload_directory($folder);
		$name 				= md5($file->getClientOriginalName() . time() . rand());
		// $extension 			= $file->getClientOriginalExtension();
        $extension          = $file->guessExtension();
		$fullname 			= $name . '.' . $extension;
		$thumbnail 			= $name .'150X150.'. $extension;
		
		// CREATE THUMBNAIL IMAGE
		// $img = Image::make(public_path($fullname))->resize(150, 150)->insert(public_path($thumbnail));
		
        if($type == ''){
			$file->move(public_path($upload_directory),$fullname);
            return $upload_directory . $fullname;
        } else if($type == 'image'){
            DB::beginTransaction();
            try{
                $path = Storage::disk('s3')->put('images/originals', $file,'public');
                DB::commit();
                return $path;
            } catch(\Exception $e){
                DB::rollback();
                $path = '-';
                return $path;
            } 
        } else {
            return false;
        }
    }
	
		// VALIDATE PHONE NUMBER
	public static function validate_phoneNumber($country_code = '+91', $phone_no = ""){
		if(empty($country_code)){ return; }
		if(empty($phone_no)){ return; }
		
		$number = str_replace(' ', '', $phone_no);
		$first_number = substr($number, 0, 1); 
		if ($first_number == 0) {
		  $number = substr($number, 1, 999); 
		}
		return $result = preg_replace("/^\+?{$country_code}/", '',$number);
	}
	
	// ENCRYPT DATA
	public static function encryptData($data){
		if(empty($data)){ return; }
		
		if(Setting::get('is_encrypt_decrypt') == 0){
			return $data;
		}
		
		try {
			return openssl_encrypt($data, config('constants.ENCRYPTION_TYPE'), config('constants.ENCRYPTION_KEY'), 0, config('constants.ENCRYPTION_IV'));
		} catch (Exception $e) {
			return false;
		}
	}
	
	// DECRYPT DATA
	public static function decryptData($data){
		if(empty($data)){ return; }
		
		if(Setting::get('is_encrypt_decrypt') == 0){
			return $data;
		}
		
		try {
			return openssl_decrypt($data, config('constants.ENCRYPTION_TYPE'), config('constants.ENCRYPTION_KEY'), 0, config('constants.ENCRYPTION_IV'));
		} catch (Exception $e) {
			return false;
		}
	}

	// ADD TO WISHLIST
	public function addToWishlist($item_id = ''){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($item_id)){
			$response['message'] = 'Invalid item';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}
   
		// EMPTY CART
		// if($clear_cart == 1){
		// 	Wishlist::where('user_id', $user->id)->delete();
		// }

		$checkinINcart = Wishlist::where(['item_id'=>$item_id, 'user_id'=>$user->id])->first();
		if(!empty($checkinINcart)){
			$response['message'] = trans('customer_api.item_already_in_wishlist');
			return $response;
		}

		DB::beginTransaction();
		try {
			$product = Product::where(['id'=> $item_id, 'status'=>'active'])->first();
			if($product){
				$data = array(
					'item_id'	=> $product->id,
					'user_id'	=> $user->id,
					'title'		=> $product->title,
					'price'		=> $product->price,
					'date'		=> date('Y-m-d'),
				);
				$query = Wishlist::create($data);
				if($query){
					DB::commit();
					$response['success'] = '1';
					$response['message'] = trans('customer_api.data_added_success');
					return $response;
				}else{
					DB::rollback();
					$response['message'] = trans('customer_api.data_added_error');
				}
			}
			DB::rollback();
			return $response;
		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}

	// WISHLIST DELETE

	public function deleteWishlist($item_id = ''){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($item_id)){ 
			$response['message'] = 'Invalid item';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}

		DB::beginTransaction();
		try {
      
			$cartItem = Wishlist::where(['id'=>$item_id, 'user_id'=>$user->id])->first();
			if($cartItem){
				if(Wishlist::where(['id'=>$item_id, 'user_id'=>$user->id])->delete()){
					DB::commit();
					$response['success'] = '1';
					$response['message'] = trans('customer_api.data_delete_success');
					return $response;
				}
				DB::rollback();
				$response['message'] = trans('customer_api.data_delete_failed');
				return $response;
			}
			DB::rollback();
			$response['message'] = trans('customer_api.invalid_item');
			return $response;

		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}
	
	// ADD TO CART
	public function addToCart($item_id = '', $quantity = '1', $clear_cart = ''){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($item_id)){
			$response['message'] = 'Invalid item';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}
   
		// EMPTY CART
		if($clear_cart == 1){
			Cart::where('user_id', $user->id)->delete();
		}

		$checkinINcart = Cart::where(['item_id'=>$item_id, 'user_id'=>$user->id])->first();
		if(!empty($checkinINcart)){
			$response['message'] = trans('customer_api.item_already_in_cart');
			return $response;
		}

		DB::beginTransaction();
		try {
			$product = Product::where(['id'=> $item_id, 'status'=>'active'])->first();
			if($product){
				$data = array(
					'item_id'	=> $product->id,
					'user_id'	=> $user->id,
					'title'		=> $product->title,
					'quantity'	=> $quantity,
					'price'		=> $product->price,
					'total'		=> $product->price * $quantity,
					'date'		=> date('Y-m-d'),
				);
				$query = Cart::create($data);
				if($query){
					DB::commit();
					$response['success'] = '1';
					$response['message'] = trans('customer_api.data_added_success');
					return $response;
				}else{
					DB::rollback();
					$response['message'] = trans('customer_api.data_added_error');
				}
			}
			DB::rollback();
			return $response;
		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}
	
	// UPDATE CART
	public function updateCart($item_id = '', $quantity = '1'){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($item_id)){
			$response['message'] = 'Invalid item';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}

		DB::beginTransaction();
		try {
			$product = Product::where(['id'=> $item_id, 'status'=>'active'])->first();
			if(empty($product)){
				$response['message'] = 'Invalid product';
				return $response;
			}
		
			$cartItem = Cart::where(['item_id'=>$item_id, 'user_id'=>$user->id])->first();
			if($cartItem){
				$data = array(
					'quantity'	=> $quantity,
					'price'		=> $product->price,
					'total'		=> $product->price * $quantity,
				);
				$query = Cart::where(['item_id'=>$item_id, 'user_id'=>$user->id])->update($data);
				if($query){
					DB::commit();
					$response['success'] = '1';
					$response['message'] = trans('customer_api.data_update_success');
					return $response;
				}else{
					DB::rollback();
					$response['message'] = trans('customer_api.data_update_error');
					return $response;
				}
			}
			DB::rollback();
			$response['message'] = trans('customer_api.invalid_item');
			return $response;

		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}
	
	// DELETE CART
	public function deleteCart($item_id = ''){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($item_id)){ 
			$response['message'] = 'Invalid item';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}

		DB::beginTransaction();
		try {
      
			$cartItem = Cart::where(['id'=>$item_id, 'user_id'=>$user->id])->first();
			if($cartItem){
				if(Cart::where(['id'=>$item_id, 'user_id'=>$user->id])->delete()){
					DB::commit();
					$response['success'] = '1';
					$response['message'] = trans('customer_api.data_delete_success');
					return $response;
				}
				DB::rollback();
				$response['message'] = trans('customer_api.data_delete_failed');
				return $response;
			}
			DB::rollback();
			$response['message'] = trans('customer_api.invalid_item');
			return $response;

		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}
	
	// CREATE ORDER
	public function createOrder($address_id = '', $payment_method_id = '', $order_notes = ''){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($address_id)){
			$response['message'] = 'Invalid address';
			return $response;
		}
		else if(empty($payment_method_id)){
			$response['message'] = 'Invalid payment method';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}

		DB::beginTransaction();
		try {
			// Address Validate
			$address = Address::where(['id'=>$address_id, 'user_id'=>$user->id])->first();
			if(empty($address)){
				$response['message'] = trans('customer_api.invalid_address');
				return $response;
			}
			
			// GET DATA FROM THE CART
			$cartData = Cart::where(['user_id'=>$user->id])->orderBy('id', 'DESC')->get();
			if($cartData->count() > 0){
				// Time Checking
				if(date('H') < 10){
					//return $this->sendError([], trans('common.working_hours_error_message'));
				}
				if(date('H') >= 23){
					//return $this->sendError([], trans('common.working_hours_error_message'));
				}
				
				$custom_order_id			= '#'.time();
				$address					= $address->address .' '. $address->city->name .' '. $address->postal_code;
				$item_total					= $cartData->sum("total");
				$delivery_charge			= '0.00';
				$tax 						= '0.00';
				$discount 					= '0.00';
				$grand_total 				= $item_total + $tax + $delivery_charge - $discount;
				
				$data['custom_order_id']	= $custom_order_id;
				$data['user_id']			= $user->id;
				$data['owner_id']			= $cartData['0']->owner_id;
				$data['contact_person']		= $user->name;
				$data['contact_email']		= $user->email;
				$data['contact_number']		= $user->phone_number;
				$data['address_id']			= $address_id;
				$data['address']			= $address;
				$data['item_count']			= $cartData->count();
				$data['quantity']			= $cartData->sum('quantity');
				$data['item_total']			= $item_total;
				$data['delivery_charge']	= $delivery_charge;
				$data['tax']				= $tax;
				$data['discount']			= $discount;
				$data['grand_total']		= $grand_total;
				$data['payment_method_id']	= $payment_method_id;
				$data['order_notes']		= $order_notes;
				
				$insert = Order::create($data);
				if($insert){
					if($insert->id){
						foreach($cartData as $key=> $list){
							// validate Items
							$product = Product::where(['id'=> $list->item_id, 'status'=>'active'])->first();
							if(empty($product)){
								$response['message'] = trans('customer_api.invalid_item');
								return $response;
							}

							$orderItems = array(
							  'order_id'   		=> $insert->id,
							  'item_id' 		=> $list->item_id,
							  'title'   		=> $product->title,
							  'image'   		=> $product->image,
							  'quantity'		=> $list->quantity,
							  'price'     		=> $list->price,
							  'total'     		=> $list->price * $list->quantity,
							);
							OrderItem::create($orderItems);
						}

						// FINALIZE ORDER NOW
						if($payment_method_id == 1){
							CommonHelper::order_finalization($insert->id, $user);
							DB::commit();
							$response['succcess'] = '1';
							$response['message'] = trans('order.confirm_success');
							return $response;
						}else{
							// CREATE PAYMENT ORDER
							$paymentData = [
								'amount'=>$insert->grand_total * 100,
								'currency'=>'INR',
								//'receipt'=>$user->name,
								'expire_by'=>strtotime ( '+1 month' , strtotime (date("Y-m-d"))),
								'reference_id'=>$custom_order_id,
								'description'=>'Payment for order no. '. $custom_order_id,
								'customer'=>['name'=>CommonHelper::decryptData($user->name), 'contact'=>CommonHelper::decryptData($user->phone_number), 'email'=>CommonHelper::decryptData($user->email)],
								'notify'=>['sms'=>true, 'email'=>true],
								'callback_url'=>url('verifyPayment/'. $insert->id),
								'callback_method'=>'get'
							];
							$return = CommonHelper::gateway_create_order($paymentData);
							if($return){
								if(isset($return['short_url'])){
									$insert->payment_tracking_id = $return['id'];
									$insert->update();
									DB::commit();
									$response['success'] 	 = '1';
									$response['payment_url'] = $return['short_url'];
									$response['message'] 	 = trans('order.confirm_success');
									return $response;
								}
							}
						}
					}
				}
				DB::rollback();
				$response['message'] = trans('customer_api.failed_to_create_order');
				return $response;
			}
			DB::rollback();
			$response['message'] = trans('customer_api.nothing_to_order');
			return $response;
		}catch (Exception $e) {
			DB::rollback();
			return $response;
		}
	}

    // CREATE PAYMENT ORDER
    public static function gateway_create_order($data = array())
    {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payment_links');
		curl_setopt($ch, CURLOPT_USERPWD, config('constants.GATEWAY_KEY') . ':' . config('constants.GATEWAY_VALUE'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 80);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
		$posts_result = json_decode(curl_exec($ch), TRUE);
        curl_close($ch);
        return $posts_result;
    }


    // VERIFY PAYMENT ORDER
    public static function verify_order($data = array())
    {
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL, '');
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 80);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
		$posts_result = json_decode(curl_exec($ch), TRUE);
        curl_close($ch);
        return $posts_result;
    }
	
	// After Verify Order Run this Function
	public static function order_finalization($order_id = 0, $user = []){
		
		$payment_method	= 'Cash';
		$templateItems 	= [];
		
		DB::beginTransaction();
        try {
			// GET ORDER DATA
			$order = Order::where(['id'=>$order_id])->first();
			if($order){
				// Delete existing cart
				Cart::where(['user_id'=>$user->id])->delete();

				$order->status = 'New';
				$query = $order->update();
				if($query){
					DB::commit();
					
					// send SMS
					//$message = trans('customer_api.dear'). ' '. $user->name .',\r\n '. trans('customer_api.your_order_has_been_successfully_created') .'\r\n'. trans('customer_api.thank_you_for_choosing_amen_inch');
					//CommonHelper::sendMessage($user->country_code. $user->phone_number, $message);
					
					// Send Push Notification
					//$message = trans('customer_api.you_have_new_order_from_customer') .' '. $user->name;
					//$restaurant = User::where('id', $order_data->owner_id)->first();
					//CommonHelper::send_notification($restaurant, 'New Order', $message, '1', $order_id, $order_data);
					
					// send Mail
					$template_data 						= new \stdClass();
					$template_data->user				= $user;
					$template_data->name				= $user->name;
					$template_data->custom_order_id		= $order->custom_order_id;
					$template_data->address				= $order->address;
					$template_data->total				= $order->total;
					$template_data->delivery_charge		= $order->delivery_charge;
					$template_data->tax					= $order->tax;
					$template_data->item_total			= $order->item_total;
					$template_data->discount			= $order->discount;
					$template_data->grand_total			= $order->grand_total;
					$template_data->payment_method 		= $payment_method;
					$template_data->items 				= OrderItem::where(['order_id'=>$order->id])->get();
					CommonHelper::sendMail($user->email, 'Order created Successfully', 'email-templates.create-order-customer', $template_data);
				}
			}
		}catch (Exception $e) {
            DB::rollback();
            return;
        }
	}
	
	// UPDATE ORDER
	public function updateOrder($order = '', $data = []){
		$response['success'] = '0';
		$response['message'] = 'Try again';
		
		if(empty($order)){
			$response['message'] = 'Invalid order';
			return $response;
		}
		else if(empty($data)){
			$response['message'] = 'Invalid data';
			return $response;
		}
		
		$user = Auth::user();
		if(empty($user)){
			$response['message'] = 'Invalid user';
			return $response;
		}
		
		if(isset($data['status'])){
			if($data['status'] == 'Accepted'){
				//
			}
		}
		DB::beginTransaction();
        try {
			$query = Order::where(['id'=>$order->id])->update($data);
			if($query){
				DB::commit();
				$response['success'] = '1';
				$response['message'] = trans('customer_api.data_update_success');
				return $response;
			}else{
				DB::rollback();
				$response['message'] = trans('customer_api.data_update_error');
				return $response;
			}
		}catch (Exception $e) {
            DB::rollback();
            return;
        }
	}
	
	// Store Viewed Item
	public static function saveViewedItem($user_id = '', $item_id = ''){
		if(empty($user_id)){return;}
		if(empty($item_id)){return;}
		
		$date = date('Y-m-d');
		$itemAlreadyexist = RecentlyViewedItem::where(['item_id'=>$item_id, 'user_id'=>$user->id, 'date'=>$date])->first();
		if($itemAlreadyexist){return;}
		
		DB::beginTransaction();
		try {
			$query = Cart::create(['user_id' => $user_id,'item_id' => $item_id,'date' => $date]);
			if($query){
				DB::commit();
				return $query->id;
			}
		}
		catch (Exception $e) {
            DB::rollback();
            return;
        }
	}
	
	
	// SEND OTP
	public static function sendOTP($user, $otp='', $type = 'sms'){
		if(empty($user)){ return; }
		if(empty($otp)){ return; }
		if(empty($type)){ return; }
		
		DB::beginTransaction();
        try {
			if($type == 'sms'){
				// send SMS
				$message ='Hello '. CommonHelper::decryptData($user->name) .', Use '. $otp .' for OTP on '. config('constants.APP_NAME') .'. Team CodeFencers!';
				$query   = OTPVerification::create(['phone_number' =>$user->phone_number,'code' => $otp]);
				if($query){
					$return = CommonHelper::sendSMS($user->country_code. CommonHelper::decryptData($user->phone_number), $message);
					if($return){
						DB::commit();
						return $return;
					}
				}
			}else{
				// Send Email
				$data 		 = new \stdClass();
				$data->name	 = CommonHelper::decryptData($user->name);
				$data->code	 = $otp;
				$return = CommonHelper::sendmail(CommonHelper::decryptData($user->email), 'Recover Passsword', 'email-templates/forgot-password', $data);
				$query   = OTPVerification::create(['email' =>$user->email,'code' => $otp]);
				if($query){
					DB::commit();
					return $query;
				}
			}
		}catch (Exception $e) {
            DB::rollback();
            return;
        }
    }
	
	// SEND MESSAGE
	public static function sendMessage($to, $message = ""){
		
		// send SMS
		return CommonHelper::sendSMS($to, $message);
		
		// send WhatsApp
		//return CommonHelper::sendWhatsApp($to, $message);
	}
	
	// SEND SMS
	public static function sendSMS($to, $message = ""){
		if(empty($to)){ return; }
		if(empty($message)){ return; }
		
		try {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://sms.hspsms.com/sendSMS?username=". config('constants.SMS_USERNAME') ."&message=". urlencode($message) ."&sendername=". config('constants.SMS_SENDER') ."&smstype=TRANS&numbers=$to&apikey=". config('constants.SMS_TOKEN'));
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close ($ch);
			return $response;
			
		} catch (Exception $e) {
			return false;
		}
	}
	
	//SEND MAIL
	public static function sendMail($to = '', $subject = '', $template = '', $data = null){
		try {
			$body = view($template, compact('data'))->render();
			$postData = [
				'sender' =>[
					'name' => config('constants.APP_NAME'),
					'email' => config('constants.MAIL_FROM'),
				],
				'to' =>[[
					'email' => $to,
					'name' => $data->email,
				]],
				'subject' =>$subject,
				'htmlContent' =>$body,
			];
			
			$headers 	= array();
			$headers[]	= 'Api-Key:'.config('constants.MAIL_TOKEN');
			$headers[]	= 'Content-Type: application/json';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
			$response = json_decode(curl_exec($ch));
			
			if(curl_error($ch)){
				return false;
			} else{
				if(!empty($response)){
					if(isset($response->messageId)){
						return $response;
					}
				}
			}
			curl_close($ch);
			return false;
		} catch (Exception $e) {
			return false;
		}
	}
	
	// SEND WELCOME MAIL
	public static function sendWelcomeMail($user = ""){
		if(empty($user)){ return; }
		
		try {
			$subject = 'Welcome to '. config('constants.APP_NAME');
			return CommonHelper::sendmail(CommonHelper::decryptData($user->email), $subject, 'email-templates/welcome-user', $user);
		} catch (Exception $e) {
			return false;
		}
	}
	
	// SEND WHATSAPP SMS
	public static function sendWhatsApp($to, $message = ""){
		if(empty($to)){ return; }
		if(empty($message)){ return; }
		
		try {

			
			
		} catch (Exception $e) {
			return false;
		}
	}
	
	// Update Wallet
	public static function updateWallet($user = '', $title = '', $amount = '0.00', $type = ''){
		try {
			// Store Value in Wallet to Rider & Owner
			$wallet = Wallet::firstOrCreate(['user_id'=>$user->id], ['user_id'=>$user->id, 'balance'=>'0']);
			if($wallet){
				
				$balance = $wallet->balance + $amount;
				if($type == 'Withdraw'){
					$balance = $wallet->balance - $amount;
				}
				
				$data = ['user_id'=>$user->id, 'title' => $title, 'amount' => $amount, 'balance' => $balance, 'type'=> $type, 'status'=> 'Complete'];
				WalletHistory::create($data);
				
				// Update Wallet
				Wallet::where('user_id', $user->id)->update(['balance'=> $balance]);
				
				return 1;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	// SEND MOBILE (PUSH NOTIFICATION)
	public static function send_notification($user = '', $title = '', $message = '', $type = '', $type_id = '', $token = ''){
		$token			= ($user->device_detail) ? $user->device_detail->token : $token;
		
		$data = [
			"user_id"			=> $user->id,
			"title"				=> $title,
			"message"			=> $message,
			"type"				=> $type,
			"type_id"			=> $type_id ? $type_id : null,
			"date_time"			=> date('Y-m-d H:i:s'),
			"alert_type"		=> 'Normal', // Normal, Call
			"token"				=> $token,
			"click_action"		=> "FLUTTER_NOTIFICATION_CLICK",
			"sound" 			=> "default",
			"content_available" => true,
			"mutable_content" 	=> true,
		];
		
		try {
			$insert = Notification::create($data);
			
			if($insert){
				if($insert->id && $token){
					
					$data['notification_id'] = (string) $insert->id;
				  
					$payload__ = [
						"to" 			=> $token,
						"notification"	=> ["title"=>$title,"body"=>$message],
						"data"			=>$data,
					];
					$payload= [
						"to" => $token, 
						"notification" => [
							"body" 		=> $message,
							"title" 	=> $title,
						],
						"android" => [
							"priority" => "high",
						],
						"apns" => [
							"headers" => ["apns-priority" => "10",],
							"payload" => ["aps" => ["sound" => "default",],],
						],
						"data" => $data,
					];
					
					$headers = array ( 'Authorization: key=' . Setting::get('fcm_server_key'), 'Content-Type: application/json' );
					$ch = curl_init(); curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' ); 
					curl_setopt( $ch,CURLOPT_POST, true ); 
					curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers ); 
					curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true ); 
					curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($payload));
					$result = json_decode(curl_exec($ch), TRUE);
					
					curl_close ($ch);
					if(!empty($result)){
						if($result['success'] == 1){
							$insert->is_sent = 1;
							$insert->update();
							
							// Return payload
							$result['payload'] = $payload;
						}
						return $result;
					}else{
						return FALSE;
					}
				}
			}
		} catch (\Exception $e) { 
			return FALSE;
		}
	}
}