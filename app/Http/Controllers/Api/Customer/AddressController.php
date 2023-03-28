<?php

namespace App\Http\Controllers\Api\Customer;

use Validator,DB,Auth,Authy,Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use App\Models\Helpers\CommonHelper;
use App\Http\Controllers\Api\BaseController;

use App\Models\Address;

use App\Http\Resources\AddressListResource;


class AddressController extends BaseController
{
	use CommonHelper;
	
    /**
    * ----------------------------------
    * GET ADDRESSES
    * @return \Illuminate\Http\Response
    * ----------------------------------
    */
    public function index(Request $request){
        
        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }
        
        try{
			$query = Address::query();
            $query->where('user_id','=',$user->id);
            $query = $query->orderBy('id', 'DESC')->get();
            if($query){
                return $this->sendArrayResponse(AddressListResource::collection($query),trans('customer_api.data_found_success'));
            }
            return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
        } catch (\Exception $e) { 
          return $this->sendError([], $e->getMessage()); 
        }
    }

    /**
    * ----------------------------------
    * SAVE ADDRESS
    * @return \Illuminate\Http\Response
    * ----------------------------------
    */
    public function save_address(Request $request){
        
        $validator = Validator::make($request->all(),[
            'address_type'  => 'required|min:3|max:100',
            'name'       	=> 'required|min:3|max:1000',
            'address'       => 'required|min:3|max:1000',
            'city_id'       => 'required',
            'pincode'   	=> 'required|min:3|max:10',
			'latitude'   	=> 'required',
            'longitude'   	=> 'required'
        ]);

        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
        }

        $data = array(
            'name'  		=> $request->name,
            'address_type'  => $request->address_type,
            'city_id'       => $request->city_id,
            'address'       => $request->address,
            'pincode'   	=> $request->pincode,
            'user_id'       => $user->id,
			'latitude'		=> $request->latitude,
            'longitude'		=> $request->longitude,
        );
        
		DB::beginTransaction();
        try{
            if($request->address_id){
                Address::where('id', $request->address_id)->update($data);
                $query = Address::where('id', $request->address_id)->first();
            }else{
               $query = Address::create($data);
            }
            if($query){
                DB::commit();
                return $this->sendArrayResponse([], trans('customer_api.data_saved_success'));
            }
            return $this->sendArrayResponse([], trans('customer_api.data_saved_error'));
        } catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage());
        }
    }

    /**
    * ----------------------------------
    * DELETE ADDRESS
    * @return \Illuminate\Http\Response
    * ----------------------------------
    */
    public function delete_address(Request $request){
        
        $validator = Validator::make($request->all(),[
            'address_id' => 'required|exists:addresses,id',
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
			$delete = Address::where(['id'=>$request->address_id, 'user_id'=>$user->id])->delete();
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