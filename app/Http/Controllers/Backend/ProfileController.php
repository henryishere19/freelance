<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Helpers\CommonHelper;
use Validator,Auth,DB,Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class ProfileController extends CommonController
{   
	use CommonHelper;
	
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	*--------------------------
	* View Profile Page
	*--------------------------
	*/
	public function index(){
		$user = Auth()->user();
 		if(empty($user)){
			return redirect()->route('login');
		}
		
		try{
			$page 		= 'profile';
			$page_title = 'Profile';
			$image  	= asset('backendAssets/media/svg/avatars/blank.svg');
			
			if($user->profile_image){
				$image = asset($user->profile_image);
			}
			
			return view("backend.users.profile", compact(['page', 'page_title', 'user', 'image']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	/**
	*--------------------------
	* View for Change Password
	*--------------------------
	*/
	public function change_password(){
		$page 		= 'change-password';
		$page_title = 'Change Password';
			
		return view('backend.users.change-password', compact(['page', 'page_title']));
	}
	
	
	/**
	*--------------------
	* Change Password
	*--------------------
	*/
	public function ajax_update(Request $request){
	    $user = Auth()->user();
 		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		$validator = Validator::make($request->all(), [
			'name'			=> 'required|min:3|max:99',
			'email'			=> 'required|unique:users,email,'.$user->id,
			'phone_number'	=> 'required|unique:users,phone_number,'.$user->id,
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		DB::beginTransaction();
	    try {
			// Store Data
			$data = [
				'name'			=> $request->name,
				'email'			=> $request->email,
				'phone_number'	=> $request->phone_number,
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxError($validator->errors()->first(), trans('common.error'));
				}
				$data['profile_image'] =  $this->saveMedia($request->file('image'));
			}
				
			$user = User::where('id', $user->id)->update($data);
			if($user){
				DB::commit();
				$this->ajaxError('', trans('common.update_successfully'));
			}
			
			DB::rollback();
			$this->ajaxError('', trans('common.faild_to_updated'));
	    } catch (Exception $e) {
	        DB::rollback();
	        $this->ajaxError([], $e->getMessage());
	    }
	}
	
	/**
	*--------------------
	* Change Password
	*--------------------
	*/
	public function ajax_change_password(Request $request){
	    
		$validator = Validator::make($request->all(), [
			'current_password'	=> 'required|min:3|max:99',
			'new_password'		=> 'required|min:3|max:99',
			'confirm_password'	=> 'required|same:new_password|min:3|max:99',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		
		DB::beginTransaction();
	    try {
			
			$user = User::findOrFail($user->id);
			if($user){
				if (Hash::check($request->current_password, $user->password)) {
					$user->fill(['password' => Hash::make($request->new_password)])->save();
					
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
				DB::rollback();
				$this->ajaxError([], trans('common.faild_to_updated'));
			}
	    } catch (Exception $e) {
	        DB::rollback();
	        $this->ajaxError([], $e->getMessage());
	    }
	}
}