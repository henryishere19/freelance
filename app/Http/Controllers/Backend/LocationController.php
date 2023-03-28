<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Validation\Rule;

use App\Models\Helpers\CommonHelper;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;

class LocationController extends CommonController
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
	
	// Page Country List
	public function countries(){
		try{
			$page 		= 'countries';
			$page_title = 'Countries';
			
			return view("backend.locations.countries", compact(['page', 'page_title']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Page State List
	public function states(){
		try{
			$page 		= 'states';
			$page_title = 'States';
			$countries 	= Country::all();
			return view("backend.locations.states", compact(['page', 'page_title', 'countries']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Page City List
	public function cities(){
		try{
			$page 		= 'cities';
			$page_title = 'Cities';
			$states 	= State::all();
			
			return view("backend.locations.cities", compact(['page', 'page_title', 'states']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Page Area List
	public function areas(){
		try{
			$page 		= 'areas';
			$page_title = 'Areas';
			$cities 	= City::all();
			
			return view("backend.locations.areas", compact(['page', 'page_title', 'cities']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	public function create($role = ''){
		$page		= 'usersCreate';
		$page_title	= 'Create';
		
		return view("backend.users.add", compact(['page', 'page_title', 'role']));
	}

	// Edit PAGE
	public function show($role = '', $id = ''){
		try {
			$page		= 'userEdit';
			$page_title = 'Edit';
			
			$data 		= User::where('id',$id)->first();
			if($data){
				return view("backend.users.edit", compact(['page','page_title', 'data', 'role']));
			}
			return redirect()->route('dashboard');
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}



	/**
	* ------------
	* AJAX LIST
	* ------------
	*/
	public function ajax_list(Request $request){
		try{
			if ($request->ajax()) {
				// FOR COUNTRY
				if($request->type == 'country'){
					$data = Country::select('*')->orderBy('title', 'ASC');
					
				}else if($request->type == 'state'){
					$data = State::select('*')->orderBy('title', 'ASC');
					
				}else if($request->type == 'city'){
					$data = City::select('*')->orderBy('title', 'ASC');
					
				}else if($request->type == 'area'){
					$data = Area::select('*')->orderBy('title', 'ASC');
				}
				return Datatables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="javascript:void(0);" onclick="editThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
												<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
												
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}


	/**
	* -------------
	* STORE DATA
	* -------------
	*/
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
			'type'		=> 'required',
			'title'		=> 'required',
			'status'	=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('validation.error'));
		}
		
		$user = Auth()->user();
 		if(empty($user)){
			$this->sendUnauthorizedError([], trans('validation.invalid_user'));
		}
		
		DB::beginTransaction();
		try {
			// FOR COUNTRY
			if($request->type == 'country'){
				$validator = Validator::make($request->all(), [
					'iso_code'			=> 'required',
					'calling_code'		=> 'required',
					'currency'			=> 'required',
					'currency_code'		=> 'required',
					'currency_symbol'	=> 'required',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('validation.error'));
				}
				
				// CHECK TITLE EXIST OR NOT
				$title = Country::where('title', $request->title)->whereNotIn('id', [$request->id ?? 0])->first();
				if(!empty($title)){
					return $this->ajaxError('',trans('validation.title_already_exist'));
				}
				
				// Store Data
				$data = [
					'title'				=> $request->title,
					'iso_code'			=> $request->iso_code,
					'calling_code'		=> $request->calling_code,
					'currency' 			=> $request->currency,
					'currency_code'		=> $request->currency_code,
					'currency_symbol'	=> $request->currency_symbol,
					'status'	  		=> $request->status,
				];
				
				if($request->id){
					// UPDATE
					$query  =  Country::find($request->id);
					$query->fill($data);
					$return  =  $query->save();
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.updated_success'));
					}
				} else{
					// CREATE
					$return = Country::create($data);
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.added_success'));
					}
				}
			}
			
			// FOR STATE
			if($request->type == 'state'){
				$validator = Validator::make($request->all(), [
					'country'	=> 'required',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('validation.error'));
				}
				
				// CHECK TITLE EXIST OR NOT
				$title = State::where('title', $request->title)->whereNotIn('id', [$request->id ?? 0])->first();
				if(!empty($title)){
					return $this->ajaxError('',trans('validation.title_already_exist'));
				}
				
				// Store Data
				$data = [
					'title'			=> $request->title,
					'country_id'	=> $request->country,
					'status'		=> $request->status,
				];
				
				if($request->id){
					// UPDATE
					$query  =  State::find($request->id);
					$query->fill($data);
					$return  =  $query->save();
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.updated_success'));
					}
				} else{
					// CREATE
					$return = State::create($data);
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.added_success'));
					}
				}
			}
			
			// FOR CITY
			if($request->type == 'city'){
				$validator = Validator::make($request->all(), [
					'state'	=> 'required',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('validation.error'));
				}
				
				// CHECK TITLE EXIST OR NOT
				$title = City::where('title', $request->title)->whereNotIn('id', [$request->id ?? 0])->first();
				if(!empty($title)){
					return $this->ajaxError('',trans('validation.title_already_exist'));
				}
				
				// Store Data
				$data = [
					'title'		=> $request->title,
					'state_id'	=> $request->state,
					'status'	=> $request->status,
				];
				
				if($request->id){
					// UPDATE
					$query  =  City::find($request->id);
					$query->fill($data);
					$return  =  $query->save();
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.updated_success'));
					}
				} else{
					// CREATE
					$return = City::create($data);
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.added_success'));
					}
				}
			}
			
			// FOR AREA
			if($request->type == 'area'){
				$validator = Validator::make($request->all(), [
					'city'	=> 'required',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('validation.error'));
				}
				
				// CHECK TITLE EXIST OR NOT
				$title = Area::where('title', $request->title)->whereNotIn('id', [$request->id ?? 0])->first();
				if(!empty($title)){
					return $this->ajaxError('',trans('validation.title_already_exist'));
				}
				
				// Store Data
				$data = [
					'title'			=> $request->title,
					'city_id'		=> $request->city,
					'postal_code'	=> $request->postal_code,
					'latitude'		=> $request->latitude,
					'longitude'		=> $request->longitude,
					'status'		=> $request->status,
				];
				
				if($request->id){
					// UPDATE
					$query  =  Area::find($request->id);
					$query->fill($data);
					$return  =  $query->save();
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.updated_success'));
					}
				} else{
					// CREATE
					$return = Area::create($data);
					if($return){
						DB::commit();
						$this->sendResponse([], trans('common.added_success'));
					}
				}
			}
			
			$this->ajaxError([], trans('common.try_again'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* ---------
	* SHOW
	* ---------
	*/
	public function ajax_show(Request $request){
		$validator = Validator::make($request->all(), [
			'id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError($validator->errors()->first(), trans('validation.error'));
		}
		
		try{
			// GET DATA
			if($request->type == 'country'){
				$data = Country::where('id', $request->id)->first();
				
			}else if($request->type == 'state'){
				$data = State::where('id', $request->id)->first();
				
			}else if($request->type == 'city'){
				$data = City::where('id', $request->id)->first();
				
			}else if($request->type == 'area'){
				$data = Area::where('id', $request->id)->first();
			}
			if(!empty($data)){
				$this->sendResponse($data, trans('common.data_found'));
			}
			
			$this->ajaxError([], trans('common.no_data_found'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* ------------
	* DESTROY
	* ------------
	*/
	public function destroy(Request $request){
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError($validator->errors()->first(), trans('validation.error'));
		}
		
		DB::beginTransaction();
		try{
			// FOR COUNTRY
			if($request->type == 'country'){
				// DELETE
				$query = Country::where(['id'=>$request->item_id])->delete();
				if($query){
					DB::commit();
					$this->sendResponse([], trans('common.delete_success'));
				}
			}else if($request->type == 'city'){
				// DELETE
				$query = City::where(['id'=>$request->item_id])->delete();
				if($query){
					DB::commit();
					$this->sendResponse([], trans('common.delete_success'));
				}
			}
			else if($request->type == 'area'){
				// DELETE
				$query = Area::where(['id'=>$request->item_id])->delete();
				if($query){
					DB::commit();
					$this->sendResponse([], trans('common.delete_success'));
				}
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.delete_error'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
}