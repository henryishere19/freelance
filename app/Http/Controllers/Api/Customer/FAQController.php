<?php
namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseController;

use Validator,DB,Settings,Auth,AuthyApi;
use Illuminate\Http\Request;

use App\Models\Helpers\CommonHelper;
use App\Models\FAQ;
use App\Models\FAQTopic;

use App\Http\Resources\FAQListResource;
use App\Http\Resources\FAQTopicListResource;

class FAQController extends BaseController
{
    /**
	* LIST
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request){
		$page   = $request->page ?? 1;
		$count  = $request->count ?? '100';

		if ($page <= 0){ $page = 1; }
		$offset = $count * ($page - 1);
		
		$user = Auth::user();
		if(empty($user)){
			//return $this->sendUnauthorizedError([], trans('customer_api.unauthorized_access'));
		}

		try{
			$query = FAQTopic::where('status', 'active')->orderBy('priority', 'asc')->offset($offset)->limit($count)->get();
			if($query->count() > 0){
				foreach($query as $key=> $list){
					$query[$key]['list'] = FAQListResource::collection(FAQ::where('status', 'active')->where('topic', $list->id)->orderBy('priority', 'asc')->get());
				}
				return $this->sendArrayResponse(FAQTopicListResource::collection($query), trans('customer_api.data_found_success'));
			}
			return $this->sendArrayResponse([], trans('customer_api.data_found_empty'));
		}catch (\Exception $e) { 
			DB::rollback();
			return $this->sendError('', $e->getMessage()); 
		}
	}
}