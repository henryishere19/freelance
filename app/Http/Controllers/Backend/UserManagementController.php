<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Validation\Rule;

use App\Models\Helpers\CommonHelper;
use App\Models\UserInfo;
use App\Models\User;

class UserManagementController extends CommonController
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
	public function index($role = ''){
		try{
			$page 		= 'users';
			$page_title = 'Users';
			
			return view("backend.users.list", compact(['page', 'page_title', 'role']));
			
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
	
	// AJAX LIST
	public function ajax_list(Request $request){
		try{
			if ($request->ajax()) {
				$data = User::select('*')->where('user_type', $request->role);
				return Datatables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){
							return '<div class="d-flex justify-content-end flex-shrink-0">
											<a href="'. url('backend/manage/'. $row->user_type .'/'.$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit"></i></a>
											<a href="javascript:void(0);" onclick="deleteThis('. $row->id .')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-trash"></i></a>
										</div>';
						})
						->editColumn('name', function($row){
							return CommonHelper::decryptData($row->name);
						})
						->editColumn('email', function($row){
							return CommonHelper::decryptData($row->email);
						})
						->editColumn('phone_number', function($row){
							return CommonHelper::decryptData($row->phone_number);
						})
						->rawColumns(['action','name','phone_number'])
						->make(true);
			}
			return view('backend.users.list');
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// STORE
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
			'role'			=> 'required',
			'name'			=> 'required|min:3|max:99',
			'email'			=> 'required|min:3|max:99',
			'phone_number'	=> 'required|min:3|max:99',
			'password'		=> 'required|min:6|max:22',
			'status'		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		
		$user = Auth()->user();
 		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		
		// CHECK EMAIL EXIST OR NOT
        $email = User::where('email', CommonHelper::encryptData($request->email));
		if($request->user_id){
			$email->whereNotIn('id', [$request->user_id]);
		}
		$email = $email->first();
        if(!empty($email)){
            return $this->ajaxError([], trans('customer_api.email_already_exist'));
        }

        // CHECK MOBILE NO EXIST OR NOT
        $phone_number = User::where('phone_number', CommonHelper::encryptData($request->phone_number));
        if($request->user_id){
			$phone_number->whereNotIn('id', [$request->user_id]);
		}
		$phone_number = $phone_number->first();
		if(!empty($phone_number)){
            return $this->ajaxError([], trans('customer_api.phone_number_already_exist'));
        }
		
		DB::beginTransaction();
		try{
			$data = [
				'user_type'		=> $request->role,
				'name'       	=> CommonHelper::encryptData($request->name),
				'email'			=> CommonHelper::encryptData($request->email),
				'country_code' 	=> '+91',
				'phone_number' 	=> CommonHelper::encryptData($request->phone_number),
				'status'	  	=> $request->status,
			];
			
			// MEDIA UPLOAD
			if(!empty($request->image) && $request->image != 'undefined'){
				$validator = Validator::make($request->all(), [
					'profile_image'	=> 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
				]);
				if($validator->fails()){
					$this->ajaxValidationError($validator->errors(), trans('common.error'));
				}
				$data['profile_image'] = $this->saveMedia($request->file('image'));
			}
			
			if(!empty($request->password)){
				$data['password'] = Hash::make($request->password);
			}
			
			if($request->user_id){
				// UPDATE
				$query  =  User::find($request->user_id);
				$query->fill($data);
				$return  =  $query->save();
				if($return){
					DB::commit();
					$this->sendResponse([], trans('common.updated_success'));
				}
			} else{
				// CREATE
				$return = User::create($data);
				if($return){
					
					// Insert data in UserInfo Table
					UserInfo::create(['user_id' => $return->id]);
					
					// Send Welcome Mail
					CommonHelper::sendWelcomeMail($return);
					
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
	
	/**
	* --------------
	* Change Status
	* --------------
	*/
	public function change_status(Request $request){
		DB::beginTransaction();
		try {
			$query = User::where('id',$request->id)->update(['status'=>$request->status]);
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
			$query = User::where(['id'=>$request->item_id])->delete();
			if($query){
				$this->sendResponse([], trans('common.delete_success'));
			}
			$this->sendResponse([], trans('common.delete_error'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	/**
	* --------------
	* Update Wallet
	* --------------
	*/
	public function updateWallet(Request $request){
		$validator = Validator::make($request->all(), [
            'user_id' 	=> 'required',
            'title' 	=> 'required|min:3|max:99',
            'amount' 	=> 'required|max:55',
            'type' 		=> 'required|in:Credit,Debit'
        ]);
        if($validator->fails()){
            return $this->sendValidationError([], $validator->errors()->first());       
        }
		
		DB::beginTransaction();
		try {
			$user = User::where('id', $request->user_id)->first();
			if(empty($user)){
				$this->ajaxError([], 'Invalid User');
			}
			// Update Wallet
			$return = CommonHelper::updateWallet($user, $request->title, $request->amount, $request->type);
			if($return){
				DB::commit();
				$this->sendResponse([], trans('common.updated_success'));
			}
			DB::rollback();
			$this->ajaxError([], trans('common.updated_error'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
}