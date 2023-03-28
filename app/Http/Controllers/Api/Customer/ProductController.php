<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

use Validator,DB,AuthyApi,Settings;

use App\Models\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryListResource;

class ProductController extends BaseController
{
	/**
	* Product List
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request){
		$search = $request->search;
		$page   = $request->page ?? 1;
		$count  = $request->count ?? '100';

		if ($page <= 0){ $page = 1; }
		$offset = $count * ($page - 1);

		try{
			$query = Product::query(); 
			
			/* SEARCH */
			if($search){
			  $query = $query->whereHas('translation',function($query) use ($search){
				$query->where('title','like','%'.$search.'%');
			  });
			}

			/* PRICE FILTERS */
			if($request->short_by){
			  if($request->price == 'high_to_low'){
				$query = $query->orderBy('price', 'DESC');
			  }else if($request->price == 'low_to_low'){
				$query = $query->orderBy('price', 'ASC');
			  }
			}else{
				$query = $query->orderBy('id', 'DESC');
			}
			
			/* CATEGORY FILTERS */
			if(!empty($request->category_id)){
				$query->whereIn('category_id', [$request->category_id]);
			}
			
			// Get Count without Limit
			$count_total = $query->count();

			$query = $query->offset($offset)->limit($count)->get();
			if($query){
			  return $this->sendArrayResponse(ProductListResource::collection($query), trans('customer_api.data_found_success'), $count_total);
			}
			return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage()); 
		}
	}

	/**
	* Product Details
	* @return \Illuminate\Http\Response
	*/
	public function single($id){
		try{
			$query = Product::where('id', $id)->first(); 
			if($query){
				return $this->sendArrayResponse(new ProductResource($query), trans('customer_api.data_found_success'));
			}
			return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage()); 
		}
	}
	
	/**
	* Display a listing of Categories.
	* @return \Illuminate\Http\Response
	*/
	public function categories(Request $request){
		try{
			$data = Category::where(['module'=>'product', 'status'=>'active'])->orderBy('id')->get();
			if(count($data) > 0){
				return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
			}
			return $this->sendArrayResponse(CategoryListResource::collection($data), trans('customer_api.data_found_success'));
		}catch (\Exception $e) { 
			return $this->sendError([], $e->getMessage());
		}
    }
}