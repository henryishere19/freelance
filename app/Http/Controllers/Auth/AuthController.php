<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Authy\AuthyApi;
use Auth,Validator,DB,DateTime,Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use App\Models\OTPVerification;
use App\Models\Helpers\CommonHelper;
use App\Models\DeviceDetail;


class AuthController extends CommonController
{
    use CommonHelper;
	
	public function __construct()
	{
        //$this->middleware('auth');
    }
	
    // Login Page
    public function login(){
		
		$user = Auth()->user();
        if(!empty($user)){ return redirect()->route('dashboard'); }
		
		$page				= 'loginUser';
        $page_title			= trans('meta.'. $page.'.title');
		$page_description 	= trans('meta.'. $page.'.description');
        $page_image 		= asset(trans('meta.'. $page.'.image'));
		
		return view('auth.login',compact('page', 'page_title'));
    }
	
	// Login with OTP Page
	public function loginOTP(){
		
		$user = Auth()->user();
        if(!empty($user)){ return redirect()->route('firstPage'); }
		
		$page				= 'loginUser';
        $page_title			= trans('meta.'. $page.'.title');
		$page_description 	= trans('meta.'. $page.'.description');
        $page_image 		= asset(trans('meta.'. $page.'.image'));
		
		return view('auth.login-otp',compact('page', 'page_title'));
    }
	
	// Registration Page
	public function register(){
		
		$user = Auth()->user();
        if(!empty($user)){ return redirect()->route('firstPage'); }
		
		$page				= 'registerUser';
        $page_title			= trans('meta.'. $page.'.title');
		$page_description 	= trans('meta.'. $page.'.description');
        $page_image 		= asset(trans('meta.'. $page.'.image'));
		
		return view('auth.register',compact('page', 'page_title'));
    }
	
	// Recover Password Page
	public function recoverPassword(){
		
		$user = Auth()->user();
        if(!empty($user)){ return redirect()->route('firstPage'); }
		
		$page				= 'recoverPassword';
        $page_title			= trans('meta.'. $page.'.title');
		$page_description 	= trans('meta.'. $page.'.description');
        $page_image 		= asset(trans('meta.'. $page.'.image'));
		
		return view('auth.recover-password',compact('page', 'page_title'));
    }
	
	
	/**
	* ---------------------------------
	* Login User
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_login(Request $request){
		$validator = Validator::make($request->all(), [
            'username' 	=> 'required|min:5|max:55',
            'password'  => 'required|min:8|max:15',
        ]);
        if($validator->fails()){
            $this->ajaxValidationError($validator->errors(), trans('common.error'));
        }
		
		DB::beginTransaction();
		try
		{
			$auth_check = Auth::attempt(['phone_number' => CommonHelper::encryptData($request->username), 'password' => $request->password]);
			if(empty($auth_check)){
				$auth_check = Auth::attempt(['email' => CommonHelper::encryptData($request->username), 'password' => $request->password]);
			}
			if($auth_check){
				
				$request->session()->regenerate();
				
				$user = Auth::user();
				if($user){
					
					//REVOKE OLD TOKEN
					DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => true]);
					
					
					// SAVE DEVICE DETAILS
					$deviceArray = [
						'user_id' 	=> $user->id,
						'token' 	=> $user->createToken(config('constants.APP_NAME'))->accessToken,
						'device_token' 	=> '0',
						'device_type' 	=> 'Web'
					];
					DeviceDetail::create($deviceArray);
					
					DB::commit();
				
				}
				return redirect()->intended('dashboard');
				$this->sendResponse([], trans('auth.login_success'));
			} else {
				DB::rollback();
				$this->ajaxError([], trans('auth.invalid_credentials'));
			}
		} catch (Exception $e) {
            DB::rollback();
            $this->ajaxError([], trans('common.try_again'));
        }
	}
	
	/**
	* ---------------------------------
	* Register User
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_register(Request $request){
		$validator = Validator::make($request->all(), [
            'name'				=> 'required|string|min:3|max:99',
            'email'				=> 'required|email|string|max:99|unique:users',
            'phone_number'		=> 'required|min:8|max:15|unique:users',
            'password'			=> 'required|min:6|max:15',
            'confirm_password'	=> 'required|min:6|max:15|same:password',
        ]);
        
        if($validator->fails()){
            $this->ajaxValidationError($validator->errors(), trans('common.error'));
        }
		
		// EMAIL VALIDATION
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
			return $this->ajaxError([], 'Invalid Email');
        }
		
		$check = User::where('email', CommonHelper::encryptData($request->email))->first();
		if($check){
			return $this->ajaxError([], 'Email Already Exist');
		}
		
		$check = User::where('phone_number', CommonHelper::encryptData($request->phone_number))->first();
		if($check){
			return $this->ajaxError([], 'Phone Number Exist');
		}
		
		DB::beginTransaction();
		try
		{
			// USER REGISTER
			$data =[
				'name' 				=> CommonHelper::encryptData($request->name),
				'email' 			=> CommonHelper::encryptData($request->email),
				'country_code' 		=> '+91',
				'phone_number' 		=> CommonHelper::encryptData($request->phone_number),
				'user_type' 		=> 'Customer',
				'email_verified_at'	=> date('Y-m-d h:i:s'),
				'password'			=> Hash::make($request->password)
			];
			$user = User::create($data);
            if($user){
                
				// Send OTP
				CommonHelper::sendOTP($user, rand(100000,999999));
				
				$return = Auth::guard('web')->login($user);
				DB::commit();
				
				$response = [
                  'success' => "1",
                  'status'  => "200",
                  'message' => trans('common.register_success'),
                  'html' => trans('common.verify_account'),
                  'data'  => $user
                ];
                return $this->sendResponse($response, trans('common.register_success'));
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.try_again'));
			
		} catch (Exception $e) {
            DB::rollback();
            $this->ajaxError([], trans('common.try_again'));
        }
	}
	
	/**
	* ---------------------------------
	* Send Login OTP
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_sendLoginOTP(Request $request){
		$validator = Validator::make($request->all(), [
			'phone_number'	=> 'required|min:10|max:10',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		DB::beginTransaction();
		try {
			$user = User::where('phone_number',CommonHelper::encryptData($request->phone_number))->first();
			if(!empty($user)){
				// Send OTP
				$sent = CommonHelper::sendOTP($user, rand(100000,999999));
				if($sent){
					DB::commit();
					return $this->sendResponse([], 'Sent code successfully');
				}
			} else {
			  DB::rollback();
			  return  $this->ajaxError([], 'No data fount with this details');
			}
		} catch (Exception $e) {
			DB::rollback();
			return  $this->ajaxError([], $e->getMessage());
		}
    }
	
	/**
	* ---------------------------------
	* Login With OTP
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_loginWithOTP(Request $request){
		$validator = Validator::make($request->all(), [
			'otp'				=> 'required|min:4|max:6',
			'phone_number'		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		DB::beginTransaction();
		try {
			
			$result = OTPVerification::where(array('phone_number'=> CommonHelper::encryptData($request->phone_number), 'code'=>$request->otp, 'status'=>'pending'))->first();
			if(empty($result)){
				return $this->ajaxError([], 'Invalid OTP');
            }
			$result->status = 'verified';
            $result->update();
            
			$user = User::where('phone_number', CommonHelper::encryptData($request->phone_number))->first();
			if(!empty($user)){
				
				$auth_check = Auth::loginUsingId($user->id);
				if(empty($auth_check)){
					DB::rollback();
					$this->ajaxError([], trans('common.try_again'));
				}
				
				// Login Process
				$request->session()->regenerate();
				$user = Auth::user();
				if($user){
					//REVOKE OLD TOKEN
					DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => true]);
					
					// SAVE DEVICE DETAILS
					$deviceArray = [
						'user_id' 		=> $user->id,
						'token' 		=> $user->createToken(config('constants.APP_NAME'))->accessToken,
						'device_token' 	=> '0',
						'device_type' 	=> 'Web'
					];
					DeviceDetail::create($deviceArray);
					DB::commit();
					
					asdasds;
					return $this->sendResponse([], trans('common.register_success'));
				}
				
				DB::rollback();
				return  $this->ajaxError([], 'Faild to Login');
			} else {
			  DB::rollback();
			  return  $this->ajaxError([], 'Invalid User');
			}
		} catch (Exception $e) {
			DB::rollback();
			return $this->ajaxError([], $e->getMessage());
		}
    }
	
	/**
	* ---------------------------------
	* Recover Password
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_recoverPassword(Request $request){
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
			$this->ajaxError($validator->errors()->first(), trans('common.error'));
		}
		
		DB::beginTransaction();
		try {
			
			$user = User::where('email',$request->username)->first();
			if(empty($user)){
				$user = User::where('phone_number', CommonHelper::encryptData($request->username))->first();
			}
			
			if(!empty($user)){
				// Send OTP
				$sent = CommonHelper::sendOTP($user, rand(100000,999999), $type);
				if($sent){
					DB::commit();
					return $this->sendResponse([], 'Sent code successfully');
				}
			} else {
			  DB::rollback();
			  return  $this->ajaxError([], 'No data fount with this details');
			}
		} catch (Exception $e) {
			DB::rollback();
			return  $this->ajaxError([], $e->getMessage());
		}
    }
	
	
	/**
	* ---------------------------------
	* Reset Password
	* @return \Illuminate\Http\Response
	* ---------------------------------
	*/
	public function ajax_resetPassword(Request $request){
		$validator = Validator::make($request->all(), [
			'otp'				=> 'required|min:4|max:6',
			'username'			=> 'required',
            'new_password'		=> 'required|min:6|max:15',
            'confirm_password'	=> 'required|min:6|max:15|same:new_password',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		DB::beginTransaction();
		try {
			
			$result = OTPVerification::where(array('phone_number'=> CommonHelper::encryptData($request->username), 'code'=>$request->otp, 'status'=>'pending'))->first();
			if(empty($result)){
				$result = OTPVerification::where(array('email'=> CommonHelper::encryptData($request->username), 'code'=>$request->otp, 'status'=>'pending'))->first();
			}
			if(empty($result)){
				return $this->ajaxError([], 'Invalid OTP');
            }
			$result->status = 'verified';
            $result->update();
            
			$user = User::where('phone_number', CommonHelper::encryptData($request->username))->first();
			if(empty($user)){
				$user = User::where('email', CommonHelper::encryptData($request->username))->first();
			}
			
			if(!empty($user)){
				// Reset user password
				$query = User::where('id', $user->id)->update(['password'=>Hash::make($request->new_password)]);
				if($query){
					DB::commit();
					return $this->sendResponse([], 'Reset successfully');
				}
			} else {
			  DB::rollback();
			  return  $this->ajaxError([], 'Invalid User');
			}
		} catch (Exception $e) {
			DB::rollback();
			return  $this->ajaxError([], $e->getMessage());
		}
    }
	
	public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect()->route('login');
    }
}