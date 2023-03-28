<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use Validator,Auth,DB,Storage,DataTables;

use App\Models\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Leader;
use App\Models\Media;
use App\Models\Variation;
use App\Models\VariationGroup;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;

class LeadershipsController extends CommonController
{   
	use CommonHelper;
	
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct()
	{
        $this->middleware('auth');
        //$this->middleware('permission:product-list', ['only' => ['index','show']]);
        //$this->middleware('permission:product-create', ['only' => ['create','store']]);
        //$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
  
	// ADD NEW
	public function index(){
		$page 		= 'products.index';
		$page_title = trans('product.heading');
		
		return view('backend.leader.list', compact('page', 'page_title'));
	}

	// CREATE
	public function create(){
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		$data = Leader::create(['title:en'=> '', 'description:en' => '']);
		if($data){
			return redirect()->route('leader.edit',$data->id);
		}
		return redirect()->route('leader.index');
	}

	// EDIT
	public function edit($id = null){
		$page 		= 'products.edit';
		$page_title = trans('leader.edit');
		
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		$data = Leader::find($id);
		if($data){
			return view('backend.leader.edit',compact('page','page_title', 'data'));
		}
		return redirect()->route('leader.index');
	}
  
	// AJAX LIST
	public function ajax_list(Request $request){
		$status = $request->status ?? 'all';
		
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		try{
			if($request->ajax()){
				$query = Leader::query();
				
				// IF SuperAdmin
				// STATUS
				if($status != 'all'){
					$query->where('status', $status);
				}
				
				$data = $query->orderBy('id', 'DESC')->get();
				return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
						   return '<div class="d-flex justify-content-end flex-shrink-0">
										<a href="'. route("leader.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
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
						if($row->status == 'active'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active">Active</option><option value="draft" selected>Draft</option><option value="inactive">Inactive</option></select>';
						}
						if($row->status == 'inactive'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active">Active</option><option value="draft">Draft</option><option value="inactive" selected>Inactive</option></select>';
						}
					})
					->escapeColumns([])
					->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
  
	// STORE
	public function store(Request $request){
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
				'meta_description'		=> $request->post_seo_keywords,
			];

			if($request->type == "content")
			{
				$data['leadervalue'] = json_encode($content_main_arr);
			}
			else{
				$data['title'] = $request->titleprofile;
				$data['designation']	= $request->designation;
				$data['priority']	= $request->priority;
				$data['linkdinlink']	= $request->link;
				$data['status']			= $request->status;
			}
			
			// MEDIA UPLOAD
			if(!empty($request->imageprofile) && $request->imageprofile != 'undefined'){
				$validator = Validator::make($request->all(), [
					'imageprofile' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['image'] = $this->saveMedia($request->file('imageprofile'));
			}

			if($request->item_id){
				// UPDATE
				$product = Leader::find($request->item_id);
				if($request->imageprofile == 'undefined'){
					$data['image'] = $product->image;
				}
				$product->fill($data);
				$return = $product->save();
				
				if($return){
					DB::commit();
					$this->sendResponse([], trans('product.updated_success'));
				}

			} else{
				// CREATE
				$return = Leader::create($data);
				if($return){
					DB::commit();
					$this->sendResponse([], trans('product.added_success'));
				}
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.try_again'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}

	/**
	* --------------------
	* Save Product Gallery
	* --------------------
	*/
	public function storeGallery(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' 	=> 'required',
			'file' 		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			// MEDIA UPLOAD
			if(!empty($request->file) && $request->file != 'undefined'){
				$validator = Validator::make($request->all(), [
					'file' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxError([], $validator->errors()->first());
				}
				// Check Limit
				$count = Media::where(['reation'=>'Product', 'reation_id'=>$request->item_id])->get()->count();
				// if($count > 5){
				// 	$this->ajaxError([], trans('common.maximum_media_upload_validation'));
				// }
				
				$media = $this->saveMedia($request->file('file'));
				
				$data = [
					'title' 		=> $request->file('file')->getClientOriginalName(),
					'media' 		=> $media,
					'reation' 		=> 'Product',
					'reation_id'	=> $request->item_id,
				];
				$query = Media::create($data);
				if($query){
					DB::commit();
					$data['media'] = asset($media);
					$this->sendResponse($data, trans('common.saved_success'));
				}
			}
			DB::rollback();
			$this->sendResponse([], trans('common.removed_success'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* --------------
	* Save Product Category
	* --------------
	*/
	public function categoryList(Request $request){
		$validator = Validator::make($request->all(), [
			'product_id' => 'required|exists:products,id',
		]);
		if($validator->fails()){
			$this->ajaxError('', $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			$data = ProductCategory::where('product_id',$request->product_id)->get();
			if($data){
				DB::commit();
				$this->sendArrayResponse($data, trans('product.data_found_success'));
			}
			$this->sendArrayResponse([], trans('product.data_found_empty'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	
	/**
	* --------------
	* Save Product Attributes
	* --------------
	*/
	public function saveAttribute(Request $request){
		$validator = Validator::make($request->all(), [
			'product_id'	=> 'required|exists:products,id',
			'item_id'		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxError('', $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			$data = ProductAttribute::where('attribute_id',$request->item_id)->where('product_id',$request->product_id)->first();
			if($data){
				$query = ProductAttribute::where('attribute_id',$request->item_id)->where('product_id',$request->product_id)->delete();
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.removed_success'));
				}
			}else{
				$query = ProductAttribute::create(['attribute_id'=>$request->item_id, 'product_id'=>$request->product_id]);
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.saved_success'));
				}
			}
			$this->ajaxError([], trans('common.try_again'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* --------------
	* Save Product Variation
	* --------------
	*/
	public function saveVariation(Request $request){
		$validator = Validator::make($request->all(), [
			'product_id'	=> 'required|exists:products,id',
			'variation_id'	=> 'required',
			'price'  		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxError('', $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			
			$insertData = [
				'product_id' 	=> $request->product_id,
				'variation_id' 	=> $request->variation_id,
				'price' 		=> $request->price,
				'sale_price'	=> $request->sale_price,
			];
			
			$data = ProductVariation::where('product_id',$request->product_id)->where('variation_id',$request->variation_id)->first();
			if($data){
				$query = ProductVariation::where('attribute_id',$request->attribute_id)->where('product_id',$request->product_id)->update($insertData);
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.update_success'));
				}
			}else{
				$query = ProductVariation::create($insertData);
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.saved_success'));
				}
			}
			$this->ajaxError([], trans('common.try_again'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* --------------
	* Save Product Category
	* --------------
	*/
	public function save_category(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id'		=> 'required',
			'product_id'  	=> 'required|exists:products,id',
		]);
		if($validator->fails()){
			$this->ajaxError('', $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try {
			$data = ProductCategory::where('category_id',$request->item_id)->where('product_id',$request->product_id)->first();
			if($data){
				$query = ProductCategory::where('category_id',$request->item_id)->where('product_id',$request->product_id)->delete();
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.removed_success'));
				}
			}else{
				$query = ProductCategory::create(['category_id'=>$request->item_id, 'product_id'=>$request->product_id]);
				if($query){
					DB::commit();
					$this->sendResponse('', trans('common.saved_success'));
				}
			}
			$this->ajaxError([], trans('common.try_again'));
		} catch (Exception $e) {
			DB::rollback();
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
			$query = Leader::where('id',$request->id)->update(['status'=>$request->status]);
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
			$this->ajaxError($validator->errors(), trans('common.error'));
		}
		
		try{
			// DELETE
			$query = Leader::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
}