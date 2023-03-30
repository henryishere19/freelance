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
  	
	public function index(){
		$page 		= 'Casestudy';
		$page_title = "Casestudy";
		return view('backend.casestudy.list',compact('page','page_title'));
	}

	public function create(){
		$service = Service::where('status','active')->get();
		return view('backend.casestudy.create',[
			'services' => $service
		]);
	}
	
	public function edit($id = null){
		$page 		= 'Casestudy';
		$page_title = "Casestudy";	
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		$data = Casestudy::find($id);
		$services = Service::where('status','active')->get();
		if($data){
			return view('backend.casestudy.edit',compact('page','page_title', 'data','services'));
		}
		return redirect()->route('admin.casestudy.index');
	}
	
	public function ajax_list(Request $request){
		$page     = $request->page ?? '1';
		$count    = $request->count ?? '20';
		$status	  = $request->status ?? 'all';
		
		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		$user = Auth()->user();
		try{
			if ($request->ajax()) {
				// $query = Casestudy::query();
				// Filters
				if($request->status != 'all'){
					//$query->where(['status' => $request->status]);
				}
				if($request->search){
					//$query->where('title','like','%'.$request->search.'%');
				}
				$data  =  Casestudy::select(DB::raw('*, (SELECT home_page_title FROM service WHERE id = casestudy.services_id) as service_name'))->get();
				return DataTables::of($data)
						->addIndexColumn()
						->addColumn('image', function($row){
							$image = asset(config('constants.DEFAULT_PRODUCT_IMAGE'));
							if($row->image){ $image = asset($row->image); }
							return '<img src="'. $image .'" height="50px" width="50px">';
					 	})
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="'. route("admin.casestudy.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-pen"></i></a>
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
	
	public function store(Request $request){
		$validationRule = [
			'title'       		=> 'required|min:3|max:99',
			'status'			=> 'required',
			'image' => 'sometimes|image|mimes:jpeg,png,jpg',
			'select_content_or_blog' => 'required',
			'service' => 'required',
			'short_description' => 'required',
			'post_author' => 'required',
			'image_header' => 'sometimes|image|mimes:jpeg,png,jpg'
		];
		if($request->select_content_or_blog == 'file'){
			$validationRule['fileupload'] = 'required|mimes:pdf,xlx,csv|max:2048';
		}
		$validator = Validator::make($request->all(), $validationRule);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}		
		try{
			$data = [
				'title'			=> $request->title,
				'description'   => $request->description??"",
				'status'			=> $request->status,
				'image' => $this->saveMedia($request->file('image')),
				'show_content' => $request->select_content_or_blog,
				'services_id' => $request->service,
				'post_date' => $request->post_date??null,
				'user_id' => Auth::user()->id,
				'short_description' =>$request->short_description,
				'post_author' =>$request->post_author,
				'image_header' => $this->saveMedia($request->file('image_header'))
			];

			if($data['show_content'] == 'file' && $request->fileupload != 'undefined'){
				$validator = Validator::make($request->all(), [
					'fileupload' => 'required|mimes:pdf,xlx,csv|max:2048',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$fileName = str_shuffle(md5(time())).'.'.$request->fileupload->extension();  
        		$request->fileupload->move(public_path('casestudy'), $fileName);
				$data['file'] = $fileName;
			}else if($request->description !== null && $request->description != 'undefined'){
				$data['description'] = $request->description;
			}else{
				$this->ajaxError([], 'Please fill description');
			}
			Casestudy::create($data);
			$this->sendResponse([], trans('Casestudy Added Successfully'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}

	// STORE
	public function update(Request $request){
		$validationRule = [
			'title'       		=> 'required|min:3|max:99',
			'status'			=> 'required',
			'select_content_or_blog' => 'required',
			'service' => 'required',
			'item_id' => 'required',
			'short_description' => 'required',
			'post_author' => 'required',
		];
		if($request->select_content_or_blog == 'file' && $request->fileupload != 'undefined'){
			$validationRule['fileupload'] = 'required|mimes:pdf,xlx,csv|max:2048';
		}
		$validator = Validator::make($request->all(), $validationRule);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}		
		try{

			$getData = Casestudy::find($request->item_id);
			if(empty($getData)){
				$this->ajaxError([],'Something went wrong');
			}
			$data = [
				'title'			=> $request->title,
				'description'   => $request->description??"",
				'status'			=> $request->status,
				'show_content' => $request->select_content_or_blog,
				'services_id' => $request->service,
				'post_date' => $request->post_date??null,
				'user_id' => Auth::user()->id,
				'short_description' =>$request->short_description,
				'post_author' =>$request->post_author
			];

			if($request->image != 'undefined'){
				$data['image'] =  $this->saveMedia($request->file('image'));
			}
			if($request->image_header != 'undefined'){
				$data['image_header'] =  $this->saveMedia($request->file('image_header'));
			}
			
			// dd($request->fileupload);
			if($data['show_content'] == 'file' && $request->fileupload != 'undefined'){
				$validator = Validator::make($request->all(), [
					'fileupload' => 'required|mimes:pdf,xlx,csv|max:2048',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$fileName = str_shuffle(md5(time())).'.'.$request->fileupload->extension();  
        		$request->fileupload->move(public_path('casestudy'), $fileName);
				$data['file'] = $fileName;
				$data['description'] = null;
			}else if($data['show_content'] == 'blog' && $request->description !== null && $request->description !== 'undefined'){
				$data['description'] = $request->description;
				$data['file'] = null;
			}else if($data['show_content'] == 'blog' || $data['show_content'] == 'file' && $getData->file == null){ 
				// $this->ajaxError([], 'Please enter description or select file',422);
				return $this->ajaxError([],'Please fill description');
			}

			Casestudy::where('id',$request->item_id)->update($data);
			$this->sendResponse([], trans('Casestudy Updated Successfully'));
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