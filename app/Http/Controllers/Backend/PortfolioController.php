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
use App\Models\Portfolio;
use App\Models\Portfoliodatails;
use App\Models\Contact;
class PortfolioController extends CommonController
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
		return view('backend.portfolio.list');
	}
	// CREATE
	public function create(){
		$topics = FAQTopic::where('status', 'active')->get();
		return view('backend.portfolio.add', compact('topics'));
	}
	// EDIT
	public function edit($id = null){
		$data 	= Portfolio::find($id);
		$detail = Portfoliodatails::where('port_id',$id)->get();
		return view('backend.portfolio.edit',compact('data','detail'));
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
				$query = Portfolio::query();
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
												<a href="'. route("portfolio.edit",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
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
			$query = Portfolio::where('id',$request->id)->update(['status'=>$request->status]);
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
				$faq = Portfolio::find($request->item_id);
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
				$description_detail = [];
				if(isset($request->file) && $request->file )
				{
					foreach ($request->file as $file) {
						$name = $file->getClientOriginalName();
						$file->move(public_path() . '/portfolio-img/', $name);
						$dataimg[] = $name;
					}
				}
				if($request->image_title)
				{
					foreach ($request->image_title as $title) {
						$datatitle[] = $title;
					}
				}
				if($request->description_detail)
				{
					foreach ($request->description_detail as $desc) {
						$description_detail[] = $desc;
					}
				}
				$alldata = array_combine($datatitle,$dataimg);
				$return = Portfolio::create($data);
				if($return->id)
				{
					
					$c = 0;
					foreach($alldata as $key=>$val){
						$datadetail = [
							'port_id'=>$return->id,
							'image'=>$val,
							'title'=>$key,
							'description'=>$description_detail[$c],
						];
						Portfoliodatails::create($datadetail);
						$c++;
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
			$query = Portfoliodatails::where(['id'=>$request->ids])->delete();
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
	public function destroy(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		DB::beginTransaction();
		try{
			// DELETE
			$query = Portfolio::where(['id'=>$request->item_id])->delete();
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