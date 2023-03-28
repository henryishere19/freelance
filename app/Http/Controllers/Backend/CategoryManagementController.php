<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage;
use Illuminate\Validation\Rule;
use App\Models\Helpers\CommonHelper;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryManagementController extends CommonController
{   
	use CommonHelper;
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		//$this->middleware('permission:category-list', ['only' => ['index','ajax','show']]);
		//$this->middleware('permission:category-create', ['only' => ['create','store']]);
		//$this->middleware('permission:category-edit', ['only' => ['edit','update']]);
		//$this->middleware('permission:category-delete', ['only' => ['destroy']]);
	}
	public function show(){

	}
	// LIST
	public function index($module = 'Blog'){
		try{
			$page_title = 'Categories';
			
			return view("backend.categories.list", compact(['page_title', 'module']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	public function create($module = 'Blog'){
		$page_title = 'Add Category';
		
		return view("backend.categories.add", compact(['page_title', 'module']));
	}
	
	// EDIT PAGE
	public function edit($module = null, $id = ''){
		try {
			$data = Category::where('id',$id)->first();
			if($data){
				$page_title = $data->title;
				return view("backend.categories.edit", compact(['page_title','data', 'module']));
			}
			return redirect()->route('dashboard');
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}

	// AJAX LIST
	public function ajax_list(Request $request){
		$page     = $request->page ?? '1';
		$count    = $request->count ?? '10';
		$status    = $request->status ?? 'all';
		
		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		
		try{
			// GET LIST
			$query = Category::where('module', $request->module);
			
			// STATUS
			if($status != 'all'){
				$query->where('status', $status);
			}
			
			$data  = $query->orderBy('id', 'DESC')->offset($start)->limit($count)->get();
			return Datatables::of($data, $request->module)
					->addIndexColumn()
					->addColumn('action', function($row){
						   return '<div class="d-flex justify-content-end flex-shrink-0">
										<a href="'. route("category.edit",["Blog", $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
										<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
									</div>';
					})
					->addColumn('image', function($row){
						   $image = asset(config('constants.DEFAULT_PRODUCT_IMAGE'));
						   if($row->image){ $image = asset($row->image); }
						   return '<img src="'. $image .'" height="50px" width="50px">';
					})
					->editColumn('status', function($row){
						if($row->status == 'active'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active" selected>Active</option><option value="draft">Draft</option><option value="inactive">Inactive</option></select>';
						}
						if($row->status == 'inactive'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active">Active</option><option value="draft">Draft</option><option value="inactive" selected>Inactive</option></select>';
						}
					})
					->escapeColumns([])
					->make(true);
			// $this->sendResponse([], trans('common.data_found_empty'));

		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// STORE
	public function store(Request $request){

		$validator = Validator::make($request->all(), [
			'module'			=> 'required|min:3|max:99',	
			'title'			=> 'required|min:3|max:99',	
			'description'	=> 'required|min:3|max:99',	
			'status'			=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		$data =  $request->all();
		$user = Auth()->user();
 		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
	
		if($request->item_id){
			$validator = Validator::make($request->all(), [
				'item_id' => 'required',
			]);
			if($validator->fails()){
				$this->ajaxValidationError($validator->errors(), trans('common.error'));
			}
		}
	
		try{
			$data = [
				'module'       	 => $request->module,
				'title:en'       => $request->title,
				'description:en' => $request->description,
				'priority'       => $request->priority,
				'status'         => $request->status,
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$data['image'] =  $this->saveMedia($request->file('image'));
			}
			
			if($request->item_id){
				// UPDATE
				$category  =  Category::find($request->item_id);
				$category->fill($data);
				$return  =  $category->save();
				
				if($return){
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$return = Category::create($data);
				if($return){
					$this->sendResponse([], trans('common.added_success'));
				}
			}
			$this->ajaxError([], trans('common.try_again'));

		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
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
			$query = Category::where('id',$request->id)->update(['status'=>$request->status]);
			if($query){
			  DB::commit();
			  $this->sendResponse(['status'=>'success'], trans('common.updated_success'));
			}else{
			  DB::rollback();
			  $this->sendResponse(['status'=>'error'], trans('common.updated_error'));
			}
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* --------------
	* DESTROY
	* --------------
	*/
	public function destroy(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], 'Invalid Category');
		}
		
		try{
			// DELETE
			$query = Category::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
}