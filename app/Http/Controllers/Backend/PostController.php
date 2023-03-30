<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage;
use Illuminate\Validation\Rule;

use App\Models\Helpers\CommonHelper;
use App\Models\Post;
use App\Models\Category;
use App\Models\Service;
use Yajra\DataTables\DataTables;
class PostController extends CommonController
{   
	use CommonHelper;
	
	/**
	* Create a new controller instance.
	* @return void
	*/
	
	public function __construct()
	{
		//$this->middleware('permission:user-management-list', ['only' => ['index','ajax','show']]);
		//$this->middleware('permission:user-management-create', ['only' => ['create','store']]);
		//$this->middleware('permission:user-management-edit', ['only' => ['edit','update']]);
		//$this->middleware('permission:user-management-delete', ['only' => ['destroy']]);
	}
  
	// LIST
	public function index($post_type = 'blog'){
		try{
			$page_title = $post_type .' List';
			
			return view("backend.post-management.list", compact(['page_title', 'post_type']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// CREATE PAGE
	public function create($post_type = ''){
		$page_title = 'Create New '. $post_type;
		
		$data = Post::create(['title'=> '', 'description' => '', 'status' =>'draft']);
		if($data){
			return redirect()->route('page.post.edit', [$post_type, $data->id]);
		}
		return redirect()->route('page.post.management', [$post_type]);
	}
	
	// EDIT PAGE
	public function edit($id = ''){
		$page_title = 'Edit '. $post_type;
		
		$data = Post::find($id);
		if($data){
			$categories	= Category::where(['status'=>'active', 'module'=>$data->post_type])->get();
			return view('backend.post-management.edit', compact(['page_title', 'data', 'categories']));
		}
		return redirect()->route('page.post.management', [$data->post_type]);
	}

	// AJAX LIST
	public function ajax_list(Request $request){
		try{
			$query = Post::select(DB::raw('*,(SELECT slug FROM service WHERE id = posts.services_id) as service_name'))->where('post_type', "blog");
			
			// SEARCH
			// if($request->search){
			// 	$query->where('title','like','%'.$request->search.'%');
			// }
			$data = $query->get();
			return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
						   return '<div class="d-flex justify-content-end flex-shrink-0">
										<a href="'. route('page.post.edit', ["blog", $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
										<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
									</div>';
					})
					->addColumn('image', function($row){
						   $image = asset(config('constants.DEFAULT_PRODUCT_IMAGE'));
						   if($row->image){ $image = asset($row->image); }
						   return '<img src="'. $image .'" height="50px" width="50px">';
					})
					->addColumn('category', function($row){
						$ids = explode(',',$row->category);
						$category = Category::wherein('id',$ids)->get();
						$arra = []; 
						foreach($category as $cat){
								$arra[] = $cat->title; 
							}
						return implode(',',$arra);
				 	})
					 
					 ->editColumn('created_at', function($row){
						return date('d M Y h:i A',strtotime($row->created_at));
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
			$this->sendResponse([], trans('common.data_found_empty'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// DETAILS PAGE
	public function show($post_type = null, $id = ''){
		try {
			$services = Service::where('slug','!=','')->get();
			$page_title = 'Edit '. $post_type;
			$data 		= Post::where('id',$id)->first();
			if($data){
				return view("backend.post-management.edit", compact(['page_title','data', 'post_type','services']));
			}
			return redirect()->route('homePage');
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// STORE
	public function store(Request $request){

		$validator = Validator::make($request->all(), [
			'post_type'		=> 'required',
			'title'			=> 'required|min:3|max:99',
			'status'		=> 'required',
			'service'   => 'required',
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
				'post_type'				=> $request->post_type,
				'title'       			=> $request->title,
				'category'       		=> $request->category,
				'slug'       			=> $request->slug,
				'description'			=> $request->description,
				'short_description'			=> $request->shortdescription,
				'author'			=> $request->author,
				'post_date'			=> $request->post_date,
				
				'post_seo_title'		=> $request->seo_title,
				'post_seo_keywords'		=> $request->seo_keywords,
				'post_seo_description'	=> $request->seo_description,
				'page_title'	=> $request->page_title,
				
				'status' 				=> $request->status,
				'services_id' => $request->service
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['image'] =  $this->saveMedia($request->file('image'));
			}
			
			// BANNER IMAGE UPLOAD
			if(!empty($request->banner_image) && $request->banner_image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'banner_image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['banner_image'] =  $this->saveMedia($request->file('banner_image'));
			}
			
			if($request->item_id){
				// UPDATE
				$query  =  Post::find($request->item_id);
				$query->fill($data);
				$return  =  $query->save();
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				
				if($request->post_type == 'video'){
					//$data['post_extra'] =  $request->post_extra;
				}
				
				$data['slug'] =  $this->slugify($request->title);
				
				// CREATE
				$return = Post::create($data);
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
	
	
	public static function slugify($text, string $divider = '-'){
	  // replace non letter or digits by divider
	  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, $divider);

	  // remove duplicate divider
	  $text = preg_replace('~-+~', $divider, $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
		return 'n-a';
	  }

	  return $text;
	}

	
	/**
	* --------------
	* Change Status
	* --------------
	*/
	public function change_status(Request $request){
		DB::beginTransaction();
		try {
			$query = Post::where('id',$request->id)->update(['status'=>$request->status]);
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
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Post::where(['id'=>$request->item_id])->delete();
			if($query){
				DB::commit();
				$this->sendResponse([], trans('common.delete_success'));
			}
			DB::rollback();
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	public function categoryList(Request $request){
		try {
			$data = Category::where('module',$request->modeule)->get();
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
}