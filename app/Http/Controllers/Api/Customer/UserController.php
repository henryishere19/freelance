<?php

namespace App\Http\Controllers\Api\Customer;

use Auth,AuthyApi,Validator,DB,Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Api\BaseController;

use App\Models\Helpers\CommonHelper;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProfileListResource;
use App\Http\Resources\DashboardResource;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressListResource;
use App\Http\Resources\WalletDetailResource;
use App\Http\Resources\WalletHistoryResource;

class UserController extends BaseController
{
	use CommonHelper;
	
    /**
	* ----------------------------------
	* DASHBOARD
	* @return \Illuminate\Http\Response
	* ---------------------------------- 
	*/ 
	public function dashboard(Request $request)
    {
		//Get User Data
		$user_id = Auth::user()->id;
		if(empty($user_id)){
			return $this->sendError('',trans('customer_api.invalid_user'));
		}
			
        try{
            // Collect Data
			$data						= new \stdClass();
            $data->banners				= Banner::where('id', $user_id)->first();
            $data->trending_products	= Product::where('status', 'active')->get();
            $data->explore_new			= Product::where('status', 'active')->get();
			
            return $this->sendResponse(new DashboardResource($data), trans('customer_api.data_found_success'));
        }catch(\Exception $e){
            DB::rollback();
            return $this->sendError('',trans('customer_api.data_found_empty'));
        }
    }
	
	/**
	* ----------------------------------
	* GET PROFILE
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/ 
    public function profile(Request $request)
    {
		try{
            //Get User Data
            $user = Auth::user();
            if(empty($user)){
                return $this->sendUnauthorizedError([],trans('customer_api.invalid_user'));
            }
            return $this->sendResponse(new UserResource($user), trans('customer_api.data_found_success'));
        }catch(\Exception $e){
            return $this->sendError('',trans('customer_api.data_found_empty'));
        }
    }


	/**
	* -----------------------------------
	* PROFILE UPDATE
	* @return \Illuminate\Http\Response
	* -----------------------------------
	*/
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     		 	=> 'required|string|min:3|max:99',
            'email'     		=> 'required|string|email|max:99',
            'country_code'		=> 'required|min:1|max:4',
            'phone_number' 		=> 'required|min:6|max:15',
            'gender'    		=> 'required|min:4|max:6',
            'dob'       		=> 'required',
        ]);
        if($validator->fails()){
            return $this->sendValidationError('', $validator->errors()->first());
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([],trans('customer_api.invalid_user'));
        }

        // EMAIL VALIDATION
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return $this->sendError('',trans('customer_api.invalid_email'));
        }
        
        // CHECK EMAIL EXIST OR NOT
        $email = User::where('email', $request->email)->whereNotIn('id', [$user->id])->first();
        if(!empty($email)){
            return $this->sendError('',trans('customer_api.email_already_exist'));
        }

        // CHECK MOBILE NO EXIST OR NOT
        $phone_number = User::where('phone_number', $request->phone_number)->whereNotIn('id', [$user->id])->first();
        if(!empty($phone_number)){
            return $this->sendError('',trans('customer_api.phone_number_already_exist'));
        }
       
        DB::beginTransaction();
		try{
			$query = User::where('id', $user->id)->update([
				'name'          => $request->name,
				'email'         => $request->email,
				'country_code'  => $request->country_code,
				'phone_number'  => $request->phone_number,
				'gender'        => $request->gender,
                'dob'           => date('Y-m-d', strtotime($request->dob)),
			]);
			if($query){
                DB::commit();
				//Get User Data
				$user = User::where('id', $user->id)->first();
				return $this->sendResponse(new UserResource($user), trans('customer_api.update_success'));
			}else{
				DB::rollback();
				return $this->sendError([], trans('customer_api.profile_update_error'));
			}
		}catch(\Exception $e){
            DB::rollback();
			return $this->sendError([], trans('customer_api.profile_update_error'));
        }
    }
	
	
	/**
	* -----------------------------------
	* UPDATE PROFILE PICTURE
	* @return \Illuminate\Http\Response
	* -----------------------------------
	*/
    public function updateProfilePicture(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'image'	=> 'required|image|mimes:jpeg,png,jpg|max:1024',
		]);
		if($validator->fails()){
			return $this->sendValidationError('', $validator->errors()->first());
		}
		
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([],trans('customer_api.invalid_user'));
        }
		
		DB::beginTransaction();
		try{
			// Save Image
			if($request->image){
                $path = $this->saveMedia($request->file('image'));
				$query = User::where('id', $user->id)->update(['profile_image' => $path]);
				
				if($query){
					DB::commit();
					//Get User Data
					$user = User::where('id', $user->id)->first();
					return $this->sendResponse(new UserResource($user), trans('customer_api.update_success'));
				}else{
					DB::rollback();
					return $this->sendError('',trans('customer_api.update_error'));
				}
            }
			return $this->sendError('',trans('customer_api.update_error'));
		}catch(\Exception $e){
            DB::rollback();
			return $this->sendError('',$e);
        }
    }

	
	/**
    * WALLET
    * @return \Illuminate\Http\Response
    */
    public function wallet(Request $request){
        
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError("", trans('customer_api.invalid_user'));
        }
        
		try{
			$data = Wallet::firstOrCreate(['user_id'=>$user->id], ['user_id'=>$user->id, 'balance'=>'0']);
			if($data){
                $data->history = WalletHistoryResource::collection(WalletHistory::where('user_id', $user->id)->get());
                return $this->sendResponse(new WalletDetailResource($data),trans('customer_api.data_found_success'));
            }
            return $this->sendResponse([], trans('customer_api.data_found_empty'));
        } catch (\Exception $e) {
			return $this->sendError('', $e->getMessage());
        }
    }
	
	/**
    * WALLET
    * @return \Illuminate\Http\Response
    */
    public function getMyCode(Request $request){
        
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError("", trans('customer_api.invalid_user'));
        }
        
		try{
			$data = [
				'code' 	=> base64_encode('HU'.$user->id),
				'title' => 'Please share this code and earn 50 HealU Points \r\n Code: '. base64_encode('HU'.$user->id),
			];
			return $this->sendResponse($data,trans('customer_api.data_found_success'));
        } catch (\Exception $e) {
			return $this->sendError('', $e->getMessage());
        }
    }

	/**
	* ----------------------------------
	* UPDATE COVER IMAGE
	* @return \Illuminate\Http\Response
	* ----------------------------------
	*/
    public function updateCoverImage(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
		]);
		if($validator->fails()){
			return $this->sendError('', $validator->errors()->first());
		}
		
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError('',trans('customer_api.invalid_user'));
        }

        DB::beginTransaction();
		try{
			// Save Image
			if($request->image){
                $path = $this->saveMedia($request->file('image'));
				$query = User::where('id', $user->id)->update(['cover_image' => $path]);
				
				if($query){
					DB::commit();
					//Get User Data
					$user = User::where('id', $user->id)->first();
					return $this->sendResponse(new UserResource($user), trans('customer_api.update_success'));
				}else{
					DB::rollback();
					return $this->sendError('',trans('customer_api.update_error'));
				}
            }
			return $this->sendError('',trans('customer_api.update_error'));
		}catch(\Exception $e){
            DB::rollback();
			return $this->sendError('',$e);
        }
    }
	

    /**
    * ----------------------------------
    * SAVE FAVORITES
    * @return \Illuminate\Http\Response
    * ----------------------------------
    */
    public function save_favorites(Request $request){
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendValidationError('',$validator->errors()->first());       
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
        
        DB::beginTransaction();
        try{
            if($request->product_id){
                $rowItem = FavoriteItems::where(['product_id'=>$request->product_id, 'user_id'=>$user->id])->first();
                if($rowItem){
                    $delete = FavoriteItems::where(['id'=>$rowItem->id])->delete();
					if($delete){
					  DB::commit();
					  return $this->sendResponse('',trans('customer_api.removed_from_favorite_items'));
					}
                }else{
					$query				= new FavoriteItems;
					$query->user_id		= $user->id;
					$query->product_id	= $request->product_id;
					$query->save();
					
					if($query){
						$query->is_added = '1';
						DB::commit();
						return $this->sendResponse(new FavoriteItemsResource($query),trans('customer_api.added_to_favorite_items'));
					}
				}
            }
            DB::rollback();
            return $this->sendResponse('',trans('customer_api.save_error'));
        } catch (\Exception $e) {
          DB::rollback();
          return $this->sendError('', $e->getMessage()); 
        }
    }
}