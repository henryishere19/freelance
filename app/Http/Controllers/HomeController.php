<?php

namespace App\Http\Controllers;

use Validator,Auth,DB;

use Illuminate\Http\Request;
use App\Models\Helpers\CommonHelper;
use App\Http\Controllers\CommonController;
use App\Models\Section;
use App\Models\Company;
use App\Models\Accolades;
use App\Models\Accoladesdatails;
use App\Models\Media;
use App\Models\Slider;
use App\Models\Slide;
use App\Models\Instive;
use App\Models\Post;
use App\Models\Lifeatinstetive;
use App\Models\Setting;
use App\Models\Pressrelease;
use App\Models\Service;
use App\Models\Subscribe;
use App\Models\Easier;
use App\Models\Portfolio;
use App\Models\Portfoliodatails;
class HomeController extends CommonController
{
    /**
	* Create a new controller instance.
	* @return void
	*/
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
    * Show the application first page.
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
		$page = 'homePage';
        $page_title = "An Engineering Company Delivering Cloud Excellence | Intuitive Cloud";
		$page_description = "Partner with Intuitive, a trusted global cloud innovation company for customized and scalable technology solutions to achieve high-impact business outcomes.";
        $data  = Section::where(['priority'=>'1','page'=>"home"])->first();
        $data2  = Section::where(['priority'=>'2','page'=>"home"])->first();
        $data9  = Section::where(['priority'=>'999','page'=>"other"])->first();
        $data4  = Instive::where(['status'=>'active'])->get();
        $data3  = Section::where(['priority'=>'3','page'=>"other"])->first();
        $data7  = Section::where(['priority'=>'7','page'=>"home"])->first();
        $data10  = Section::where(['priority'=>'1010','page'=>"home"])->first();
        $company1  = Company::where(['status'=>'active','page'=>'home','priority'=>'1'])->first();
        $media1 = array();
        if(isset($company1->id) && $company1->id != "")
        {
            $media1 = Media::where('reation_id',$company1->id)->get()->toArray();
        }
        $company2  = Company::where(['status'=>'active','page'=>'home','priority'=>'7'])->first();
        $media2 = array();
        if(isset($company2->id) && $company2->id != "")
        {
            $media2 = Media::where('reation_id',$company2->id)->get();
        }
       
        $accolades  = Accolades::where('priority','1')->first();
        $slider = Slider::where(['slug'=>"Home",'status'=>"active"])->first();
        $blog = Post::where(['status'=>"active"])->inRandomOrder()->limit(5)
        ->get();
        $servicenew = Service::where(['status'=>"active"])->orderBy('priority')->limit(8)->orderBy('item_position','ASC')->get();
        $service = Service::where(['status'=>"active"])->orderBy('priority')->whereNotIn('slug',['life-at'])->limit(3)->orderBy('item_position','ASC')->get();
        $aras = [];
        foreach($service as $ser)
        {
            $aras[]=$ser->id; 
        }
        $serviceback = Service::where(['status'=>"active"])->whereNotIn('id',$aras)->whereNotIn('slug',['life-at'])->limit(3)->get();
        $setting  = Setting::where(['status'=>"active",'name'=>'site_email'])->first();
        $settingaddress  = Setting::where(['status'=>"active",'name'=>'address'])->first();
        $slide = array();
        if(isset($slider->id) && $slider->id != "")
        {
            $slide = Slide::where('slider_id',$slider->id)->get();
        }
        $accoladesdetail  = array();
        if(isset($accolades->id) && $accolades->id != "")
        {

            $accoladesdetail  = Accoladesdatails::where('acc_id',$accolades->id)->get();
        }
        return view('theme.firstPage', compact('page','data','accolades','page_title','page_description','media1','data9','company1','data10','servicenew','data4','service','data3','serviceback','company2','settingaddress','media2','blog','data2','setting','data7','slide','accoladesdetail'));
    }
	
	public function home()
    {
		return redirect()->route('firstPage');
    }

    public function lifeat()
    {
		return view('theme/life-at');
    }

    public function lifeatnew()
    {
        $page_title = "Life at Intuitive | Explore Our Culture and Values";
		$page_description = "Explore Intuitive's culture, values, and career opportunities and more.";
        $lifeat = Lifeatinstetive::where('status','active')->get();
        $easer = Easier::where('status','active')->get();
        $company = Company::where(['status'=>'active','priority'=>'555'])->first();
        if($company)
        {
         $gallary = Media::where('reation_id',$company->id)->get();
        }
		return view('theme/lifeatnew',compact('lifeat','page_title','page_description','easer','company','gallary'));
    }
    public function portfolio()
    {  
        $page		= 'Our Innovation Portfolio';
        $page_title = "Explore Our Cloud Innovation Portfolio | Intuitive Cloud";
        $page_description = "Discover Intuitive.Cloud's Innovation Portfolio with companies having background in Data, Cybersecurity and more.";
        $portfolio = "";
        $portfolio_detail = '';
        $portfolio2 = "";
        $portfolio_detail2 = '';
        $portfolio3 = "";
        $portfolio_detail3 = '';
        $portfolio4 = "";
        $portfolio_detail4 = '';
        $portfolio = Portfolio::where(['status'=>'active','priority'=>'45'])->first();
        if($portfolio)
        {
            $portfolio_detail = Portfoliodatails::where(['port_id'=>$portfolio->id])->get();
        }
        $portfolio2 = Portfolio::where(['status'=>'active','priority'=>'68'])->first();
        if($portfolio2)
        {
            $portfolio_detail2 = Portfoliodatails::where(['port_id'=>$portfolio2->id])->get();
        }
        $portfolio3 = Portfolio::where(['status'=>'active','priority'=>'64'])->first();
        if($portfolio3)
        {
            $portfolio_detail3 = Portfoliodatails::where(['port_id'=>$portfolio3->id])->get();
        }
        $portfolio4 = Portfolio::where(['status'=>'active','priority'=>'33'])->first();
        if($portfolio4)
        {
            $portfolio_detail4 = Portfoliodatails::where(['port_id'=>$portfolio4->id])->get();
        }
        $slider = Slider::where(['slug'=>"Portfolio",'status'=>"active"])->first();
        $slide = array();
        if(isset($slider->id) && $slider->id != "")
        {
            $slide = Slide::where('slider_id',$slider->id)->get();
        }
		return view('theme/portfolio',compact('portfolio','slider','page_title','page_description','page','slide','portfolio_detail','portfolio2','portfolio_detail2','portfolio3','portfolio_detail3','portfolio4','portfolio_detail4'));
    }
    public function press_release()
    {
        $page		= 'Press Release';
        $page_title = "Intuitive Press Releases | Stay Up-to-Date with Latest News";
        $page_description = "Keep informed on our latest news through our press release page, featuring our innovative solutions, partnerships, and company updates. ";
        $pressrelease = Pressrelease::where('status','active')->get();
        $slider = Slider::where(['slug'=>"PressRealease",'status'=>"active"])->first();
        $slide = array();
        if(isset($slider->id) && $slider->id != "")
        {
            $slide = Slide::where('slider_id',$slider->id)->get();
        }
		return view('theme/press-release',compact('pressrelease','page_title','page_description','page','slider','slide'));
    }
    public function subscribe(Request $request)
    {

        $check = Subscribe::where('email',$request->email)->first();
		if($check){
			return $this->ajaxError([], 'Email Already Exist');
		}

		$validator = Validator::make($request->all(), [
			'email'			=> 'required|email',
		]);
		if($validator->fails()){
			$this->ajaxError([], $validator->errors()->first());
		}

		DB::beginTransaction();
		
		try{
			
			$data = $request->all();
             $datas = Subscribe::create($data);
            // dd($data);
                   

			if(!empty($datas)){
               
		$return = CommonHelper::sendmail($request->email, 'Thanks for Subscribing', 'email-templates/contact-user', $datas);
        DB::commit();
        $this->sendResponse([], "Subscribe successfully");
				}
			
			$this->ajaxError('', 'Nothing to Send Message');
		} catch (Exception $e) {
			$this->ajaxError([], $e->getMessage());
		}
         
    }
    public function tokengenerate(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://id.jobadder.com/connect/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'grant_type=refresh_token&client_id=3562f2gwrdcunkqywaiqekc76e&client_secret=gcjyaph7dprubam7gidgmimud4xyx7wvdvb4ye3hejsn3oz4tfba&refresh_token=c7f2960b86aebc2cfe27d6e11a32ec57',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: SignInMessage.a36c11fd4cbad8083367e9ea5e0165bf=OmIp8hyLCoOIi0Yia8y1cNrY3CTGF5cxuYLvreJGWa5BQIy7uXrGPb1UsHOMiO6Eeapnl9qgRmfwf1NhQHQ0uMcDA20EJaXYmgK_GkFRYl1NlO3cDJOeGIXEl3XaU9y0oCbiZqZPJEChWeYRbOzzNW0EVZHuhpvc2rOQigFZFmqcfyzXaC8V0SN_Y1_n7nIuJXfUu_yyElx9oFZhszjTvWD2xXuRxkLxMwJFjdX3poyBQKSzVso3UO19-UKyXdjZX_LV7SUo6IH1wb4BTC1AzB3IRB1tc_UiMQOcmrrWu87TLGi6sflXPXJJAffTVNTV0A1--3AB2pGlB4FcHOiMkaSSXiCdoFYvhP3OPPfFoM71dQ22p-6hqcB8mgejL-D6TyGMpt8oVVoC0YweCWApoMyee89SNVwv1XFZoouYvWQSmoBvOE23d9jpMyCID-31O-Gfnw; idsrv.xsrf=jpmNd_y-SSmmSQSmfzm7wBI4eGFRuXeVYOMjQj4RzhPZkeS4kak2Nwq_Ved3Oc6HMkDllYM48I8wwPxb_bqyFAMuHWc'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        if($response)
        {
            $token_decode = json_decode($response);
            if(isset($token_decode->access_token) && $token_decode->access_token != "")
            {
                return $token_decode->access_token;
            }
        }
    }
    public function carear(){
        $token = $this->tokengenerate();
        if(!isset($token) && $token == "")
        {
            $token = "3adf971b00c004329496a131e048e906";
        } 
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jobadder.com/v2/jobboards/113153/ads',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if(isset($response) && $response != "")
        {
            
            $jsndata = json_decode($response);
            $page		= 'Careers';
            $page_title = "Join our Innovative Team | Careers at Intuitive Cloud";
            $page_description = "Explore career opportunities by joining the Intuitive Rocketship. Join our mission to accelerate change through technology solutions.";

            return view('theme.carear',compact('jsndata','page_title','page_description','page'));
        } 
    }
    public function carearviewjob($board_id,$jobid){
    
        $curl = curl_init();
        $token = $this->tokengenerate();
        if(!isset($token) && $token == "")
        {
            $token = "3adf971b00c004329496a131e048e906";
        } 
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jobadder.com/v2/jobboards/'.$board_id.'/ads/'.$jobid.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if(isset($response) && $response != "")
        {
            $jsndata = json_decode($response);
            return view('theme.jobdetails',compact('jsndata'));
        } 
    }
    public function aws(){
    
    return view('theme.aws');
    }
    

}