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
use App\Models\Service;
use App\Models\Casestudy;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Slide;
class BlogController extends CommonController
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
		try{
			$page 		= 'Blog';
			$page_title = "Insights and Ideas for Cloud Innovation | Intuitive Blog";
			$page_description = "Explore the Intuitive blog for valuable insights on cloud innovation, covering topics such as Cloud Engineering, DataOps, Cloud Security, and more.";
			$slider = Slider::where(['slug'=>"Listing",'status'=>"active"])->first();
			$slide = array();
			if(isset($slider->id) && $slider->id != "")
			{
				$slide = Slide::where('slider_id',$slider->id)->get();
			}
			$data 		= Post::where('status', "active")->orderBy('id', 'DESC')->simplePaginate(8);
			$category 		= Category::where(['status'=>"active",'module'=>"Blog"])->get();
			$popularpost 		= Post::where(['status'=>"active"])->inRandomOrder()
			->limit(5)
			->get();
			return view('theme.blog', compact(['page','page_title','page_description', 'category','popularpost','data','slide']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
	
	public function show($slug){
		try{
			$page 		= 'Blog';
			$data 		= Post::where('slug', $slug)->first();
			$page_main_title = $data->page_title;
			$page_title = $data->post_seo_title;
			$page_description = $data->post_seo_description;
			$category 		= Category::where(['status'=>"active",'module'=>"Blog"])->get();
			$popularpost 		= Post::where(['status'=>"active"])->inRandomOrder()
			->limit(5)
			->get();
			$next_record = Post::where('id', '>', $data->id)->orderBy('id')->first();
			$previous_record = Post::where('id', '<', $data->id)->orderBy('id','desc')->first();
			return view('theme.blogdetail', compact(['page','page_title','page_main_title','next_record','category','page_description','popularpost','previous_record' ,'data']));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}

	public function filterblog(Request $request){
		try{
			
			$myString = $request->id;
			$myArray = explode(',', $myString);
			$data = Post::whereRaw("find_in_set($myString , category)")->where('status', "active")->get();
			foreach($data as$key=> $list)
			{
				if($list->image){ $data[$key]->image  = asset($list->image); }else { $data[$key]->image  = asset(config('constants.DEFAULT_MENU_IMAGE')); }
			}
			$this->sendResponse($data, trans('common.data_found_success'));
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}

	public function servicecloud($slug){
		try{
			
			$page 		= 'Service';
			$data 		= Service::where('slug', $slug)->first();
			$page_title = "Service Detail";
			$page_main_title = $data->page_title;
			
			if($slug == "digital-workspace")
			{
				$page 		= 'Service';
				$page_title = $data->meta_title;
				$page_description = $data->meta_description;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				$seo_keywords = $data->seo_keywords;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				return view('theme.serviceone', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "cloud-native")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.servicetwo', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "cloud-security-and-grc")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.servicethree', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "ai-ml-solutions")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.servicenine', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "data-ops")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.serviceseven', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "hybrid-cloud")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.servicefive', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "cloud-infrastructure-engineering")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				 return view('theme.servicesix', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "cloud-finops")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				 return view('theme.serviceeight', compact(['page','page_title','blog','page_main_title','page_description','seo_keywords','casestudy','data']));
			}
			elseif($slug == "life-at")
			{
				$page_title = $data->meta_title;
				$casestudy = Casestudy::where('page_for',$slug)->get();
				$page_description = $data->meta_description;
				$seo_keywords = $data->seo_keywords;
				$slider = Slider::where(['slug'=>"Category",'status'=>"active"])->first();
				$slide = array();
				if(isset($slider->id) && $slider->id != "")
				{
					$slide = Slide::where('slider_id',$slider->id)->get();
				}
				$slider2 = Slider::where(['slug'=>"lifeatpage2",'status'=>"active"])->first();
				$slide2 = array();
				if(isset($slider2->id) && $slider2->id != "")
				{
					$slide2 = Slide::where('slider_id',$slider2->id)->get();
				}
				$blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)->get();
				return view('theme.lifeat', compact(['page','page_title','blog','page_main_title','page_description','slider2','slide2','slider','slide','seo_keywords','casestudy','data']));
			}
			
			
		} catch (Exception $e) {
			return redirect()->back()->withError($e->getMessage());
		}
	}
}