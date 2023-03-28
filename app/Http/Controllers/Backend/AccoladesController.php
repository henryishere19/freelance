<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\Helpers\CommonHelper;
use App\Models\Faq;
use App\Models\Accolades;
use App\Models\Accoladesdatails;
use App\Models\FAQTopic;
use App\Models\Section;
use App\Models\Easier;
use App\Models\Instive;
use App\Models\Contact;
class AccoladesController extends CommonController
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
		return view('backend.accolades.list');
	}

	// CREATE
	public function create(){
		
		$topics = FAQTopic::where('status', 'active')->get();
		return view('backend.accolades.add', compact('topics'));
	}
	
	// EDIT
	public function edit($id = null){
		$data 	= Accolades::find($id);
		$detail = Accoladesdatails::where('acc_id',$id)->get();
		return view('backend.accolades.edit',compact('data','detail'));
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
				$query = Accolades::query();
				
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
												<a href="'. route("accolades.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
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
			'title'			=> 'required|min:1|max:99',
			'priority'		=> 'required|min:1|max:99',
			'description'	=> 'required|min:1|max:999',
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
				'title'				=> $request->title,
				'priority'			=>$request->priority,
				'description'		=> $request->description,
				'status'	  		=> $request->status,
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
				$faq = Accolades::find($request->item_id);
				$faq->fill($data);
				$return = $faq->save();
				
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$dataimg = [];
				$datatitle = [];
				if(isset($request->file) && $request->file )
				{
					foreach ($request->file as $file) {
						$name = $file->getClientOriginalName();
						$file->move(public_path() . '/accolades-img/', $name);
						$dataimg[] = $name;
					}
				}
				if($request->image_title)
				{
					foreach ($request->image_title as $title) {
						$datatitle[] = $title;
					}
				}
				$alldata = array_combine($datatitle,$dataimg);
				$return = Accolades::create($data);
				if($return->id)
				{
					
					foreach($alldata as $key=>$val){
						$datadetail = [
							'acc_id'=>$return->id,
							'image'=>$val,
							'title'=>$key,
						];
						Accoladesdatails::create($datadetail);
					}
					
				}
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
  
	//Delete Item
	public function deleteitem(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
			'ids' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Accoladesdatails::where(['id'=>$request->ids])->delete();
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
			$query = Accolades::where(['id'=>$request->item_id])->delete();
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



	//Section
	public function setionindex(){
		return view('backend.section.list');
	}

	// CREATE Section
	public function sectioncreate($module = ''){
		$page_title = 'Add Category';
		return view("backend.section.add", compact(['page_title', 'module']));
	}

	// Store Section
	public function sectionstore(Request $request){
		$validator = Validator::make($request->all(), [
			'title'			=> 'required|min:3|max:99',	
			'priority'	=> 'required',	
			'status'			=> 'required',
			'page'			=> 'required',
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
				'title'       => $request->title,
				'description' => $request->description,
				'priority'       => $request->priority,
				'page'       => $request->page,
				'link'       => $request->link,
				'status'         => $request->status,
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$data['image'] =  $this->saveMedia($request->file('image'));
			}
			if(!empty($request->video) && $request->video != 'undefined'){
				$file = $request->file( 'video' );
				$name = $file->getClientOriginalName();
				$request->video = $name;
				$destination = '/public/uploads/video';
				$request->file( 'video' )->move( base_path() . $destination, $name );
				$data['video'] =  $name;
			}
			if(!empty($request->mobile_video) && $request->mobile_video != 'undefined'){
				$file = $request->file( 'mobile_video' );
				$name = time().$file->getClientOriginalName();
				$request->video = $name;
				$destination = '/public/uploads/video';
				$request->file( 'mobile_video' )->move( base_path() . $destination, $name );
				$data['mobile_video'] =  $name;
			}
			if($request->item_id){
				// UPDATE
				$section  =  Section::find($request->item_id);
				$section->fill($data);
				$return  =  $section->save();
				
				if($return){
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$return = Section::create($data);
				if($return){
					$this->sendResponse([], trans('common.added_success'));
				}
			}
			$this->ajaxError([], trans('common.try_again'));

		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}


	//  Section Lisst
	public function setionlist(Request $request){
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
				$query = Section::query();
				
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
												<a href="'. route('ajax.setionindex.edit', ['id' => $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], 'Error to find data');
		}
	}



	//Edit
	public function sectionedit($id){
		$data 	= Section::find($id);
		return view('backend.section.edit',compact('data'));
	}

	//delete Section
	public function sectiondestroy(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Section::where(['id'=>$request->item_id])->delete();
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




//Instive
public function instiveindex(){
	return view('backend.Intuitive.list');
}

// CREATE Instive
public function instiveicreate($module = ''){
	$page_title = 'Add Category';
	return view("backend.Intuitive.add", compact(['page_title', 'module']));
}

// Store Instive
public function instiveistore(Request $request){
	$validator = Validator::make($request->all(), [
		'title'			=> 'required|min:3|max:99',	
		'priority'	=> 'required',	
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
			'title'       => $request->title,
			'description' => $request->description,
			'priority'       => $request->priority,
			'status'         => $request->status,
		];
		
		// MEDIA UPLOAD
		if(!empty($request->image) && $request->image != 'undefined'){
			$fileName = $request->file('image')->getClientOriginalName();  
        	$request->image->move(public_path('same-img'), $fileName);
			$data['image'] =  $fileName;
		}
		if(!empty($request->imagesecond) && $request->imagesecond != 'undefined'){
			$fileNames = $request->file('imagesecond')->getClientOriginalName();  
        	$request->imagesecond->move(public_path('same-img'), $fileNames);
			$data['image_second'] =  $fileNames;
		}
		
		if($request->item_id){
			// UPDATE
			$section  =  Instive::find($request->item_id);
			$section->fill($data);
			$return  =  $section->save();
			
			if($return){
				$this->sendResponse([], trans('common.updated_success'));
			}
		} else{
			// CREATE
			$return = Instive::create($data);
			if($return){
				$this->sendResponse([], trans('common.added_success'));
			}
		}
		$this->ajaxError([], trans('common.try_again'));

	} catch (Exception $e) {
		$this->ajaxError([], $e->getMessage());
	}
}


//  Instive Lisst
public function instivelist(Request $request){
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
			$query = Instive::query();
			
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
											<a href="'. route('ajax.instiveindex.edit', ['id' => $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
											<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
										</div>';
					})->rawColumns(['action'])
					->make(true);
		}
	} catch (Exception $e) {
		$this->ajaxError([], 'Error to find data');
	}
}



//Edit Instive
public function instiveedit($id){
	$data 	= Instive::find($id);
	return view('backend.Intuitive.edit',compact('data'));
}

//delete Instive
public function instivedestroy(Request $request){
	$validator = Validator::make($request->all(), [
		'item_id' => 'required',
	]);
	if($validator->fails()){
		$this->ajaxError([], $validator->errors()->first());
	}
	
	DB::beginTransaction();
	try{
		// DELETE
		$query = Instive::where(['id'=>$request->item_id])->delete();
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





//Instive
public function easierindex(){
	return view('backend.easier.list');
}

// CREATE Instive
public function easiericreate($module = ''){
	$page_title = 'Add Category';
	return view("backend.easier.add", compact(['page_title', 'module']));
}

// Store Instive
public function easieristore(Request $request){
	$validator = Validator::make($request->all(), [
		'title'			=> 'required|min:3|max:99',	
		'priority'	=> 'required',	
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
			'title'       => $request->title,
			'description' => $request->description,
			'priority'       => $request->priority,
			'status'         => $request->status,
		];
		
		// MEDIA UPLOAD
		if(!empty($request->image) && $request->image != 'undefined'){
			$fileName = $request->image->getClientOriginalName();  
			$request->image->move(public_path('uploads'), $fileName);
			$data['image'] =  $fileName;
		}
		if(!empty($request->imagesecond) && $request->imagesecond != 'undefined'){
			$fileName = $request->imagesecond->getClientOriginalName();  
			$request->imagesecond->move(public_path('uploads'), $fileName);
			$data['image_second'] =  $fileName;
		}
		
		if($request->item_id){
			// UPDATE
			$section  =  Easier::find($request->item_id);
			$section->fill($data);
			$return  =  $section->save();
			
			if($return){
				$this->sendResponse([], trans('common.updated_success'));
			}
		} else{
			// CREATE
			$return = Easier::create($data);
			if($return){
				$this->sendResponse([], trans('common.added_success'));
			}
		}
		$this->ajaxError([], trans('common.try_again'));

	} catch (Exception $e) {
		$this->ajaxError([], $e->getMessage());
	}
}


//  Instive Lisst
public function easierlist(Request $request){
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
			$query = Easier::query();
			
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
											<a href="'. route('ajax.easier.edit', ['id' => $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
											<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
										</div>';
					})->rawColumns(['action'])
					->make(true);
		}
	} catch (Exception $e) {
		$this->ajaxError([], 'Error to find data');
	}
}



//Edit Instive
public function easieredit($id){
	$data 	= Easier::find($id);
	return view('backend.easier.edit',compact('data'));
}

//delete Instive
public function easierdestroy(Request $request){
	$validator = Validator::make($request->all(), [
		'item_id' => 'required',
	]);
	if($validator->fails()){
		$this->ajaxError([], $validator->errors()->first());
	}
	
	DB::beginTransaction();
	try{
		// DELETE
		$query = Easier::where(['id'=>$request->item_id])->delete();
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




//superpowers
public function superpowersindex(){
	return view('backend.superpowers.list');
}

// CREATE superpowers
public function superpowersicreate($module = ''){
	$page_title = 'Add Category';
	return view("backend.superpowers.add", compact(['page_title', 'module']));
}

// Store superpowers
public function superpowersistore(Request $request){
	$validator = Validator::make($request->all(), [
		'title'			=> 'required|min:3|max:99',	
		'priority'	=> 'required',	
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
			'title'       => $request->title,
			'description' => $request->description,
			'priority'       => $request->priority,
			'status'         => $request->status,
		];
		
		// MEDIA UPLOAD
		if(!empty($request->image) && $request->image != 'undefined'){
			$data['image'] =  $this->saveMedia($request->file('image'));
		}
		if(!empty($request->imagesecond) && $request->imagesecond != 'undefined'){
			$data['image_second'] =  $this->saveMedia($request->file('imagesecond'));
		}
		
		if($request->item_id){
			// UPDATE
			$section  =  Instive::find($request->item_id);
			$section->fill($data);
			$return  =  $section->save();
			
			if($return){
				$this->sendResponse([], trans('common.updated_success'));
			}
		} else{
			// CREATE
			$return = Instive::create($data);
			if($return){
				$this->sendResponse([], trans('common.added_success'));
			}
		}
		$this->ajaxError([], trans('common.try_again'));

	} catch (Exception $e) {
		$this->ajaxError([], $e->getMessage());
	}
}


//  superpowers Lisst
public function superpowerslist(Request $request){
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
			$query = Instive::query();
			
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
											<a href="'. route('ajax.instiveindex.edit', ['id' => $row->id]) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
											<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
										</div>';
					})->rawColumns(['action'])
					->make(true);
		}
	} catch (Exception $e) {
		$this->ajaxError([], 'Error to find data');
	}
}



//Edit superpowers
public function superpowersedit($id){
	$data 	= Instive::find($id);
	return view('backend.superpowers.edit',compact('data'));
}

//delete superpowers
public function superpowersdestroy(Request $request){
	$validator = Validator::make($request->all(), [
		'item_id' => 'required',
	]);
	if($validator->fails()){
		$this->ajaxError([], $validator->errors()->first());
	}
	
	DB::beginTransaction();
	try{
		// DELETE
		$query = Instive::where(['id'=>$request->item_id])->delete();
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






	// ajax contact list
	public function ajax_Contactlist(Request $request){
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
				$query = Contact::query();
				
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

	// delete contact list

	public function destroycontact(Request $request){

		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Contact::where(['id'=>$request->item_id])->delete();
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