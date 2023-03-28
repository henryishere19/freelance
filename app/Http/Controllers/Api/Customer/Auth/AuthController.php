<?php

namespace App\Http\Controllers\Api\Customer\Auth;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Authy\AuthyApi;
use Validator,DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\OTPVerification;
use App\Models\Helpers\CommonHelper;
use App\Models\DeviceDetail;
use App\Http\Resources\AuthUserResource;

class AuthController extends BaseController
{
    /**
	* ---------------------------------
	* Login User
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' 		=> 'required|min:8|max:51',
            'password' 		=> 'required|min:6|max:55',
            'device_type' 	=> 'required|min:3|max:12'
        ]);
        if($validator->fails()){
            return $this->sendValidationError('', $validator->errors()->first());
        }
		
		$auth_check = Auth::attempt(['phone_number' => CommonHelper::encryptData($request->username), 'password' => $request->password]);
		if(empty($auth_check)){
            $auth_check = Auth::attempt(['email' => CommonHelper::encryptData($request->username), 'password' => $request->password]);
        }
		
        if($auth_check){
            $user = Auth::user();
            if(empty($user)){
                return $this->sendError([], trans('customer_api.login_error'));
            }
			
			// Status Check
			if($user->status == 'pending') {
				// Send OTP
				CommonHelper::sendOTP($user, rand(100000,999999));
				
				$return['email']            =  CommonHelper::decryptData($user->email);
				$return['country_code']     =  $user->country_code;
				$return['phone_number']     =  CommonHelper::decryptData($user->phone_number);
				$return['status']           =  $user->status;
				
				return $this->sendError($return, trans('customer_api.verification_pending_message'), 201, '202');
				
			}else if($user->status == 'inactive') {
				return $this->sendError([], trans('customer_api.inactive_account_message'), 201, '202');
				
			} else if($user->status == 'blocked'){
				return $this->sendError([], trans('customer_api.account_blocked_message'), 201, '423');
			}
			
			// revoke old token
			DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => true]);
			
			// Save Device Details
            $device_detail = DeviceDetail::where(['user_id'=>$user->id, 'device_type'=>$request->device_type])->first();
            if($device_detail){
                $device_detail->update(['user_id'=>$user->id, 'device_type'=>$request->device_type]);
            } else {
                DeviceDetail::create(['user_id'=>$user->id, 'device_type'=>$request->device_type]);
            }
			
			//Create Token
			$user->token = $user->createToken(config('app.name'))->accessToken;
			
			return $this->sendResponse(new AuthUserResource($user), trans('customer_api.login_success'));
			
        } else {
			return $this->sendError([], trans('customer_api.login_error'));
        }
    }

	/**
	* ---------------------------------
	* Login With OTP
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function loginWithOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' 			=> 'required|min:6|max:55',
            'username'		=> 'required|min:8|max:51',
            'device_type'	=> 'required|min:3|max:12',
        ]);
        if($validator->fails()){
            return $this->sendValidationError('', $validator->errors()->first());       
        }
        
        DB::beginTransaction();
        try{
            $user = User::where('phone_number', CommonHelper::encryptData($request->username))->where('status','!=','blocked')->first();
            if(empty($user)){
				$user = User::where('email', CommonHelper::encryptData($request->username))->where('status','!=','blocked')->first();
			}
			if($user){
                // Check user get OTP or not
                $otp_details = OTPVerification::where(['phone_number' => CommonHelper::encryptData($request->username), 'code' => $request->otp])->where('status','pending')->first();
                if($otp_details){
                    $otp_details->status = 'verified';
                    $otp_details->update();
					DB::commit();
					
					// AUTH Attempt
					Auth::loginUsingId($user->id);
					
					$user = Auth::user();
					if($user){
						DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => true]);
					} else {
						return $this->sendError([], trans('customer_api.login_error'));
					}
					
					
					// Status Check
					if($user->status == 'inactive') {
						return $this->sendError([], trans('customer_api.inactive_account_message'), 201, '202');
						
					} else if($user->status == 'blocked'){
						return $this->sendError([], trans('customer_api.account_blocked_message'), 201, '423');
					}
					
					// Save Device Details
					$device_detail = DeviceDetail::where(['user_id'=>$user->id, 'device_type'=>$request->device_type])->first();
					if($device_detail){
						$device_detail->update(['user_id'=>$user->id, 'device_type'=>$request->device_type]);
					} else {
						DeviceDetail::create(['user_id'=>$user->id, 'device_type'=>$request->device_type]);
					}
					
                    //Create Token
					$user->token = $user->createToken(config('app.name'))->accessToken;
					
					return $this->sendResponse(new AuthUserResource($user), trans('customer_api.login_success'));
                }else{
					DB::rollback();
                    return $this->sendError([], 'OTP not matched'); 
                }
            }else{
				DB::rollback();
                return $this->sendError([], 'This user is not register with us'); 
            }
        }catch (\Exception $e) { 
          DB::rollback();
          return $this->sendError([], $e->getMessage()); 
        }
	}
	
	
	/**
	* ---------------------------------
	* Login With Social Media api	
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function loginWithSocial(Request $request){
        $validator = Validator::make($request->all(), [
            'platform'	=> 'required|min:3|max:55',
            'username'	=> 'required|min:8|max:51',
            //'token'		=> 'required|min:5|max:51',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }
        
        DB::beginTransaction();
        try{
            $user = User::where('phone_number', CommonHelper::encryptData($request->username))->where('status','!=','blocked')->first();
            if(empty($user)){
				$user = User::where('email', CommonHelper::encryptData($request->username))->where('status','!=','blocked')->first();
			}
			if($user){
                // AUTH Attempt
				Auth::loginUsingId($user->id);
				
				$user = Auth::user();
				if($user){
					DB::commit();
					DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => true]);
				} else {
					DB::rollback();
					return $this->sendError([], trans('customer_api.login_error'));
				}
				
				// Status Check
				if($user->status == 'inactive') {
					return $this->sendError([], trans('customer_api.inactive_account_message'), 201, '202');
					
				} else if($user->status == 'blocked'){
					return $this->sendError([], trans('customer_api.account_blocked_message'), 201, '423');
				}
				
				//Create Token
				$user->token = $user->createToken(config('app.name'))->accessToken;
				
				return $this->sendResponse(new AuthUserResource($user), trans('customer_api.login_success'));
            }else{
				DB::rollback();
                return $this->sendError([], 'Unable to login'); 
            }
        }catch (\Exception $e) { 
          DB::rollback();
          return $this->sendError([], $e->getMessage()); 
        }
	}
	
    /**
	* ---------------------------------
	* Registration api
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      	=> 'required|string|min:3|max:99',
            'country_code' 	=> 'required|min:2|max:4',
            'phone_number' 	=> 'required|min:8|max:15|unique:users',
            'email'     	=> 'required|string|email|max:99|unique:users',
            'gender'   	 	=> 'required|min:4|max:6',
            'dob'       	=> 'required|date_format:Y-m-d|before:today',
            'password'  	=> 'required|min:6|max:18',
        ]);
        
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }

        // EMAIL VALIDATION
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
			return $this->sendError([], trans('customer_api.invalid_email'));
        }
		
		$check = User::where('email',CommonHelper::encryptData($request->email))->first();
		if($check){
			return $this->sendError([], 'Email Already Exist');
		}
		
		$check = User::where('phone_number',CommonHelper::encryptData($request->phone_number))->first();
		if($check){
			return $this->sendError([], 'Email Already Exist');
		}
        
        DB::beginTransaction();
        try {
			$data = array(
				'name'      	=> CommonHelper::encryptData($request->name),
				'gender'    	=> $request->gender ? CommonHelper::encryptData($request->gender) : null,
				'dob'       	=> $request->dob ? CommonHelper::encryptData(date('Y-m-d', strtotime($request->dob))) : null,
				'email'     	=> CommonHelper::encryptData($request->email),
				'country_code' 	=> $request->country_code ? $request->country_code : '+91',
				'phone_number' 	=> CommonHelper::encryptData($request->phone_number),
				'profile_image' => '',
				'status'    	=> 'pending',
				'password'  	=> Hash::make($request->password),
				'user_type' 	=> 'Customer'
			);
			$user = new User();
			$user->fill($data);
			
            if($user->save()){
                // Send OTP
				CommonHelper::sendOTP($user, rand(100000,999999));
				
				DB::commit();
				
                //Add response details into variable
				$return['email']            =  $request->email;
				$return['country_code']     =  $request->country_code;
				$return['phone_number']     =  $request->phone_number;
				$return['status']           =  $user->status;
                
                return $this->sendResponse($return, trans('customer_api.registration_success'));
            }
			DB::rollback();
			return $this->sendError([], trans('auth.registration_error'));
				
        }catch (Exception $e) {
            DB::rollback();
            return $this->sendError([], $e->getMessage());
        }
    }
	
    /**
	* ---------------------------------
	* SEND OTP
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
    public function sendOTP(Request $request){
		$type 	  = 'email';
		$username = $request->username;
		
		if(is_numeric($username)){
			$type = 'sms';
			$validator = Validator::make($request->all(), [
				'username'	=> 'required|min:10|max:10',
			]);
		} else {
			$validator=Validator::make($request->all(),[
				'username' => 'required|email'
			]);
		}
		if($validator->fails()){
			$this->sendError($validator->errors()->first(), trans('common.error'));
		}
		
        DB::beginTransaction();
        try{
			// GET USER FROM DATA
			$user = User::where('email', CommonHelper::encryptData($request->username))->first();
			if(empty($user)){
				$user = User::where('phone_number', CommonHelper::encryptData($request->username))->first();
			}
			
			// Send OTP
			$sent = CommonHelper::sendOTP($user, rand(100000,999999), $type);
			if($sent){
				DB::commit();
				return $this->sendResponse([], trans('customer_api.otp_sent_success'));
			}
		
			return $this->sendError([], trans('customer_api.try_again'));
			
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage()); 
        }
    }

	/**
	* ---------------------------------
	* Verify OTP
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
    public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(),[
            'otp'		=> 'required|min:4|max:6',
            'username' 	=> 'required|min:8|max:15',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }
        
        try{
            $status = OTPVerification::where(array('phone_number'=> CommonHelper::encryptData($request->phone_number), 'code'=>$request->otp, 'status'=>'pending'))->first();
            if(empty($status)){
                return $this->sendError([], trans('customer_api.invalid_otp'));
            }
            return $this->sendResponse([], trans('customer_api.otp_verified_success'));
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], trans('customer_api.otp_verified_error'));
        }
    }
	
	
    /**
	* ------------------------
	* Active account
	* @return [string] message
	* ------------------------
	*/
    public function active(Request $request){
        $validator = Validator::make($request->all(),[
            'otp'		=> 'required|min:4|max:6',
            'username' 	=> 'required|min:3|max:21',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }
        
        $user = User::where(array('phone_number'=>CommonHelper::encryptData($request->username)))->first();
        if(empty($user)){
            $user = User::where(array('email'=> CommonHelper::encryptData($request->username)))->first();
        }
		if(empty($user)){
            return $this->sendError([], trans('customer_api.invalid_user'));
        }
		
		$type 	  = 'email';
		if(is_numeric(CommonHelper::encryptData($request->username))){ $type = 'phone_number'; }

        DB::beginTransaction();
        try{
            $result = OTPVerification::where(array($type=>CommonHelper::encryptData($request->username), 'code'=>$request->otp, 'status'=>'pending'))->first();
            if(empty($result)){
                return $this->sendError([], trans('customer_api.invalid_otp'));
            }
            $result->status = 'verified';
            $result->update();
            
            
            // Update user status
            $user->status = 'active';
            $user->update();
            DB::commit();

            //Create Token
			$user->token = $user->createToken(config('app.name'))->accessToken;
			
			return $this->sendResponse(new AuthUserResource($user), trans('customer_api.login_success'));
            
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], trans('customer_api.account_act_error'));
        }
    }

	/**
	* ----------------------------------
	* RECOVER PASSWORD
	* @return \Illuminate\Http\Response
	*-----------------------------------
	**/
    public function recoverPassword(Request $request){
        $type 	  = 'email';
		$username = $request->username;
		
		if(is_numeric($username)){
			$type = 'sms';
			$validator = Validator::make($request->all(), [
				'username'	=> 'required|min:10|max:10',
			]);
		} else {
			$validator=Validator::make($request->all(),[
				'username' => 'required|email'
			]);
		}
		if($validator->fails()){
			$this->sendError($validator->errors()->first(), trans('common.error'));
		}
		
        DB::beginTransaction();
        try{
			// GET USER FROM DATA
			$user = User::where('email', CommonHelper::encryptData($request->username))->first();
			if(empty($user)){
				$user = User::where('phone_number', CommonHelper::encryptData($request->username))->first();
			}
			
			// Send OTP
			$sent = CommonHelper::sendOTP($user, rand(100000,999999), $type);
			if($sent){
				DB::commit();
				return $this->sendResponse([], trans('customer_api.otp_sent_success'));
			}
			DB::rollback();
			return $this->sendError([], trans('customer_api.otp_sent_error'));
			
        } catch (\Exception $e) { 
          DB::rollback();
          return $this->sendError([], $e->getMessage()); 
        }
    }
	
	/**
	* ---------------------------------
	* Reset password
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function resetPassword(Request $request){
		$validator = Validator::make($request->all(), [
			'otp'				=> 'required|min:4|max:6',
			'username'			=> 'required',
            'new_password'		=> 'required|min:6|max:15',
            'confirm_password'	=> 'required|min:6|max:15|same:new_password',
		]);
		if($validator->fails()){
			return $this->sendValidationError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			$result = OTPVerification::where(array('phone_number'=> CommonHelper::encryptData($request->username), 'code'=>$request->otp, 'status'=>'pending'))->first();
			if(empty($result)){
				return $this->sendError([], 'Invalid OTP');
            }
			$result->status = 'verified';
            $result->update();
            
			// GET USER FROM DATA
			$user = User::where('email', CommonHelper::encryptData($request->username))->first();
			if(empty($user)){
				$user = User::where('phone_number', CommonHelper::encryptData($request->username))->first();
			}
			if(!empty($user)){
				// Reset user password
				$query = User::where('phone_number', CommonHelper::encryptData($request->username))->update(['password'=>Hash::make($request->new_password)]);
				if($query){
					DB::commit();
					return $this->sendResponse([], 'Reset successfully');
				}
			} else {
			  DB::rollback();
			  return  $this->sendError([], 'Invalid User');
			}
		} catch (Exception $e) {
			DB::rollback();
			return  $this->sendError([], $e->getMessage());
		}
    }
	
	/**
	* ---------------------------------
	* Change password
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'current_password'	=> 'required',
            'new_password'   	=> 'required|max:15|min:6',
            'confirm_password' 	=> 'required|max:15|min:6|same:new_password',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }
		
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.unauthorized_access'));
		}
		
		if(empty(Hash::check($request->current_password, $user->password))){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_current_password'));
		}
		
		DB::beginTransaction();
        try {
            $query = User::where('id', $user->id)->update(['password' => encrypt($request->new_password)]);
			if($query){
				DB::commit();
				return $this->sendResponse([], trans('customer_api.password_reset_success'));
			}
            DB::rollback();
            return $this->sendError([], trans('customer_api.password_reset_failed'));
        } catch (Exception $e) {
            DB::rollback();
			return $this->sendError([], $e->getMessage());
        }
    }
	
	/**
	* ---------------------------------
	* Delte account
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function deleteAccount(Request $request){
		
		$user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([],trans('customer_api.unauthorized_access'));
        }
		
		DB::beginTransaction();
		try{
			$query = User::where('id',$user->id)->delete();
			if($query){
				DB::commit();
				return $this->sendResponse([], 'Delete Successfully');
			}
			return $this->sendError([], 'Failed to Delete');
		}catch(\Exception $e){
            DB::rollback();
			return $this->sendError([], $e->getMessage());
        }
    }
	
	/**
	* ---------------------------------
	* Update Device Details
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function updateDeviceDetails(Request $request){
		$validator = Validator::make($request->all(), [
            'device_type'		=> 'required|min:3|max:15',
			'notification_type'	=> 'min:3|max:255',
			'token'				=> 'required|min:3|max:255',
            'uuid'				=> 'min:1|max:55',
            'ip'				=> 'min:1|max:55',
            'os_version'		=> 'min:1|max:55',
            'model_name'		=> 'min:1|max:55',
		]);
		if($validator->fails()){
			return $this->sendValidationError([], $validator->errors()->first());
		}
		
		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.unauthorized_access'));
		}
		
		DB::beginTransaction();
		try {
			
			$data = [
				'user_id' 			=> $user->id,
				'device_type' 		=> $request->device_type,
				'notification_type' => $request->notification_type,
				'token' 			=> $request->token,
				'uuid' 				=> $request->uuid,
				'ip' 				=> $request->ip,
				'os_version' 		=> $request->os_version,
				'model_name' 		=> $request->model_name,
			];
			
			// Save Device Details
            $device_detail = DeviceDetail::where(['user_id'=>$user->id, 'device_type'=>$request->device_type])->first();
            if($device_detail){
                $device_detail->update($data);
				DB::commit();
				return $this->sendResponse([], 'Update successfully');
            } else {
                DeviceDetail::create($data);
				DB::commit();
				return $this->sendResponse([], 'Create successfully');
            }
			DB::rollback();
			return  $this->sendError([], 'Failed to update the data');
		} catch (Exception $e) {
			DB::rollback();
			return  $this->sendError([], $e->getMessage());
		}
    }
	
	
	/**
	* ------------------------------
	* Logout user (Revoke the token)
	* @return \Illuminate\Http\Response
	* ------------------------------
	*/
    public function logout(){
        $user = Auth::user();
        /*$device_detail = $user->device_detail;
        if($device_detail){
            $device_detail->delete();
        }*/
        $user->token()->revoke();
        return $this->sendResponse('', trans('customer_api.logout'));
    }
}