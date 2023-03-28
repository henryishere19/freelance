<?php

namespace App\Http\Controllers\Api\Customer;

use Validator,DB,Auth,Authy,Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use App\Models\Helpers\CommonHelper;
use App\Http\Controllers\Api\BaseController;

use App\Models\User;
use App\Models\UserInfo;

use App\Http\Resources\UserResource;
use App\Http\Resources\ProfileListResource;
use App\Http\Resources\MemberListResource;


class MemberController extends BaseController
{
	use CommonHelper;
	
	/**
    * GET MEMBERS
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $page     = $request->page ?? '1';
		$count    = $request->count ?? '100';
		
		if ($page <= 0){ $page = 1; }
		$start = $count * ($page - 1);
		
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
        
		try{
			$query = User::where('relation_id', $user->id);
			
			// SEARCH
			if($request->search){
				$query->where('name','like','%'.$request->search.'%');
			}
			
			$data = $query->orderBy('id', 'DESC')->get();
            if(count($data) > 0){
                return $this->sendArrayResponse(MemberListResource::collection($data),trans('customer_api.data_found_success'));
            }
            return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
        } catch (\Exception $e) { 
          return $this->sendError([], $e->getMessage()); 
        }
    }
	
	/**
    * SAVE MEMBER
    * @return \Illuminate\Http\Response
    */
    public function saveMember(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name'  		=> 'required|min:3|max:100',
            'relation'  	=> 'required|min:3|max:51',
            'dob'       	=> 'required|date_format:Y-m-d|before:' . date('Y-m-d'),
            'email'			=> 'required|min:5|max:99',
            'phone_number'	=> 'required|min:8|max:15',
          
        ]);

        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
		
		// EMAIL VALIDATION
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->sendError([], trans('customer_api.invalid_email'));
        }
        
		DB::beginTransaction();
		try{
			
			$data = array(
				'name'       	=> $request->name,
				'relation'		=> $request->relation,
				'added_by_id'	=> $user->id,
				'user_type'		=> 'Member',
				'dob'			=> $request->dob,
				'email'  		=> $request->email,
				'country_code'	=> '+91',
				'phone_number'	=> $request->phone_number,
				'activity'		=> $request->activity,
                
			);
		
			// Save Image
			if($request->profile_image){
				$data['profile_image'] = $this->saveMedia($request->file('profile_image'));
			}
			
			// Define Gender
			if($request->relation == 'Father'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Mother'){ $data['gender'] = 'Female'; }
			else if($request->relation == 'Brother'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Sister'){ $data['gender'] = 'Female'; }
			else if($request->relation == 'Son'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Daughter'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Wife'){ $data['gender'] = 'Female'; }
			else if($request->relation == 'Husband'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Uncle'){ $data['gender'] = 'Male'; }
			else if($request->relation == 'Aunty'){ $data['gender'] = 'Female'; }
			else{
				return $this->sendError('',trans('customer_api.invalid_relation_type'));
			}
			
			if($request->member_id){
				$validator = Validator::make($request->all(),[
					'member_id' => 'required|exists:users,id',
				]);

				if($validator->fails()){
					return $this->sendValidationError('',$validator->errors()->first());       
				}
		
				// CHECK EMAIL EXIST OR NOT
				$email = User::where('email', $request->email)->whereNotIn('id', [$request->member_id])->first();
				if(!empty($email)){
					return $this->sendError([], trans('customer_api.email_already_exist'));
				}

				// CHECK MOBILE NO EXIST OR NOT
				$phone_number = User::where('phone_number', $request->phone_number)->whereNotIn('id', [$request->member_id])->first();
				if(!empty($phone_number)){
					return $this->sendError([], trans('customer_api.phone_number_already_exist'));
				}
				
				// Update
                $query = User::where('id', $request->member_id)->where('added_by_id', $user->id)->update($data);
            }else{
				// CHECK EMAIL EXIST OR NOT
				$email = User::where('email', $request->email)->first();
				if(!empty($email)){
					return $this->sendError([], trans('customer_api.email_already_exist'));
				}

				// CHECK MOBILE NO EXIST OR NOT
				$phone_number = User::where('phone_number', $request->phone_number)->first();
				if(!empty($phone_number)){
					return $this->sendError([], trans('customer_api.phone_number_already_exist'));
				}
				
				// Create
				$data['password'] = md5(time());
				$query = User::create($data);
                UserInfo::insert(['user_id' => $query->id]);
            }
				
            if($query){
                DB::commit();
                return $this->sendResponse([], trans('customer_api.data_saved_success'));
            }
			
			DB::rollback();
            return $this->sendResponse([], trans('customer_api.data_saved_error'));
			
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage());
        }
    }
	
	/**
    * DELETE MEMBERS
    * @return \Illuminate\Http\Response
    */
    public function delete_member(Request $request){
        
        $validator = Validator::make($request->all(),[
            'member_id' => 'required|exists:users,id',
        ]);

        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
        
		DB::beginTransaction();
        try{
			$delete = User::where(['id'=>$request->member_id, 'added_by_id'=>$user->id])->delete();
            if($delete){
                DB::commit();
                return $this->sendArrayResponse([], trans('customer_api.data_delete_success'));
            }
            return $this->sendArrayResponse([], trans('customer_api.data_delete_error'));
        } catch (\Exception $e) {
			DB::rollback();
			return $this->sendError([], $e->getMessage());
        }
    }
}