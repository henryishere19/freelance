<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\CommonController;

use Validator,Auth,DB,Storage,DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\Helpers\CommonHelper;
use App\Models\Order;
use App\Models\Report;

class OrderController extends CommonController
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
  
	// List Page
	public function index(){
		$page 		= 'orders';
		$page_title = 'Orders';
		
		return view('backend.orders.list', compact('page','page_title'));
	}
	
	// SHOW OPEN ORDER PAGE
	public function open(){
		$page 			= 'openOrders';
		$page_title 	= 'Open Orders';
		
		$new			= Order::where('status', 'New')->orderBy('id', 'DESC')->get();
		$accepted		= Order::where('status', 'Accepted')->orderBy('id', 'DESC')->get();
		$scheduled		= Order::where('status', 'Scheduled')->orderBy('id', 'DESC')->get();
		$outForDelivery	= Order::where('status', 'Out-For-Delivery')->orderBy('id', 'DESC')->get();
		return view('backend.orders.open-orders', compact('page','page_title', 'new','accepted','scheduled','outForDelivery'));
	}
	
	// DETAILS PAGE
	public function show($id = null){
		$page 			= 'orderDetails';
		$page_title 	= 'Order Details';
		$data 			= Order::find($id);
		
		return view('backend.orders.show',compact('page','page_title', 'data'));
	}


	/**
	* ------------------
	* ORDER LIST
	* ------------------
	*/
	public function ajax(Request $request){
		try{
			
			if ($request->ajax()) {
				$query = Order::select('*')->where('status', '!=', 'Temporary');
				if($request->type == 'month'){
					$query->where('created_at', '>', date('Y-m-d', strtotime("-1 month")));
					
				}else if($request->type == 'week'){
					$query->where('created_at', '>', date('Y-m-d', strtotime("-1 week")));
					
				}else if($request->type == 'day'){
					$query->where('created_at', '>', date('Y-m-d', strtotime("-1 day")));
				}
				$data = $query->get();
				return Datatables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){
							   return '<div class="d-flex justify-content-end flex-shrink-0">
												<a href="'. route("page.order.details",$row->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-eye"></i></a>
											</div>';
						})->rawColumns(['action'])
						->make(true);
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}


	/**
	* ------------------
	* CHANGE ORDER STATUS
	* ------------------
	*/
	public function status(Request $request){
	    DB::beginTransaction();
		
		try {
			
			if($request->status == 'Completed'){
				
				// Get Report Data
				$data = Report::where('order_id', $request->id)->first();
				if(empty($data)){
					$this->ajaxError([], 'Submit the report first!');
				}
			}
			
			// Run Query
			if(Order::where('id',$request->id)->update(['status'=>$request->status])){
	          DB::commit();
	          $this->sendResponse([], trans('order.status_updated_successfully'));
	        }
			
	        DB::rollback();
			$this->sendResponse([], trans('order.status_not_updated'));
	        
	    } catch (Exception $e) {
	        DB::rollback();
	        $this->ajaxError([], $e->getMessage());
	    }
	}


	/**
	* ------------------
	* CHECK NEW ORDERS
	* ------------------
	*/
	public function ajax_checkNewOrders(){
      
		$user = Auth()->user();
		if(empty($user)){
			$this->sendUnauthorizedError([], trans('common.invalid_user'));
		}
		
		// Chek eligible for order notification or not
		if (!in_array($user->user_type, ['superAdmin','Vendor'])){
			$this->ajaxError([], 'Not eligible for notifications');
		}
		
		try {
			$query = order::where('status','=','New')->get();
			if(count($query) > 0){
				$return['count']	= $query->count();
				$return['html']		= "<audio controls autoplay hidden='true'><source src='". asset('default/ringtone.mpeg') ."' type='audio/mpeg'></audio>";
				if($user->show_order_notification != 1){
					$return['html'] = '';
				}
				
				$this->sendResponse($return, trans('common.data_found_success'));
			}
			$this->sendResponse([], trans('common.data_found_empty'));
			
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
    }


	/**
	* ------------------
	* OPEN ORDER COUNT
	* ------------------
	*/
	public function ajax_count(Request $request){
		try{
			$cartData = order::where('status','=','New')->get();
			if($cartData){
				$return['count'] = $cartData->count();
				$this->sendResponse($return, trans('cart.data_found_success'));
			}
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
}