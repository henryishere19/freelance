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
use App\Models\Service;
use App\Models\Category;
use Yajra\DataTables\DataTables;
class ServiceController extends CommonController
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
	public function index($post_type = 'Service'){
		try{
			$page_title = $post_type .' List';
			
			return view("backend.service-management.list", compact(['page_title', 'post_type']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// CREATE PAGE
	public function create($post_type = ''){
		$page_title = 'Create New '. $post_type;
		
		$data = Service::create(['title'=> '', 'description' => '', 'status' =>'draft']);
		if($data){
			return redirect()->route('page.service.edit', [$post_type, $data->id]);
		}
		return redirect()->route('page.service.management', [$post_type]);
	}
	
	// EDIT PAGE
	public function edit($id = ''){
		$page_title = 'Edit '. $post_type;
		
		$data = Service::find($id);
		if($data){
			$categories	= Category::where(['status'=>'active', 'module'=>$data->post_type])->get();
			return view('backend.service-management.edit', compact(['page_title', 'data', 'categories']));
		}
		return redirect()->route('page.post.management', [$data->post_type]);
	}

	// AJAX LIST
	public function ajax_list(Request $request){
		try{
			$query = Service::query();
			
			// SEARCH
			// if($request->search){
			// 	$query->where('title','like','%'.$request->search.'%');
			// }
			$data = $query->orderBy('item_position','ASC')->get();

			// print_r($data->toArray());exit;
			$x=0;
			return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
						   return '<div class="d-flex justify-content-end flex-shrink-0">
										<a href="'. route('page.service.edit', ["Service", $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
										<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
									</div>';
					})
					->addColumn('image', function($row){
						   $image = asset(config('constants.DEFAULT_PRODUCT_IMAGE'));
						   if($row->image){ $image = asset($row->image); }
						   return '<img data-id="'.$row->id.'" src="'. $image .'" height="50px" width="50px" class="idus">';
					})
					->addIndexColumn()
					->editColumn('status', function($row){
						if($row->status == 'active'){
							return '<select class="form-control idus change_status" id="'.$row->id.'"><option value="active" selected>Active</option><option value="draft">Draft</option><option value="inactive">Inactive</option></select>';
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
			$page_title = 'Edit '. $post_type;
			$data 		= Service::where('id',$id)->first();
			if($data){
				return view("backend.service-management.edit", compact(['page_title','data', 'post_type']));
			}
			return redirect()->route('homePage');
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}

	public function serviceOrderList(Request $request){
		$a = 1;
		foreach($request->order as $key => $val){
			// dd($val);
			if(!empty($val['id'])){
				$data = Service::find($val['id']);
				$data->item_position = $a;
				$data->save();
				$a++;
			}
		}
		return [''];
	}
	
	// STORE
	public function store(Request $request){
		if( $request->type == "general")
		{
			$validator = Validator::make($request->all(), [
				// 'post_type'		=> 'required',
				// 'title'			=> 'required|min:3|max:99',
				// 'status'		=> 'required',
			]);
			if($validator->fails()){
				$this->ajaxValidationError($validator->errors(), trans('common.error'));
			}
			
		}
		
		$user = Auth()->user();
 		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		$abcd =  $request->titlecontent;
		$desc =  $request->descriptioncontent;
		$titleinnovation = $request->titleinnovation;
		$descriptioninnovation = $request->descriptioninnovation;
		$titlemigration =$request->titlemigration;
		$descriptionmigration =  $request->descriptionmigration;
		$imapactdescription = $request->imapactdescription;
		$titleinnovationdouble = $request->titleinnovationdouble;
		$descriptioninnovationdouble = $request->descriptioninnovationdouble;
		$content = array();
		$dataimg = array();
		$dataimg2 = array();
		$dewsccontent = array();
		$titleinoarr = array();
		$titledouble = array();
		$descriptiondouble = array();
		$descriptioninoarr = array();
		$innovatinoimgarr = array();
		$innovatinoimgarr2 = array();
		$innovatinodoubleimgarr = array();
		$innovatinodoubleimgarr2 = array();
		$migrationtitlearr = array();
		$migrationdescarr = array();
		$imapactdescarr = array();
		$imapactimgcarr = array();
		$imapactimgcarr2 = array();

		if($request->type == "content")
		{
			foreach($abcd as $key=>$value)
			{
				$content[] = $value;
			}
			foreach($desc as $key=>$value)
			{
				$dewsccontent[] = $value;
			}
			if(isset($request->dataimg) && $request->dataimg != "" && $request->dataimg != "undefined")
			{
				foreach ($request->dataimg as $file) {
					if($file != "undefined")
					{
						$name = $file->getClientOriginalName();
						$file->move(public_path() . '/accolades-img/', $name);
						$dataimg[] = $name;
					}
				}
			}
			if(isset($request->dataimgsecond) && $request->dataimgsecond != "" && $request->dataimgsecond != "undefined")
			{
				foreach ($request->dataimgsecond as $file) {
					if($file != "undefined")
					{
						$name = $file->getClientOriginalName();
						$file->move(public_path() . '/accolades-img/', $name);
						$dataimg2[] = $name;
					}
				}
			}
		}
		if($request->type == "innovation")
		{
			foreach($titleinnovation as $key=>$value)
			{
				$titleinoarr[] = $value;
			}
			foreach($descriptioninnovation as $key=>$value)
			{
				$descriptioninoarr[] = $value;
			}
			if(isset($request->innovatinoimg) && $request->innovatinoimg != "" && $request->innovatinoimg != "undefined")
			{
				foreach($request->innovatinoimg as $key=>$valaue)
				{
					$name = $valaue->getClientOriginalName();
					$valaue->move(public_path() . '/accolades-img/', $name);
					$innovatinoimgarr[] = $name;
				}
			}
			if(isset($request->innovatinoimgsecond) && $request->innovatinoimgsecond != "" && $request->innovatinoimgsecond != "undefined")
			{
				foreach($request->innovatinoimgsecond as $key=>$valaue)
				{
					$name = $valaue->getClientOriginalName();
					$valaue->move(public_path() . '/accolades-img/', $name);
					$innovatinodoubleimgarr2[] = $name;
				}
			}
		}	
		if($request->type == "doubletitle")
		{
			foreach($titleinnovationdouble as $key=>$value)
			{
				$titledouble[] = $value;
			}
			foreach($descriptioninnovationdouble as $key=>$value)
			{
				$descriptiondouble[] = $value;
			}
			if(isset($request->innovatinoimgdouble1) && $request->innovatinoimgdouble1 != "" && $request->innovatinoimgdouble1 != "undefined")
			{
				foreach($request->innovatinoimgdouble1 as $key=>$valaue)
				{
					$name = time().$valaue->getClientOriginalName();
					$valaue->move(public_path() . '/accolades-img/', $name);
					$innovatinodoubleimgarr[] = $name;
				}
			}
			if(isset($request->innovatinoimgdouble2) && $request->innovatinoimgdouble2 != "" && $request->innovatinoimgdouble2 != "undefined")
			{
				foreach($request->innovatinoimgdouble2 as $key=>$valaues)
				{
					$name = time().$valaues->getClientOriginalName();
					$valaues->move(public_path() . '/accolades-img/', $name);
					$innovatinodoubleimgarr2[] = $name;
				}
			}
		}
		if($request->type == "migration")
		{
			foreach($titlemigration as $key=>$value)
			{
				$migrationtitlearr[] = $value;
			}
			foreach($descriptionmigration as $key=>$valuess)
			{
				$migrationdescarr[] = $valuess;
			}
		}

		if($request->type == "impact")
		{
			foreach($imapactdescription as $key=>$value)
			{
				$imapactdescarr[] = $value;
			}
			if(isset($request->imapactimg) && $request->imapactimg != "" && $request->imapactimg != "undefined")
			{
				foreach($request->imapactimg as $key=>$value)
				{
					$name = $value->getClientOriginalName();
					$value->move(public_path() . '/accolades-img/', $name);
					$imapactimgcarr[] = $name;
				}
			}
			if(isset($request->imapactimgsecond) && $request->imapactimgsecond != "" && $request->imapactimgsecond != "undefined")
			{
				foreach($request->imapactimgsecond as $key=>$values)
				{
					$named = $values->getClientOriginalName();
					$values->move(public_path() . '/accolades-img/', $named);
					$imapactimgcarr2[] = $named;
				}
			}
		}

		$content_main_arr = array();
		foreach($content as $key=>$val)
		{
			$content_main_arr[] = array('title'=>isset($val) ?$val:"",
			'description'=>isset($dewsccontent[$key]) ? $dewsccontent[$key]:"",
			'image'=>isset($dataimg[$key]) ? $dataimg[$key]:"",
			'image2'=>isset($dataimg2[$key]) ? $dataimg2[$key]:"");
			
		}		
		$innovation_main_arr = array();
		foreach($titleinoarr as $key=>$val)
		{
			$innovation_main_arr[] = array('title'=>isset($val) ?$val:"",
			'description'=>isset($descriptioninoarr[$key]) ? $descriptioninoarr[$key]:"",
			'image'=>isset($innovatinoimgarr[$key]) ? $innovatinoimgarr[$key]:"",
			'image2'=>isset($innovatinodoubleimgarr2[$key]) ? $innovatinodoubleimgarr2[$key]:""
			);
			
		}
		$migration_main_arr = array();
		foreach($migrationtitlearr as $key=>$val)
		{
			$migration_main_arr[] = array(
										'title'=>isset($val) ?$val:"",
										'description'=>isset($migrationdescarr[$key]) ? $migrationdescarr[$key]:"");
		}	
		$imapact_main_arr = array();
		foreach($imapactdescarr as $key=>$val)
		{
			$imapact_main_arr[] = array(
										'description'=>isset($val) ? $val:"",
										'image'=>isset($imapactimgcarr[$key]) ? $imapactimgcarr[$key]:"",
										'image2'=>isset($imapactimgcarr2[$key]) ? $imapactimgcarr2[$key]:"");
		}	
		$double_main_arr = array();
		foreach($titledouble as $key=>$val)
		{
			$double_main_arr[] = array(
										'title'=>isset($val) ? $val:"",
										'image1'=>isset($innovatinodoubleimgarr[$key]) ? $innovatinodoubleimgarr[$key]:"",
										'image2'=>isset($innovatinodoubleimgarr2[$key]) ? $innovatinodoubleimgarr2[$key]:"",
										'description'=>isset($descriptiondouble[$key]) ? $descriptiondouble[$key]:"");
		}		
		DB::beginTransaction();
		try{
			$data = [
				
				'meta_description'		=> $request->post_seo_keywords,
			];

			if($request->type == "general")
			{
				$data['title'] = $request->title;
				$data['description'] = $request->description;
				$data['slug'] = $request->slug;
				$data['content_title_main'] = $request->content_title_main;
				$data['priority'] = $request->priority;
				$data['maincontentdescription'] = $request->maincontentdescription;
				$data['home_page_title'] = $request->home_page_title;
				$data['description'] = $request->description;
				$data['meta_title'] = $request->seo_title;
				$data['page_title'] = $request->meta_main_title;
				$data['seo_keywords'] = $request->seo_keywords;
				$data['meta_description'] = $request->seo_description;
				$data['status'] = $request->status;
					
			}
			if($request->type == "content")
			{
				$data['content_title'] = $request->titlemaincontent;
				$data['content'] = json_encode($content_main_arr);
			}
			if($request->type == "innovation")
			{
				$data['innovation'] = json_encode($innovation_main_arr);
				$data['innovation_title'] = $request->titlemaininnovation;
			}
			if($request->type == "migration")
			{
				$data['title_migration'] =$request->titlemainmigration;
				$data['migration'] = json_encode($migration_main_arr);
			}
			if($request->type == "impact")
			{
				$data['impact'] = json_encode($imapact_main_arr);
				$data['imapact_title' ]	= $request->imapacttitle;
			}
			if($request->type == "doubletitle")
			{
				$data['double_value'] = json_encode($double_main_arr);
				$data['double_title' ]	= $request->doubletitle;
			}
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				// $validator = Validator::make($request->all(), [
				// 	'image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				// ]);
				// if($validator->fails()){
				// 	$this->ajaxValidationError($validator->errors(), trans('common.error'));
				// }
				$name = $request->image->getClientOriginalName();
				$request->image->move(public_path() . '/service-img/', $name);
				
				$data['image'] =  $name;
			}
			if(!empty($request->mobile_banner) && $request->mobile_banner != 'undefined'){
				// $validator = Validator::make($request->all(), [
				// 	'mobile_banner'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				// ]);
				// if($validator->fails()){
				// 	$this->ajaxValidationError($validator->errors(), trans('common.error'));
				// }
				$name = $request->mobile_banner->getClientOriginalName();
				$request->mobile_banner->move(public_path() . '/service-img/', $name);
				
				$data['mobile_banner'] =  $name;
				// $data['mobile_banner'] =  $this->saveMedia($request->file('mobile_banner'));
			}
			if(!empty($request->content_image) && $request->content_image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'content_image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['content_image'] =  $this->saveMedia($request->file('content_image'));
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
				$query  =  Service::find($request->item_id);
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
				$return = Service::create($data);
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
			$query = Service::where('id',$request->id)->update(['status'=>$request->status]);
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
			$query = Service::where(['id'=>$request->item_id])->delete();
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