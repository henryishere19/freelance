<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App;
use App\Models\Post;
use App\Models\Serviceuser;
use App\Models\Leader;
use App\Models\Years;
use App\Models\Slider;
use App\Models\Slide;
use App\Models\Helpers\CommonHelper;
use App\Models\Casestudy;
use Validator;
use URL;
class CmsController extends CommonController
{
	use CommonHelper;

    /**
	* Show the application CMS pages.
	* @return \Illuminate\Contracts\Support\Renderable
	*/
    public function aboutUs(){
		$page		= 'abouts-us';
        $page_title = "About Intuitive Cloud | Cloud Innovation Partner of Choice";
        $page_description = "Learn how Intuitive delivers cloud innovation solutions in Cloud Engineering, DataOps, Cloud Security, and Digital Workspace. Discover how we can help transform your business.";
		
		$data = Post::where('slug', 'about-us')->first();
		$leader = Leader::where(['title'=>"Jay Modh",'status'=>'active'])->first();
		$leader1 = Leader::where(['title'=>"Indraneel Shah",'status'=>'active'])->first();
		$leader2 = "";
		if(isset($leader->id) && $leader->id != "" && isset($leader->id) && $leader->id  != "")
		{
			$leader2 = Leader::whereNotIn('id',[$leader->id,$leader1->id])->get();
		}	
		$years = Years::where('status','active')->get(); 
		return view('theme.cms-pages.about-us',compact('page', 'page_title','page_description','leader','leader1','years', 'leader2','data'));
    }
	
	public function takeAtour(){
		$page		= 'about-us';
        $page_title = trans('title.take_a_tour');
		
		return view('theme.cms-pages.take-a-tour',compact('page', 'page_title'));
    }
	
	public function contactUs(){
		$page		= 'contact-us';
        $page_title = "Contact Us for Cloud Solutions | Intuitive Cloud";
        $page_description = "Get in touch with Intuitive.Cloud to learn more about our cloud innovation solutions and how we can partner with you to drive extraordinary business outcomes. ";
		$slider = Slider::where(['slug'=>"Contactus",'status'=>"active"])->first();
        $slide = array();
        if(isset($slider->id) && $slider->id != "")
        {
            $slide = Slide::where('slider_id',$slider->id)->get();
        }
		return view('theme.cms-pages.contact-us',compact('page','slider','slide', 'page_title', 'page_description'));
    }
	
	public function contactUsadd(Request $request){
		$data 		 = new \stdClass();
		$data->name	 = $request->name;
		$return = CommonHelper::sendmail("nirav.goriya@codefencers.com", 'Recover Passsword', 'email-templates/contact-user', $data);
		return redirect()->back()->with('success', 'Successfully Submit Enquiry');   


	}
	public function subscribeus(Request $request){
		$data 		 = new \stdClass();
		$data->name	 = "Intituve";
		$return = CommonHelper::sendmail($request->email, 'Thanks for Subscribing', 'email-templates/contact-user', $data);
		return redirect()->back()->with('success', 'Successfully Submit Enquiry'); 
	}
	public function thankyou(){
		$page		= 'Thank You';
        $page_title = "Thank You";
		return view('theme.thankyou',compact('page', 'page_title'));
	}
	public function terms(){
		$page		= 'Terms';
        $page_title = "Term & Condition";
		
		$data = Post::where('slug', 'terms')->first();
		return view('theme.cms-pages.terms',compact('page', 'page_title', 'data'));
    }
	public function leadership(){
		$page		= 'Leader';
        $page_title = "Leader";
		
		$data = Leader::where('status','active')->orderBy('priority', 'DESC')->get();
	
		return view('theme.leader',compact('page', 'page_title', 'data'));
    }
	
	public function privacy(){
		$page		= 'Privacy';
        $page_title = "Privacy Policy";
		$page		= 'Privacy';
		$page_description = "";
		$seo_keywords = "";
		$page_main_title = "";
		return view('theme.cms-pages.privacy',compact('page', 'page_title','seo_keywords','page_main_title','page_description'));
    }
	public function cookie_privacy(){
		$page		= 'Privacy';
        $page_title = "Privacy Policy";
		$page_description = "";
		$seo_keywords = "";
		$page_main_title = "";
		return view('theme.cms-pages.cookie-privacy',compact('page', 'page_title','seo_keywords','page_main_title','page_description'));
    }
	public function refund(){
		$page		= 'refund';
        $page_title = trans('title.refund');
		
		return view('theme.cms-pages.refund',compact('page', 'page_title'));
    }

	public function lifeat()
    {
		return view('theme/life-at');
    }

	public function termcontion()
    {
		return view('theme/life-at');
    }

	public function serviceus(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'unique:service_user,email'
		]);
		if($validator->fails()){
			$this->ajaxValidationError($validator->errors(), trans('common.error'));
		}
		$array= [
			'name'=>$request->name,
			'email'=>$request->email,
			'number'=>$request->number,
			'message'=>$request->message,
			'service'=>$request->service
		];
		Serviceuser::insert($array);
		$o = (object) ['name' => 'new object','service'=>$request->service,'email'=>$request->email];
		$return = CommonHelper::sendMail($request->email, 'Thanks For Subscribeus', 'email-templates/contact-popup', $o);
		$this->sendResponse([], "Thanks for register");
		exit;
		// $data 		 = new \stdClass();
		// $data->name	 = "Intituve";
		// $return = CommonHelper::sendmail($request->email, 'Thanks For Subscribeus', 'email-templates/contact-user', $data);
		// return redirect()->back()->with('success', 'Successfully Submit Enquiry'); 
	}

	public function save_media(Request $request){
		
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('media'), $fileName);
		return response()->json(['location'=> URL::to('/')."media/".$fileName]);
	}

	public function case_study(){

		$page		= 'case-study';
        $page_title = "Contact Us for Cloud Solutions | Intuitive Cloud";
        $page_description = "Get in touch with Intuitive.Cloud to learn more about our cloud innovation solutions and how we can partner with you to drive extraordinary business outcomes. ";
		$slider = Slider::where(['slug'=>"Contactus",'status'=>"active"])->first();
        $slide = array();
        $data =  Casestudy::orderBy('id', 'DESC')->simplePaginate(8);
        if(isset($slider->id) && $slider->id != "")
        {
            $slide = Slide::where('slider_id',$slider->id)->get();
        }
		return view('theme.case-study',compact('page','slider','slide', 'page_title', 'page_description','data'));
	}
}