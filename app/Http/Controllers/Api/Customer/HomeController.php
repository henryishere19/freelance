<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Validator,Auth;

use App\Models\Slider;
use App\Models\Slide;
use App\Models\Product;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SlideListResource;
use App\Http\Resources\DashboardResource;
use App\Http\Resources\ProductListResource;

class HomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	*/
    public function dashboard(Request $request){
		
		try{
			$query = Slider::where(['slug'=> 'dashboard'])->orderBy('id', 'DESC')->first();
			if($query){
				$slider = SlideListResource::collection(Slide::where(['status'=>'active', 'slider_id'=>$query->id])->orderBy('id', 'DESC')->get());
			}
			
			$data 			= new \stdClass();
			$data->slider 	= $query ? $slider : [];
			$data->tests 	= ProductListResource::collection(Product::where(['status'=> 'active'])->orderBy('priority', 'ASC')->get());
			
			return $this->sendResponse(new DashboardResource($data),trans('customer_api.data_found_success'));
		}catch (\Exception $e) { 
			return $this->sendError('', $e->getMessage());
		}
	}
}