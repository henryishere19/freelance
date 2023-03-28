<?php
namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseController;

use Validator,DB,Settings,Auth,AuthyApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Helpers\CommonHelper;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends BaseController
{
    // SUBMIT REVIEW
    public function submit(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id'		=> 'required',
			'relation_id'	=> 'required',
			'rating'		=> 'required',
			'review'		=> 'required',
		]);
		if($validator->fails()){
			return $this->sendValidationError('', $validator->errors()->first());
		}

		$user = Auth::user();
		if(empty($user)){
			return $this->sendUnauthorizedError([], trans('customer_api.invalid_user'));
		}

		DB::beginTransaction();
		try{
			$data = [
			  'user_id'		=> $user->id,
			  'item_id'		=> $request->item_id,
			  'relation_id'	=> $request->relation_id,
			  'rating'      => $request->rating,
			  'review'      => $request->review,
			];
			
			$details = Review::where(['user_id' => $user->id, 'relation_id' => $request->relation_id])->first();
			if($details){
				$query = Review::where('id', $details->id)->update($details);
			}
			else{
				$query = Review::create($data);
			}
			
			
			if($query){
				$rating = Review::where(['item_id'=>$request->item_id])->avg('rating');
				$count  = Review::where(['item_id'=>$request->item_id])->count();
				$query = Product::where('id', $request->item_id)->update(['rating'=>$rating, 'total_rate'=>$count]);
				if($query){
					DB::commit();
					return $this->sendResponse([], trans('customer_api.review_submitted_success'));
				}
			}
			DB::rollback();
			return $this->sendError([], trans('customer_api.failed_to_submitted_review'));
		
		}catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError([], $e->getMessage());
		}
	}
}