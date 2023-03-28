<?php

namespace App\Http\Controllers\Api\Common;

use Validator,DB,Auth,Authy,Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use App\Models\Helpers\CommonHelper;
use App\Http\Controllers\Api\BaseController;

use App\Models\Module;
use App\Http\Resources\ModuleListResource;


class ModuleController extends BaseController
{
	use CommonHelper;
	
    /**
    * ----------------------------------
    * GET MODULE LIST
    * @return \Illuminate\Http\Response
    * ----------------------------------
    */
    public function index(Request $request){
        
        try{
			$data = Module::where('status', 'active')->get();
            if($data->count() > 0){
				return $this->sendArrayResponse(ModuleListResource::collection($data),trans('customer_api.data_found_success'));
            }
            return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
        } catch (\Exception $e) { 
			return $this->sendError([], $e->getMessage()); 
        }
    }
}