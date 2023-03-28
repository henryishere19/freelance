<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\Helpers\CommonHelper;
use App\Models\FAQTopic;

class FaqTopicController extends CommonController
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
  
	// FAQ LIST
	public function index(){
		return view('backend.faq-topics.list');
	}

	// CREATE
	public function create(){
		
		return view('backend.faq-topics.add');
	}
	
	// EDIT
	public function edit($id = null){
		$data 	= FAQTopic::find($id);
		return view('backend.faq-topics.edit',compact('data'));
	}
  
	public function ajax_list(Request $request){
		$status    = $request->status ?? 'all';
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		
		try{
			if ($request->ajax()) {
				$query = FAQTopic::query();
				
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
												<a href="'. route("faq-topics.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], 'Error to find data');
		}
	}
	 /**
	* --------------
	* Change Status
	* --------------
	*/
	public function change_status(Request $request){
		DB::beginTransaction();
		try {
			$query = FAQTopic::where('id',$request->id)->update(['status'=>$request->status]);
			if($query){
			  DB::commit();
			  $this->sendResponse([], trans('common.updated_success'));
			}else{
			  DB::rollback();
			  $this->ajaxError([], trans('common.updated_error'));
			}
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	// STORE
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
			'title'			=> 'required|min:1|max:99',
			'priority'		=> 'required|min:1|max:99',
			'status'		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		$user = Auth()->user();
 		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
	
		DB::beginTransaction();
		try{
			$data = [
				'title'		=> $request->title,
				'priority'	=> $request->priority,
				'status'	=> $request->status,
			];
			
			if($request->item_id){
				
				// Validation
				if($request->item_id){
					$validator = Validator::make($request->all(), [
						'item_id' => 'required',
					]);
					if($validator->fails()){
						$this->ajaxError([], $validator->errors()->first());
					}
				}
				
				// UPDATE
				$faq = FAQTopic::find($request->item_id);
				$faq->fill($data);
				$return = $faq->save();
				
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$return = FAQTopic::create($data);
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.added_success'));
				}
			}
			DB::rollback();
			$this->ajaxError([], trans('common.try_again'));

		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
  
	// DESTROY
	public function destroy(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = FAQTopic::where(['id'=>$request->item_id])->delete();
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
}