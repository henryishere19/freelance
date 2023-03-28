<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Validator,Auth,DB,Storage,DataTables,variable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\Helpers\CommonHelper;
use App\Models\Coupon;
use App\Models\Subscribe;
use App\Models\Serviceuser;

class CouponController extends CommonController
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
  
	// ADD NEW
	public function index(){
		return view('backend.coupons.list');
	}

	// CREATE
	public function create(){
		$coupons  =  Coupon::all();
		return view('backend.coupons.add',compact('coupons'));
	}
  
	public function ajax($id = null){
		try{
			// GET LIST
			$query = Coupon::orderBy('id','DESC')->get(); 
			if($query){
				foreach($query as $key=> $list){
					$query[$key]->action = '<div class="widget-content-right widget-content-actions">
											<a class="border-0 btn-transition btn btn-outline-success" href="'. route("coupons.edit",$list->id) .'"><i class="fa fa-eye"></i></a>
											<button class="border-0 btn-transition btn btn-outline-danger" onclick="deleteThis('. $list->id .')"><i class="fa fa-trash-alt"></i></button>
											</div>';
				}
				$this->sendResponse($query, trans('coupons.data_found_success'));
			}
			$this->sendResponse([], trans('common.data_found_empty'));

		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
  
	// EDIT
	public function edit($id = null){
		$coupons = Coupon::find($id);
		return view('backend.coupons.update',compact('coupons'));
	}
  
	// STORE
	public function store(Request $request){
		if(isset($request->item_id)){
			$coupon_rule = 'required|min:3|max:9|unique:coupons,code,'.$request->item_id;
		}
		else{
			$coupon_rule = 'required|min:3|max:9|unique:coupons';
		}
		$validator = Validator::make($request->all(), [
			'title'   			 => 'required|min:3|max:99',
			'code'               => $coupon_rule,
			'discount'           => 'required|numeric',
			'discount_type'      => 'required',
			'start_date'         => 'required|date',
            'end_date' 			 => 'required|date|after:start_date',
			'status'             => 'required'
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
	
		if(isset($request->item_id)){
			$validator = Validator::make($request->all(), [
				'item_id' => 'required',
			]);
			if($validator->fails()){
				$this->ajaxValidationError($validator->errors(), trans('common.error'));
			}
		}
	
		try{
			$data = [
				'title'      	=> $request->title,
				'code'          => $request->code,
				'description'	=> $request->description,
				'discount'      => $request->discount,
				'discount_type' => $request->discount_type,
				'start_date'    => date('Y-m-d',strtotime($request->start_date)),
				'end_date'      => date('Y-m-d',strtotime($request->end_date)),
				'status'        => $request->status,
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['image'] = $this->saveMedia($request->file('image'));
			}
			
			if($request->item_id){
				// UPDATE
				$coupon  =  Coupon::find($request->item_id);
				$coupon->fill($data);
				$return  =  $coupon->save();
				
				if($return){
					$this->sendResponse([], trans('coupon.updated_success'));
				}
			} else{
				// CREATE
				$return = Coupon::create($data);
				if($return){
					$this->sendResponse([], trans('coupon.added_success'));
				}
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
  }
  
	// DESTROY
	public function destroy(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError($validator->errors(), trans('common.error'));
		}
		
		try{
			// DELETE
			$query = Coupon::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}

	public function mail(){
		$page 		= 'Subscribed User List';
		$page_title = "Subscribed User List";
		return view('backend.company.mail', compact(['page','page_title']));
	}

	public function ajax_emailList(Request $request){

		$page     = $request->page ?? '1';
		$count    = $request->count ?? '20';
		$status	  = $request->status ?? 'all';
		
		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		try{
			
			if ($request->ajax()) {
				$query = Subscribe::query();
				
				// Filters
				if($request->status != 'all'){
					//$query->where(['status' => $request->status]);
				}
				if($request->search){
					//$query->where('title','like','%'.$request->search.'%');
				}
				$data  = $query->get();
				return DataTables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], 'Error to find data');
		}
	}

	public function ajax_deleteMail(Request $request){

		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Subscribe::where(['id'=>$request->item_id])->delete();
			if($query){
				DB::commit();
				$this->sendResponse([], trans('common.delete_success'));
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.delete_error'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
    }

	// user service list
	public function serviceList(){
		$page 		= 'Popup Customer Details';
		$page_title = "Popup Customer Details";
		return view('backend.company.user_service', compact(['page','page_title']));
	}

    //ajax user service list
	public function ajax_serviceList(Request $request){

		$page     = $request->page ?? '1';
		$count    = $request->count ?? '20';
		$status	  = $request->status ?? 'all';
		
		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		try{
			
			if ($request->ajax()) {
				$query = Serviceuser::query();
				
				// Filters
				if($request->status != 'all'){
					//$query->where(['status' => $request->status]);
				}
				if($request->search){
					//$query->where('title','like','%'.$request->search.'%');
				}
				$data  = $query->get();
				return DataTables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], 'Error to find data');
		}
	}
    
	// user service delete
	public function ajax_serviceDelete(Request $request){

		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError($validator->errors(), trans('common.error'));
		}
		
		try{
			// DELETE
			$query = Serviceuser::where(['id'=>$request->item_id])->delete();
			if($query){
				
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}

	}

}