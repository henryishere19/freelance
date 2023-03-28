<?php

namespace App\Http\Controllers\Api\Customer;

use DB,Validator,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\NotificationListResource;
use App\Models\Helpers\CommonHelper;
use App\Models\Notification;

class NotificationController extends BaseController
{	
	/**
	* ----------------------------------
	* SAVE NOTIFICATION SETTINGS
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
    public function saveNotificationSettings(Request $request){
        $validator = Validator::make($request->all(),[
            'via_notification' 			=> 'max:1',
            'via_email' 				=> 'max:1',
            'show_order_notification'	=> 'max:1',
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
            if($request->via_notification != ''){
                $data['noti_via_nitification'] = $request->via_notification;
            }
            if($request->via_email != ''){
				$data['noti_via_email'] = $request->via_email;
            }
			if($request->show_order_notification != ''){
				$data['show_order_notification'] = $request->show_order_notification;
            }
			
			$query = User::where('id', $user->id)->update($data);
			if($query){
				DB::commit();
				return $this->sendResponse([], trans('customer_api.save_success'));
			}
			
			DB::rollback();
			return $this->sendError([], trans('customer_api.save_success'));
			
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage()); 
        }
    }
	
    /**
	* ----------------------------------
	* Display a listing of the resource.
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
	public function list(Request $request) {
      
      $search = $request->search;
      $page   = $request->page ?? '0';
      $count  = $request->count ?? '1000';

      if ($page <= 0){ $page = 1; }
      $start  = $count * ($page - 1);

      $user = Auth::user();
      if(empty($user)){
        return $this->sendError('',trans('customer_api.invalid_user'));
      }

      try{
		
		$query = Notification::where(['user_id'=>$user->id])->orderBy('id')->offset($start)->limit($count)->get();
		if(empty($query)){
		  return $this->sendArrayResponse('',trans('customer_api.data_found_empty'));
		}
		return $this->sendArrayResponse(NotificationListResource::collection($query),trans('customer_api.data_found_success'));
      }catch (\Exception $e) { 
		return $this->sendError('', $e->getMessage()); 
      }
	}

    /**
	* ----------------------------------
	* Display a details of the resource.
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
    public function show($id = null) {
      
      try{
        $query = Notification::where(['id'=>$request->notification_id])->first();
        return $this->sendResponse(new NotificationListResource($query),trans('customer_api.data_found_success'));
      }catch (\Exception $e) { 
        return $this->sendError('', $e->getMessage()); 
      }
    }
	
	
	/**
	* ----------------------------------
	* TEST NOTIFICATION.
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
    public function testNotification(Request $request) {
		$validator = Validator::make($request->all(),[
            'title'			=> 'max:99',
            'message'		=> 'max:999',
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
		
		try{
			$return = CommonHelper::send_notification($user, $request->title, $request->message, $request->type, $request->type_id);
			if($return){
				return $this->sendResponse($return['payload'], 'API Run Successfully!!');
			}
			return $this->sendError([], 'Failt to run Firebase API'); 
        
		}catch (\Exception $e) { 
			return $this->sendError([], $e->getMessage()); 
		}
	}
}