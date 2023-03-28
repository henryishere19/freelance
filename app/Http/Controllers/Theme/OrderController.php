<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\CommonController;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Charges;
use App\Models\UserDietPlan;
use App\Models\Appointment;

class OrderController extends CommonController
{   
	use CommonHelper;
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct()
	{
		//$this->middleware(['auth']);
	}
	
	
	
	/**
	* Verify Payment
	* @return void
	*/
	public function verifyPayment(Request $request){
		
		$data = Order::where('id', $request->id)->first();
		$user = User::where('id', $data->user_id)->first();
		if($data){
			CommonHelper::order_finalization($data->id, $user);
			return redirect()->route('order_successPage');
		}
		return redirect()->route('order_failedPage');
    }
	
	/**
	* Verify Diet Payment
	* @return void
	*/
	public function verifyDietPayment(Request $request){
		
		$data = UserDietPlan::where('id', $request->id)->first();
		$user = User::where('id', $data->user_id)->first();
		if($data){
			$data->payment_statuts = 'complete';
			$data->status = 'Pending';
			$data->update();
			return redirect()->route('order_successPage');
		}
		$data->payment_statuts = 'failed';
		$data->update();
		return redirect()->route('order_failedPage');
    }
	
	
	/**
	* Verify Appointment
	* @return void
	*/
	public function verifyAppointmentPayment(Request $request){
		$data = Appointment::where('id', $request->id)->first();
		if($data){
			$data->payment_statuts  = 'complete';
			$data->status 			= 'New';
			$data->update();
			return redirect()->route('order_successPage');
		}
		$data->payment_statuts = 'failed';
		$data->update();
		return redirect()->route('order_failedPage');
    }
	
	// Show Success Message
	public function orderSuccess(){
		$page		= 'orderSuccess';
        $page_title = trans('title.order_success');
		
		return view('theme.order.success-message',compact('page', 'page_title'));
    }
	
	// Show Failed Message
	public function orderFailed(){
		$page		= 'orderFailed';
        $page_title = trans('title.order_failed');
		
		return view('theme.order.failed-message',compact('page', 'page_title'));
    }
}