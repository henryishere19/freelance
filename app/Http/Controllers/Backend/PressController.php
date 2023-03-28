<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\Helpers\CommonHelper;
use App\Models\Faq;
use App\Models\FAQTopic;
use App\Models\Company;
use App\Models\Pressrelease;
use App\Models\Media;
class PressController extends CommonController
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
  
	// Company LIST
	public function index(){
		return view('backend.press-release.list');
	}

	// CREATE
	public function create(){
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		$data = Pressrelease::create(['title'=> '', 'description' => '']);
		if($data){
			return redirect()->route('pressrelease.edit',$data->id);
		}
		return redirect()->route('pressrelease.index');
	}
	
	// EDIT
	public function edit($id = null){
		$page 		= 'press-release';
		$page_title = trans('product.edit');
		
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		$data = Pressrelease::find($id);
		if($data){
			$gallery	= Media::where('reation_id', $data->id)->get();
			return view('backend.press-release.edit',compact('page','page_title', 'data','gallery'));
		}
		return redirect()->route('press-release.index');
	}
	public function ajax_list(Request $request){
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
				$query = Pressrelease::query();
				
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
												<a href="'. route("pressrelease.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
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
			$query = Faq::where('id',$request->id)->update(['status'=>$request->status]);
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
			'title'       		=> 'required|min:3|max:99',
			'description'		=> 'required|min:3|max:10000',
			'link'				=> 'required',
			'status'			=> 'required',
			'priority'			=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		$user = Auth()->user();
 		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		if($request->item_id){
			$validator = Validator::make($request->all(), [
				'item_id' => 'required',
			]);
			if($validator->fails()){
				$this->ajaxValidationError($validator->errors(), trans('common.error'));
			}
		}
		DB::beginTransaction();
		try{
			$data = [
				'title'			=> $request->title,
				'description'	=> $request->description,
				'priority'		=> $request->priority,
				'link'			=>$request->link,
				'status'		=> $request->status,
			];
			if(!empty($request->image) && $request->image != 'undefined'){
				$data['image'] =  $this->saveMedia($request->file('image'));
			}
			if($request->item_id){
				// UPDATE
				$product = Pressrelease::find($request->item_id);
				
				$product->fill($data);
				$return = $product->save();
				
				if($return){
					DB::commit();
					$this->sendResponse([], trans('Company updated Successfully'));
				}

			} else{
				// CREATE
				$return = Pressrelease::create($data);
				if($return){
					DB::commit();
					$this->sendResponse([], trans('Company Added Successfully'));
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
			$query = Pressrelease::where(['id'=>$request->item_id])->delete();
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