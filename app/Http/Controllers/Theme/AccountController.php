<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator,Auth,DB,Storage,DateTime,PDF;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Helpers\CommonHelper;
use App\Models\Restaurant;
use App\Models\Product;
use App\Models\MenuCategory;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\VaccineRecord;
use App\Models\LabTest;

class AccountController extends CommonController
{   
	use CommonHelper;
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		//$this->middleware(['auth']);
	}
  
	// MY Profile
	public function index(){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'myAccount';
			$page_title = trans('theme.my_account_title');
			
			$data 		= User::where('id', $user->id)->first();
			
			return view('theme.myAccount.index', compact(['page','page_title', 'data']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Edit Profile
	public function edit(){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'editProfile';
			$page_title = trans('title.edit_profile');
			
			$data 		= User::where('id', $user->id)->first();
			
			return view('theme.myAccount.editProfile', compact(['page','page_title', 'data']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// MY Orders
	public function myOrders(){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'myOrders';
			$page_title = 'Orders';
			
			return view('theme.myAccount.myOrders', compact(['page','page_title']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// MY Appointments
	public function appointments(){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'myAppointments';
			$page_title = trans('title.my_appointments');
			
			$data = Appointment::where('status','!=','Unconfirmed')->where('user_id', $user->id)->orderBy('id', 'DESC')->get();
			if($data){
				foreach($data as $key=>$list){
					$data[$key]->image = asset(config('constants.DEFAULT_THUMBNAIL'));
					$data[$key]->name  = 'Unknown';
					if($list->type == 'Appointment'){
						$list->image = asset(config('constants.DEFAULT_USER_IMAGE'));
						$list->name  = User::where('id',$list->doctor_id)->pluck('name')->first();
					}
					if($list->type == 'Lab-Booking'){
						$test = LabTest::where('id',$list->test_id)->first();
						if($test){
							$list->image = $test->image ? asset($test->image) : asset(config('constants.DEFAULT_USER_IMAGE'));
							$list->name  = $test->title;
						}
					}
				}
			}
			return view('theme.myAccount.appointments', compact(['page','page_title', 'data']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Order Details
	public function orderDetails($id){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'orderDetails';
			$page_title = 'Order Details';
			
			$data 		= Order::with('order_items')->with('order_items.product')->where('id', $id)->where('user_id', $user->id)->first();
			return view('theme.myAccount.order-details', compact(['page','page_title', 'data']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// Order Details
	public function digitalRecords(){
		$user = Auth::user();
		if(empty($user)){ return redirect()->route('loginUser'); }
		
		try{
			$page 		= 'digitalRecords';
			$page_title = 'Digital Records';
			
			$products 	= Product::where('status', 'active')->get();
			$categories	= Category::where('status', 'active')->get();
			
			$dob 		= strtotime($user->dob);
			$now		= time();
			$difference = $now - $dob;
			$days  		= round($difference / (60 * 60 * 24));
			
			$data = Category::whereRaw($days .' >= start_age')->whereRaw($days . ' <= end_age')
					->orWhereRaw($days .' >= start_age_2')->orWhereRaw($days . ' <= end_age_2')
					->orWhereRaw($days .' >= start_age_3')->orWhereRaw($days . ' <= end_age_3')
					->where('status', 'active')->get();
			
			// Get product(Brand) list
			foreach($data as $key=> $list){
				
				$newProducts = [];
				
				$items = Product::where('category_id', $list->id)->where('status', 'active')
						//->whereRaw($days .' >= start_age')->whereRaw($days . ' <= end_age')
						//->orWhereRaw($days .' >= start_age_2')->orWhereRaw($days . ' <= end_age_2')
						//->orWhereRaw($days .' >= start_age_3')->orWhereRaw($days . ' <= end_age_3')
						->get();
				
				// Check is vaccinated or not
				foreach($items as $pkey=> $plist){
					$vaccinated = VaccineRecord::where(['product_id'=>$plist->id, 'user_id'=>$user->id])->first();
					$items[$pkey]->is_vaccinated = $vaccinated ? 1 : 0;
					
					if($days >= $plist->start_age && $days <= $plist->end_age){
						$newProducts[] =  $items[$pkey];
					}
					else if($days >= $plist->start_age_2 && $days <= $plist->end_age_2){
						$newProducts[] =  $items[$pkey];
					}
					else if($days >= $plist->start_age_3 && $days <= $plist->end_age_3){
						$newProducts[] =  $items[$pkey];
					}
				}
				$data[$key]->products = $newProducts;
			}
			
			return view('theme.myAccount.digital-records', compact(['page','page_title', 'data', 'products', 'categories']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	// ADD Vaccine Recordds
	public function ajax_markAsVaccinated(Request $request){
		
		$validator = Validator::make($request->all(), [
			'item_id' => 'required',
			'date' => 'required|date_format:Y-m-d',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.login_to_continue'));
		}
		
		DB::beginTransaction();
		try{
			
			$product = Product::where('id', $request->item_id)->first();
			if(empty($product)){
				$this->ajaxError([], 'Invalid Item');
			}
			
			// INSERT
			$insertData = [
				'user_id'			=> $user->id,
				'product_id'		=> $product->id,
				'category_id'		=> $product->category_id,
				'title'				=> $product->title,
				'category_title'	=> $product->category->title,
				//'date'				=> date('Y-m-d'),
			];
			if($request->date){
				$insertData['date'] = date('Y-m-d', strtotime($request->date));
			}
			
			if(VaccineRecord::create($insertData)){
				DB::commit();
				$this->sendResponse([], trans('common.saved_success'));
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.save_failed'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// ADD Vaccine Recordds
	public function ajax_downloadVaccineRecords(Request $request){
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.login_to_continue'));
		}
		
		try{
			
			$data = VaccineRecord::where('user_id', $user->id)->get();
			if(!empty($data)){
				
				$template_data = new \stdClass();
				$template_data->date				= date('F d, Y');
				$template_data->time				= date('h: i');
				$template_data->data				= $data;
				
				CommonHelper::sendMail($user->email, 'Order created Successfully', 'email-templates.download-vaccine-records', $template_data);
				$this->sendResponse('', 'Mail sent to registerd email address');
			}
			
			$this->ajaxError('', 'Nothing to download');
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// Export My Vaccine Recordds
	public function exportVaccineRecords(Request $request){
		
		$user = Auth()->user();
		if(empty($user)){
			return redirect()->route('firstPage');
		}
		
		// Generate QR
		$qr_code = CommonHelper::getCode($user, url('view-record/'.$user->id));
		$data 	 = VaccineRecord::where('date','!=', null)->where('user_id', $user->id)->orderBy('date','ASC')->get();
		$pdf 	 = PDF::loadView('email-templates.download-vaccine-records', compact('data', 'user', 'qr_code'));
		return $pdf->download('report.pdf');
	}
	
	// View My Vaccine Recordds
	public function viewUserVaccineRecords($id = ''){
		if(empty($id)){
			return redirect()->route('home');
		}
		
		$user = User::where('id', $id)->first();
		if(empty($user)){
			return redirect()->route('home');
		}
		
		// Generate QR
		$qr_code = CommonHelper::getCode($user, url('view-record/'.$user->id));
		$data 	 = VaccineRecord::where('date','!=', null)->where('user_id', $user->id)->orderBy('date','ASC')->get();
		return view('email-templates.download-vaccine-records', compact('data', 'user', 'qr_code'));
	}
	
	// Export Other User Vaccine Recordds [FROM BACKEND]
	public function exportUserVaccineRecords($id = ''){
		$user = Auth()->user();
		if(empty($user)){
			return redirect()->route('home');
		}
		
		if(empty($id)){
			return redirect()->route('home');
		}
		
		$user = User::where('id', $id)->first();
		if(empty($user)){
			return redirect()->route('home');
		}
		
		// Generate QR
		$qr_code = CommonHelper::getCode($user, url('view-record/'.$user->id));
		
		$data = VaccineRecord::where('date','!=', null)->where('user_id', $user->id)->orderBy('date','ASC')->get();
		return view('email-templates.download-vaccine-records', compact('data', 'user', 'qr_code')); exit;
		$pdf = PDF::loadView('email-templates.download-vaccine-records', compact('data', 'user', 'qr_code'));
		return $pdf->download('report.pdf');
	}
	
	// Export Other User Due Vaccine Recordds [FROM BACKEND]
	public function exportUserDueVaccineRecords($id = ''){
		$user = Auth()->user();
		if(empty($user)){
			return redirect()->route('home');
		}
		
		if(empty($id)){
			return redirect()->route('home');
		}
		
		$user = User::where('id', $id)->first();
		if(empty($user)){
			return redirect()->route('home');
		}
		
		$data = VaccineRecord::where('due_date','!=', null)->where('user_id', $user->id)->orderBy('date','ASC')->get();
		return view('email-templates.download-due-vaccine-records', compact('data', 'user')); exit;
		$pdf = PDF::loadView('email-templates.download-due-vaccine-records', compact('data', 'user'));
		return $pdf->download('report.pdf');
	}
	
	
	// Orders List
	public function ajax_myOrders(Request $request){
		
		$user = Auth::user();
        if(empty($user)){
            return $this->sendError('',trans('customer_api.invalid_user'));
        }
		
		try{
			$query = Order::with('order_items')->where('user_id', $user->id)->orderBy('id','DESC');
			$query->where('status','!=','Temporary');
			if($request->type == 'open'){
				$query->whereIn('status', ['New','Confirmed','Scheduled','Out-For-Delivery','Completed','Canceled','Failed']);
			}
			$data = $query->get();
			if($data){
				foreach($data as $key=>$list){
					$items = [];
					foreach($list->order_items as $item){
						if($item->product){
							$items[] = '<h4>'. $item->quantity.' '. $item->product->title .'</h4>';
						}
					}
					$data[$key]['items'] = $items;
				}
				
				$this->sendResponse($data, trans('theme.data_found_success'));
			}
			$this->sendResponse([], trans('theme.data_found_success'));
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// Update Profile
	public function ajax_updateProfile(Request $request){
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.invalid_user'));
		}
		// print_r($request->all());die;
		$validator = Validator::make($request->all(), [
			'name'			=> 'required|min:3|max:55',
			'phone_number'	=> 'required|min:1|numeric',
			'email'			=> 'required|email|unique:users,email,'.$user->id,
			'dob'			=> 'required'
		]);
		
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		try{
			if(!empty($request->profile_img) && $request->profile_img != 'undefined'){
				$image =  $this->saveMedia($request->file('profile_img'));

				User::where('id', $user->id)->update(['profile_image' => $image]);
			}
			$query = User::where('id', $user->id)->update([
				'name'          => $request->name,
				'phone_number'  => $request->phone_number,
				'email'         => $request->email,
				'dob'			=> $request->dob,
			]);
			$this->sendResponse([], trans('common.update_success'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
	
	// ADD Address
	public function ajax_saveAddress(Request $request){
		
		$validator = Validator::make($request->all(), [
			'name' 			=> 'required',
			'contact_number'	=> 'required',
			'address_type' 	=> 'required',
			'postal_code' 	=> 'required',
			'address' 		=> 'required',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}
		
		$user = Auth()->user();
		if(empty($user)){
			$this->ajaxError([], trans('common.login_to_continue'));
		}
		
		DB::beginTransaction();
		try{
			// INSERT INTO CART
			$insertData = [
				'user_id'    	=> $user->id,
				'name'			=> $request->name,
				'phone_number'	=> $request->contact_number,
				'address_type'	=> $request->address_type,
				'postal_code'   => $request->postal_code,
				'address'		=> $request->address,
				'country_id'	=> '53',
				'city_id'		=> '7',
			];
			if(Address::create($insertData)){
				DB::commit();
				$this->sendResponse([], trans('common.saved_success'));
			}
			
			DB::rollback();
			$this->ajaxError([], trans('common.save_failed'));
		} catch (Exception $e) {
			DB::rollback();
			$this->ajaxError([], $e->getMessage());
		}
	}
}