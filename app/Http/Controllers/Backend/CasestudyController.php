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
use App\Models\Casestudy;
use App\Models\Service;
use App\Models\Media;
class CasestudyController extends CommonController
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
		$page 		= 'Casestudy';
		$page_title = "Casestudy";
		return view('backend.casestudy.list',compact('page','page_title'));
	}

	// CREATE
	public function create(){
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		$data = Casestudy::create(['title'=> '']);
		if($data){
			return redirect()->route('casestudy.edit',$data->id);
		}
		return redirect()->route('casestudy.index');
	}
	
	// EDIT
	public function edit($id = null){
		$page 		= 'Casestudy';
		$page_title = "Casestudy";
		
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		$data = Casestudy::find($id);
		$service = Service::where('status','active')->get();
		if($data){
			return view('backend.casestudy.edit',compact('page','page_title', 'data','service'));
		}
		return redirect()->route('casestudy.index');
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
				$query = Casestudy::query();
				
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
						->addColumn('image', function($row){
							$image = asset(config('constants.DEFAULT_PRODUCT_IMAGE'));
							if($row->image){ $image = asset($row->image); }
							return '<img src="'. $image .'" height="50px" width="50px">';
					 	})
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="'. route("casestudy.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
											</div>';
						})->rawColumns(['action'])
						->escapeColumns([])
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
			$query = Casestudy::where('id',$request->id)->update(['status'=>$request->status]);
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
			'status'			=> 'required',
			'type'				=>'required',
			'page_for'			=>'required'
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
			if($request->link)
			{
				$link = $request->link;
			}
			elseif($request->links)
			{
				$link = $request->links;
			}
			else{
				$link = "";
			}
			$data = [
				'title'			=> $request->title,
				'type'			=> $request->type,
				'link'			=> $link,
				'description'   => $request->description,
				'page_for'		=>$request->page_for,
				'status'			=> $request->status,
			];
			if(!empty($request->image) && $request->image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['image'] = $this->saveMedia($request->file('image'));
			}
			if(!empty($request->fileupload) && $request->fileupload != 'undefined'){
				$validator = Validator::make($request->all(), [
					'fileupload' => 'required|mimes:pdf,xlx,csv|max:2048',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$fileName = time().'.'.$request->fileupload->extension();  
        		$request->file->move(public_path('casestudy'), $fileName);
				$data['file'] = $fileName;
			}

			if($request->item_id){
				// UPDATE
				$product = Casestudy::find($request->item_id);
				
				$product->fill($data);
				$return = $product->save();
				
				if($return){
					DB::commit();
					$this->sendResponse([], trans('Casestudy updated Successfully'));
				}

			} else{
				// CREATE
				$return = Casestudy::create($data);
				if($return){
					DB::commit();
					$this->sendResponse([], trans('Casestudy Added Successfully'));
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
			$query = Casestudy::where(['id'=>$request->item_id])->delete();
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