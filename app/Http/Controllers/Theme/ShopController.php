<?php
namespace App\Http\Controllers\Theme;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Auth;
use App,Validator;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Helpers\CommonHelper;
use App\Models\Category;
use App\Models\AgeGroup;
use App\Models\Brand;
use Redirect;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class ShopController extends CommonController
{
    /**
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
	* Show the product list page.
	*/
	public function index(){
		try {
			$page       = 'shopPage';
			$page_title = trans('title.shop');
			
			$categories = Category::where('status', 'active')->orderBy('priority', 'ASC')->get();
			
			return view('theme.shop.index', compact('page','page_title', 'categories'));
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	/**
	* Show the product category list.
	*/
	public function ajax_list(Request $request){
		
		$page     = $request->page ?? '1';
		$count    = $request->count ?? '100';

		if ($page <= 0){ $page = 1; }
		$start  = $count * ($page - 1);
		
		try {
			$query = Product::select('products.*')->join('categories as t2', 't2.id', '=', 'products.category_id');
			
			// STATUS
			$query->where('products.status', 'active');
			
			if($request->category_id){
				$query->where('t2.id', $request->category_id);
			}
			
			if($request->age_id){
				$query->where('products.age_group', $request->age_id);
			}
			if($request->disease_id){
				$query->where('products.category_id', $request->disease_id);
			}
			
			$data  = $query->orderBy('id', 'DESC')->offset($start)->limit($count)->get();
			if(!empty($data)){
				foreach($data as $key=> $list){
					if($list->brand){ $data[$key]->brand_title = $list->brand->title; }else { $data[$key]->brand_title  = ''; }
					if($list->category){ $data[$key]->category_title = $list->category->title; }else { $data[$key]->category_title  = ''; }
					if($list->image){ $data[$key]->image  = asset($list->image); }else { $data[$key]->image  = asset(config('constants.DEFAULT_IMAGE')); }
				}
				$this->sendResponse($data, trans('common.data_found_success'));
			}

			$this->sendResponse([], trans('common.data_found_empty'));
		} catch (Exception $e) {
			//return redirect()->back()->withError($e->getMessage());
		}
	}
	
	/**
	* Return product with category list.
	*/
	public function ajax_shop_list(Request $request){
		try {
			if($request->type == 'age'){
				
				$data = Category::select('categories.*')->join('products as t2', 't2.category_id', '=', 'categories.id')->where('categories.status','active')->whereRaw('FIND_IN_SET('. $request->age_id .', t2.age_id)')->groupBy('categories.id')->orderBy('categories.priority', 'ASC')->get();
				
				if(count($data) > 0){
					$html = '<div class="row">';
					foreach($data as $key=> $category){
					
						$products = Product::where('category_id', $category->id)->whereRaw('FIND_IN_SET('. $request->age_id .', products.age_id)')->where('status','active')->groupBy('id')->orderBy('priority', 'ASC')->offset(0)->limit(100)->get();
						
						$html.= '<div class="col-md-12 mb-20">';
						$html.= '<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<p class="cat-p">Vaccine</p>
										<div class="cat-box">
										<h3>'. $category->title .'</h3>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<p class="cat-p">Disease</p>
										<div class="cat-box-desc">
										<p>'. $category->description .'</p>
										</div>
									</div>
								</div>';
						if(count($products) > 0){
							$html.= '<div class="row"><div class="col-md-12"><p>Products available for you</p></div>';
							foreach($products as $key=> $list){
								
								$category_title = '';
								$category_slug = '';
								$brand_title = '';
								$image = asset(config('constants.DEFAULT_IMAGE'));
								
								if($list->brand){ $brand_title = $list->brand->title; }
								if($list->category){ $category_title = $list->category->title; }
								if($list->category){ $category_slug = $list->category->slug; }
								if($list->image){ $image = asset($list->image); }
								
								$html.= '<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="professional-doctors-card">
										<div class="single-products-box">
											<div class="products-image">
												<a href="'. $category_slug .'/'. $list->id .'"><img src="'. $image .'" class="main-image" alt="image"></a>
												<div class="new-tag" onclick="addToWishList('. $list->id .')" style="cursor: pointer;"><i class="ri-heart-line"></i></div>
											</div>
											<div class="products-content">
												<h3><a href="'. $category_slug .'/'. $list->id .'">'. $list->title .'</a></h3>
												<p class="mb-0" style="overflow: hidden;"><b>Vaccine: </b>'. $category_title .'</p>
												<p class="mb-0" style="overflow: hidden;"><b>Company: </b>'. $brand_title .'</p>
												<div class="price"><span class="new-price">'. $list->price .'</span></div>
												<a href="javascript:void(0)" class="add-to-cart" onclick="addToCart('. $list->id .')">Add to Cart</a>
											</div>
										</div>
									</div>
								</div>';
							}
							$html.= '</div>';
						}
						$html.= '</div>';
					}
					$html.='</div>';
					$this->sendResponse($html, trans('common.data_found_success'));
				}
				$this->sendResponse($query, trans('common.data_found_success'));
				
			}else{
				$query = Category::select('categories.*')->join('products as t2', 't2.category_id', '=', 'categories.id')->where('categories.status','active');
				if($request->disease_id){
					$query->where('categories.id', $request->disease_id);
				}
				$data = $query->groupBy('categories.id')->orderBy('categories.priority', 'ASC')->get();
				if(count($data) > 0){
					$html = '<div class="row">';
					foreach($data as $key=> $category){
					
						$query = Product::where('category_id', $category->id)->where('status','active');
						if($request->age_id){
							$query->where('age_group', $request->age_id);
						}
						if($request->disease_id){
							$query->where('category_id', $request->disease_id);
						}
						
						$html.= '<div class="col-md-12 mb-20">';
						$html.= '<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<p class="cat-p">Vaccine</p>
										<div class="cat-box">
										<h3>'. $category->title .'</h3>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<p class="cat-p">Disease</p>
										<div class="cat-box-desc">
										<p>'. $category->description .'</p>
										</div>
									</div>
								</div>';
						
						$products  = $query->groupBy('id')->orderBy('priority', 'ASC')->offset(0)->limit(100)->get();
						if(count($products) > 0){
							$html.= '<div class="row"><div class="col-md-12"><p>Products available for you</p></div>';
							foreach($products as $key=> $list){
								
								$category_title = '';
								$category_slug = '';
								$brand_title = '';
								$image = asset(config('constants.DEFAULT_IMAGE'));
								
								if($list->brand){ $brand_title = $list->brand->title; }
								if($list->category){ $category_title = $list->category->title; }
								if($list->category){ $category_slug = $list->category->slug; }
								if($list->image){ $image = asset($list->image); }
								
								$html.= '<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="professional-doctors-card">
										<div class="single-products-box">
											<div class="products-image">
												<a href="'. $category_slug .'/'. $list->slug .'"><img src="'. $image .'" class="main-image" alt="image"></a>
												<div class="new-tag" onclick="addToWishList('. $list->id .')" style="cursor: pointer;"><i class="ri-heart-line"></i></div>
											</div>
											<div class="products-content">
												<h3><a href="'. $category_slug .'/'. $list->slug .'">'. $list->title .'</a></h3>
												<p class="mb-0" style="overflow: hidden;"><b>Vaccine: </b>'. $category_title .'</p>
												<p class="mb-0" style="overflow: hidden;"><b>Company: </b>'. $brand_title .'</p>
												<div class="price"><span class="new-price">'. $list->price .'</span></div>
												<a href="javascript:void(0)" class="add-to-cart" onclick="addToCart('. $list->id .')">Add to Cart</a>
											</div>
										</div>
									</div>
								</div>';
							}
							$html.= '</div>';
						}
						$html.= '</div>';
					}
					$html.='</div>';
					$this->sendResponse($html, trans('common.data_found_success'));
				}
			}
			
			$this->sendResponse([], trans('common.data_found_empty'));
		} catch (Exception $e) {
			//return redirect()->back()->withError($e->getMessage());
		}
	}
	
	/**
	* age List list.
	*/
	public function ajax_ageList(Request $request){
		try {
			$data = AgeGroup::where('for', $request->group)->orderBy('id', 'DESC')->get();
			if(count($data) > 0){
				$this->sendResponse($data, trans('common.data_found_success'));
			}

			$this->sendResponse([], trans('common.data_found_empty'));
		} catch (Exception $e) {
			//return redirect()->back()->withError($e->getMessage());
		}
	}
	
	
	/**
	* Show the product details page.
	*/
	public function show($slug = ''){
		try {
			$page       = 'product';
			$page_title = 'Product Details';
			
			
			$data = Product::where(['slug'=>$slug, 'status'=>'active'])->first();
			
			if(empty($data)){
				$data = Product::where(['id'=>$slug, 'status'=>'active'])->first();
			}
			
			if(!empty($data)){
				$page_title = $data->title;
				return view('theme.shop.product', compact('page','page_title', 'data'));
			}
			return redirect()->route('shopPage');
			
		} catch (Exception $e) {
			return redirect()->route('shopPage')->withError($e->getMessage());
		}
	}
	
	/**
	* Show the product details page.
	*/
	public function productbyCategory($slug = ''){
		try {
			$page       = 'product';
			$page_title = 'Product Details';
			
			$data = Product::where(['slug'=>$slug, 'status'=>'active'])->first();
			
			if(empty($data)){
				$data = Product::where(['id'=>$slug, 'status'=>'active'])->first();
			}
			
			if(!empty($data)){
				$page_title = $data->title;
				return view('theme.shop.product', compact('page','page_title', 'data'));
			}
			return redirect()->route('shopPage');
			
		} catch (Exception $e) {
			return redirect()->route('shopPage')->withError($e->getMessage());
		}
	}

	// add contact
    public function store(Request $request){

		$this->validate($request, [
			'fname'			    => 'required|min:1|max:99',
			'phone_number'		=> 'required|min:1|max:99',
			'email'			    => 'required|min:1|max:99',
		]);
		$data =
			[
				'firstname'			    =>$request->fname,
				'lastname'			    =>$request->lname ,
				'phone_number'		=> $request->phone_number,
				'email'			    =>  $request->email,
				'message'	        => "",
			];
		
		Contact::create($data);
		$data 		 = new \stdClass();
		$data->firstname	 = $request->fname;
		$data->lastname	 = $request->lname;
		$data->phone_number	 =$request->phone_number;
		$data->email	 = $request->email;
		$data->message	 = $request->message;
		$return = CommonHelper::sendmail("jay@thepoised.in", 'Contact Us | Intuitive.Cloud', 'email-templates/contact-contactus', $data);
		$return = CommonHelper::sendmail($request->email, 'Thanks for contacting Intuitive.Cloud', 'email-templates/contact-us-user', $data);
		// $arr = [
        //     'properties' => [
        //         [
        //             'property' => 'firstname',
        //             'value' => $request['name']
        //         ],
               
        //         [
        //             'property' => 'phone',
        //             'value' => $request['phone_number']
        //         ],
        //         [
        //             'property' => 'email',
        //             'value' => $request['email']
        //         ],
        //     ]
        // ];
        // $post_json = json_encode($arr);
        // $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=38119223-56c6-4d2a-8ec6-3935aa7291ce';
        // $client = new Client();
        // $res = $client->request('POST', $endpoint, [
        //     'body' => $post_json
        // ]);
		return redirect(route('thankyou'));   

        // return view('theme/cms-pages/contact-us')->with('success','Thanks For Contant us');
    }

	public function list(){
		$page       = 'Contact Us Details';
		$page_title = 'Contact Us Details';
		return view('backend.company.contact-us',compact('page','page_title'));
	}

	

	

}