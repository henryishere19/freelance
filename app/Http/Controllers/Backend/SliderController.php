<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use App\Models\Helpers\CommonHelper;
use App\Models\Slider;
use App\Models\Slide;

class SliderController extends CommonController
{   
	use CommonHelper;
	
	public function __construct()
	{
 		$this->middleware('auth');
		//$this->middleware('permission:slider-list', ['only' => ['index','show']]);
		//$this->middleware('permission:slider-create', ['only' => ['create','store']]);
		//$this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
		//$this->middleware('permission:slider-delete', ['only' => ['destroy']]);
	}
	
	/**
	* --------------------
	* Slider List
	* Show the list page
	* --------------------
	*/
	public function index(){
		$page 		= 'sliderList';
		$page_title = 'Sliders';
		return view('backend.sliders.list', compact('page', 'page_title'));
	}

	/**
	* --------------------
	* Create Slider
	* Show the create page
	* --------------------
	*/
	public function create(){
		$page 		= 'createSlider';
		$page_title = 'Create';
		return view('backend.sliders.add', compact('page', 'page_title'));
	}
	
	/**
	* --------------------
	* Edit Slider
	* Show the edit page
	* --------------------
	*/
	public function edit($id = null){
		$page 		= 'editSlider';
		$page_title = 'Edit';
		$data		= Slider::find($id);
		$slides 	= Slide::where('slider_id', $data->id)->get();
		return view('backend.sliders.edit', compact('page', 'page_title', 'data', 'slides'));
	}
	
	public function slideBox(Request $request){

		try{
			if(!empty($request->item_id)){
				$data = Slide::find($request->item_id);
				if($data){
					$image = '';
					$yes = '';
					$no = '';
					$imgdesktop = "";
					$videodesktop = '';
					$imgmobile = '';
					$videomobile = '';
					$imgdisplay = 'none';
					$videodisplay = 'none';
					$imgdisplaydestop = 'none';
					$videodisplaydestop = 'none';
					$video = "";
					$videomobildd = '';
					$imagemobile = '';
					if($data->image){ $image = asset($data->image); }
					if($data->is_clickable == 'Yes'){ $yes = 'selected'; }
					if($data->image != ''){ $imgdesktop = 'selected';$imgdisplaydestop = 'flex';  }
					if($data->video != ''){ $videodesktop = 'selected'; $videodisplaydestop = 'flex'; }
					if($data->video){ $video = asset('uploads/video/'.$data->video); }
					if($data->mobie_image != ''){ $imgmobile = 'selected'; $imgdisplay = 'flex'; }
					if($data->mobie_image){ $imagemobile = asset($data->mobie_image); }
					if($data->video_mobile != ''){ $videomobile = 'selected'; $videodisplay = 'flex';}
					if($data->video_mobile){ $videomobildd = asset('uploads/video/'.$data->video_mobile); }
					if($data->is_clickable == 'No'){ $no = 'selected'; }
					$html = '<div class="form-row">'.$video.'
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="title" class="">Title</label>
									<input type="text" id="title" placeholder="Enter Title" class="form-control" value="'. $data->title .'">
									<div class="validation-div" id="val-title"></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="position-relative form-group">
									<label for="priority">Priority</label>
									<input type="number" id="priority" placeholder="Enter Priority" class="form-control" value="'. $data->priority .'">
									<div class="validation-div" id="val-priority"></div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="is_clickable" class="">Is Clickable?</label>
									<select class="form-control" id="is_clickable">
										<option value=""> Is Clickable...</option>
										<option value="Yes" '. $yes .'> Yes </option>
										<option value="No" '. $no .'> No </option>
									</select>
								</div>
								<div class="position-relative form-group">
									<label for="redirect_to">Redirect To</label>
									<input type="text" id="redirect_to" placeholder="Enter URL or model name" class="form-control" value="'. $data->redirect_to .'">
									<div class="validation-div" id="val-redirect_to"></div>
								</div>
								<div class="position-relative form-group">
									<label for="button_url">Button Url</label>
									<input type="text" id="button_url" placeholder="Enter URL or model name" class="form-control" value="'. $data->button_text .'">
									<div class="validation-div" id="val-redirect_to"></div>
								</div>
							</div>
							<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group" >
									<label for="is_clickable" class="">Is Clickable?</label>
									<select class="form-control" onchange="is_clickable(this);" id="is_clickable">
										<option value=""> Is Clickable...</option>
										<option value="Yes"> Yes </option>
										<option value="No"> No </option>
									</select>
								</div>
								<div class="position-relative form-group" style="display:none;" id="redirect_content">
									<label for="redirect_to">Redirect To</label>
									<input type="text" id="redirect_to" placeholder="Enter URL or model name" class="form-control">
									<div class="validation-div" id="val-redirect_to"></div>
								</div>
							</div><div class="row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="is_sdsimgvid" class="">Is Type Image & Video Destop?</label>
										<select class="form-control" onchange="getval(this);" id="is_imgvid">
											<option value="">Select type</option>
											<option value="Image" '.$imgdesktop.'> Image Desktop </option>
											<option value="Video" '.$videodesktop.'> Video Desktop</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="is_imgvidmobile" class="">Is Type Image & Video Mobile?</label>
										<select class="form-control" onchange="getvalmobile(this);" id="is_imgvidmobile">
											<option value="" >Select type</option>
											<option value="Image"  '.$imgmobile.'> Image Mobile </option>
											<option value="Video"  '.$videomobile.'> Video Mobile </option>
										</select>
									</div>
								</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-6" id="displayimg" style="display:'.$imgdisplaydestop.';">
										<div class="form-row">
											<div class="col-md-12">
												<div class="position-relative form-group">
													<label for="exampleFile" class="">Image</label>
													<input name="file" id="image" type="file" class="form-control-file item-img" accept="image/*">
													<div class="validation-div" id="val-image"></div>
													<div class="image-preview"><img id="image-src" src="'.$image.'" width="100%"/></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6" id="displayvideo" style="display:'.$videodisplaydestop.';">
										<div class="form-row">
											<div class="col-md-12">
												<div class="position-relative form-group">
													<label for="exampleFile" class="">Video</label>
													<input type="file" id="video"class="form-control-file "   name="video">
													<div class="validation-div" id="val-video"></div>
													<div class="image-preview">
													<video width="150" height="150" controls>
													<source src='.$video.' type="">
													<source src='.$video.' type="video/ogg">
												  	Your browser does not support the video tag.
												  </video></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-6" id="displayimgmobile" style="display:'.$imgdisplay.';">
											<div class="form-row">
												<div class="col-md-12">
													<div class="position-relative form-group">
														<label for="exampleFile" class="">Image</label>
														<input name="file" id="imagedestop" type="file" class="form-control-file item-img" accept="image/*">
														<div class="validation-div" id="val-image"></div>
														<div class="image-preview"><img id="image-src" src="'.$imagemobile.'" width="100%"/></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6" id="displayvideomobile" style="display:'.$videodisplay.';">
											<div class="form-row">
												<div class="col-md-12">
													<div class="position-relative form-group">
														<label for="exampleFile" class="">Video</label>
														<input type="file" id="videodestop" class="form-control-file "   name="video">
														<div class="validation-div" id="val-video"></div>
														<div class="image-preview"><video width="150" height="150" controls>
														<source src='.$videomobildd.' type="">
														<source src='.$videomobildd.' type="video/ogg">
														  Your browser does not support the video tag.
													  </video></div>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="description" class="">Description</label>
									<textarea  name="description" id="description"  rows="4" class="form-control">'. $data->description .'</textarea>
									<div class="validation-div" id="val-description"></div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<input type="hidden" id="item_id" value="'. $data->id .'">
						</div>';
				}
				$this->sendResponse($html, trans('common.data_found_success'));
			}else{
				$html = '<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="title" class="">Title</label>
									<input type="text" id="title" placeholder="Enter Title" class="form-control">
									<div class="validation-div" id="val-title"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="position-relative form-group">
									<label for="priority">Priority</label>
									<input type="number" id="priority" placeholder="Enter Priority" class="form-control">
									<div class="validation-div" id="val-priority"></div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group" >
									<label for="is_clickable" class="">Is Clickable?</label>
									<select class="form-control"  onchange="is_clickable(this);" id="is_clickable">
										<option value=""> Is Clickable...</option>
										<option value="Yes"> Yes </option>
										<option value="No"> No </option>
									</select>
								</div>
								<div class="position-relative form-group" style="display:none;" id="redirect_content">
									<label for="redirect_to">Redirect To</label>
									<input type="text" id="redirect_to" placeholder="Enter URL or model name" class="form-control">
									<div class="validation-div" id="val-redirect_to"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="is_sdsimgvid" class="">Is Type Image & Video Destop?</label>
										<select class="form-control" onchange="getval(this);" id="is_imgvid">
											<option value="" >Select type</option>
											<option value="Image"> Image Desktop </option>
											<option value="Video"> Video Desktop</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="is_imgvidmobile" class="">Is Type Image & Video Mobile?</label>
										<select class="form-control" onchange="getvalmobile(this);" id="is_imgvidmobile">
											<option value="" >Select type</option>
											<option value="Image"> Image Mobile </option>
											<option value="Video"> Video Mobile </option>
										</select>
									</div>
								</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-6" id="displayimg" style="display:none;">
										<div class="form-row">
											<div class="col-md-12">
												<div class="position-relative form-group">
													<label for="exampleFile" class="">Image</label>
													<input name="file" id="image" type="file" class="form-control-file item-img" accept="image/*">
													<div class="validation-div" id="val-image"></div>
													<div class="image-preview"><img id="image-src" src="" width="100%"/></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6" id="displayvideo" style="display:none;">
										<div class="form-row">
											<div class="col-md-12">
												<div class="position-relative form-group">
													<label for="exampleFile" class="">Video</label>
													<input type="file" id="video"class="form-control-file "   name="video">
													<div class="validation-div" id="val-video"></div>
													<div class="image-preview"><img id="image-src" src="" width="100%"/></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-6" id="displayimgmobile" style="display:none;">
											<div class="form-row">
												<div class="col-md-12">
													<div class="position-relative form-group">
														<label for="exampleFile" class="">Image</label>
														<input name="file" id="imagedestop" type="file" class="form-control-file item-img" accept="image/*">
														<div class="validation-div" id="val-image"></div>
														<div class="image-preview"><img id="image-src" src="" width="100%"/></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6" id="displayvideomobile" style="display:none;">
											<div class="form-row">
												<div class="col-md-12">
													<div class="position-relative form-group">
														<label for="exampleFile" class="">Video</label>
														<input type="file" id="videodestop" class="form-control-file "   name="video">
														<div class="validation-div" id="val-video"></div>
														<div class="image-preview"><img id="image-src" src="" width="100%"/></div>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="description" class="">Description</label>
									<textarea  name="description" id="description"  rows="4" class="form-control"></textarea>
									<div class="validation-div" id="val-description"></div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<input type="hidden" id="item_id" value="">
						</div>';
				$this->sendResponse($html, trans('common.data_found_success'));
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	
	// Ajax List
	public function ajax_list(Request $request){
		
		try{
			if($request->ajax()){
				$data = Slider::orderBy('id','DESC')->get();
				return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
						   return '<div class="d-flex justify-content-end flex-shrink-0">
										<a href="'. route("sliders.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
										<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
									</div>';
					})
					->addColumn('slides', function($row){
						   return Slide::where('slider_id', $row->id)->count();
					})
					->editColumn('status', function($row){
						if($row->status == 'active'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active" selected>Active</option><option value="inactive">Inactive</option></select>';
						}
						if($row->status == 'inactive'){
							return '<select class="form-control change_status" id="'.$row->id.'"><option value="active">Active</option><option value="inactive" selected>Inactive</option></select>';
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
		$validator = Validator::make($request->all(), [
			'title'				=> 'required|min:3|max:99',	
			'slug'				=> 'required|min:3|max:51',	
			'status'			=> 'required',
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
				'title'       	=> $request->title,
				'status'	  	=> $request->status,
				
			];
			
			if($request->item_id){
				// UPDATE
				$query  =  Slider::find($request->item_id);
				$query->fill($data);
				$return  =  $query->save();
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$data['slug'] = $request->slug;
				$return = Slider::create($data);
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
	
	// Change Status
	public function changeStatus(Request $request){
		$validator = Validator::make($request->all(), [
			'id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
	    try {
	        if(Slider::where('id',$request->id)->update(['status'=>$request->status])){
				DB::commit();
				$this->sendResponse([], trans('common.status_updated_successfully'));
	        }
			else{
				DB::rollback();
				$this->sendResponse([], trans('common.status_not_updated'));
	        }
			
			$this->ajaxError([], trans('common.status_not_updated'));
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
			$this->ajaxError($validator->errors(), trans('common.error'));
		}
		
		try{
			// DELETE
			$query = Slider::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	
	// Store Slide
	public function storeSlide(Request $request){
		$validator = Validator::make($request->all(), [
			'slider_id'	=> 'required',
			'title'		=> 'required|min:3|max:99',
			'priority'	=> 'required|min:1|max:99',
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
				'slider_id'		=> $request->slider_id,
				'title'       	=> $request->title,
				'priority'		=> $request->priority,
				'is_clickable'	=> $request->is_clickable ? $request->is_clickable : 'No',
				'redirect_to'	=> $request->redirect_to,
				'description'	=> $request->description,
				'button_text'	=> $request->button_url,
				
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
				$data['video'] =  "";
			}

			// VIDEO UPLOAD
			if(!empty($request->video) && $request->video != 'undefined'){
				$file = $request->file( 'video' );
				$name = $file->getClientOriginalName();
				$request->video = $name;
				$destination = '/public/uploads/video';
				$request->file( 'video' )->move( base_path() . $destination, $name );
				$data['image'] = "";
				$data['video'] =  $name;
			}
			
			// MEDIA UPLOAD
			if(!empty($request->imagedestop) && $request->imagedestop != 'undefined'){
				$validator = Validator::make($request->all(), [
					'imagedestop'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['mobie_image'] =  $this->saveMedia($request->file('imagedestop'));
				$data['video_mobile'] = "";
			}

			// VIDEO UPLOAD
			if(!empty($request->videodestop) && $request->videodestop != 'undefined'){
				$file = $request->file( 'videodestop' );
				$name = $file->getClientOriginalName();
				$request->video = $name;
				$destination = '/public/uploads/video';
				$request->file( 'videodestop' )->move( base_path() . $destination, $name );
				$data['video_mobile'] =  $name;
				$data['mobie_image'] =  "";
			}
			


			if($request->item_id){
				// UPDATE
				$query = Slide::find($request->item_id);
				$query->fill($data);
				$return = $query->save();
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				
				if(empty($request->image) && $request->image != 'undefined'){
					$validator = Validator::make($request->all(), [
						'image'	=> 'require|image|mimes:jpeg,png,jpg|max:1024',
					]);
					if($validator->fails()){
						$this->ajaxValidationError($validator->errors(), trans('common.error'));
					}
					$data['image'] =  $this->saveMedia($request->file('image'));
				}
				
				// CREATE
				$return = Slide::create($data);
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
	
	// Delete Slide
	public function destroy_slide(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError($validator->errors(), trans('common.error'));
		}
		
		try{
			// DELETE
			$query = Slide::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
}