@extends('layouts.theme.master')

@section('content')
<main id="main">
<!-- ======= Main Banner Section ======= -->
<section id="main-banner" class="main-banner">
  <div class="container-fluid p-0">
    <div class="banner-details">
      <div class="banner-main">
        <div class="main-banner-content">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-lg-6 col-md-6">
                <div class="banner-text">
                  <h1>{{$data->title}}</h1>
                  <p class="mt-4">{!! $data->description !!}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="banner-img">
                    @if(isset($data->banner_image) && $data->banner_image != "")
                      <img src="{{asset($data->banner_image)}}" class="img-fluid">
                    @endif                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ======= End Main Banner Section ======= -->
<section id="run-your-enterprise" class="run-your-enterprise">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 run-your-enterprise-heading d-flex align-items-center">
      	@if(isset($data->content_title_main) && $data->content_title_main != "")
				  <h4>{{$data->content_title_main}}</h4>
			  @endif
      </div>
      <div class="col-lg-6 col-md-6 run-your-enterprise-content">
      @if(isset($data->maincontentdescription) && $data->maincontentdescription != "")
				<h4>{!! $data->maincontentdescription !!}</h4>
			@endif
      </div>
    </div>
  </div>
</section>
<section id="cloud-saas" class="cloud-saas">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h3>{{$data->innovation_title}}</h3>
    </div>
    <div class="row">
    <?php $innovation = json_decode($data->innovation);?>
      @if(!empty($innovation) && $innovation != "")
      @foreach($innovation as $ino)
      <div class="col-lg-6 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box d-flex align-items-start">
          <div class="icon d-flex align-items-center">
            <img src="{{asset('accolades-img/')}}/{{$ino->image}}" class="img-fluid cloud-saas superpowers-image">
            <p class="icon-box-title">{{$ino->title}}</p>
          </div>
          <div>
            <p class="text-left">{!! $ino->description !!}.</p></div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</section>
<section class="enabling" class="enabling">
  <div class="container">
    <div class="section-title">
      <h3 class="w-100">{{$data->title_migration}}</h3>
    </div>
    <?php $migration = json_decode($data->migration);?>
      @if(!empty($migration) && $migration != "")
        @foreach($migration as $mig)
        <div class="row mt-5 mb-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>{{$mig->title}}</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="{{asset('img/Home/arrow-button.png')}}" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>{!!$mig->description!!}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    <!-- <div class="row mt-5 mb-5">
      <div class="col-lg-4 col-md-4 mb-4">
        <div class="enabling-title-box">
          <h2>Advanced Threat Detection</h2>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
        <div class="enabling-content-box">
          <div class="arrow-img">
            <img src="assets/img/Home/arrow-button.png" class="img-fluid">
          </div>
          <div class="enabling-content">
            <p>Cloud security offers advanced threat detection and protection against cyber threats. In fact, a recent report by McAfee found that organizations using cloud security experience 50% fewer security incidents and resolve security incidents 33% faster than those who do not.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-4 col-md-4 mb-4">
        <div class="enabling-title-box">
          <h2>Regulatory Compliance</h2>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
        <div class="enabling-content-box">
          <div class="arrow-img">
            <img src="assets/img/Home/arrow-button.png" class="img-fluid">
          </div>
          <div class="enabling-content">
            <p>87% of global IT decision-makers said that a lack of compliance automation was a challenge for their organizations in maintaining compliance in the cloud. With cloud security solutions, organizations can leverage enhanced infrastructure and managed security services to ensure compliance with industry-specific and regulatory standards. This can provide peace of mind to both businesses and their clients, and protect sensitive data from potential breaches or attacks.</p>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</section>
<section id="we-deliver" class="we-deliver">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h3 class="w-100">{{$data->content_title}}</h3>
    </div>
    <div class="row d-flex justify-content-center">
    <?php $content = json_decode($data->content);?>
      @if(!empty($content) && $content != "")
        @foreach($content as $con)
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <p class="icon-box-title">{{$con->title}}</p>
              <p class="text-left">{{$con->description}}</p>
            </div>
          </div>
        @endforeach
      @endif
      <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <p class="icon-box-title">Governance, Risk, and Compliance Assessment</p>
          <p class="text-left">We perform comprehensive assessments in evaluating your organization’s Governance, Risk management, and Compliance processes. It involves an in-depth analysis of internal controls, policies, and the effectiveness of the procedures in meeting compliance and regulatory requirements.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <p class="icon-box-title">Identity and Privilege Access Management (IAM, PIM and PAM)</p>
          <p class="text-left">Designing a well-defined identity architecture and strategy covering the business and technical requirements outlining the Governance framework of IAM. This includes policies and procedures for Identity provisioning, access requests, password management and privilege identities management thus addressing the organization’s regulatory compliance requirements such as GDPR, HIPAA and SOX.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <p class="icon-box-title">Data Security, Privacy, Strategy and Services</p>
          <p class="text-left">We help protect critical data on-prem, public/hybrid cloud. Consulting and managed security services to standardize and automate data security by assessing your data authorization, authentication, encryption methods, and backup processes and analyzing the maturity, safeguarding privacy, maintaining confidentiality as well as identifying the risks, gaps, and improvement areas.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
        <div class="icon-box">
          <p class="icon-box-title">Application Security</p>
          <p class="text-left">Well-defined Application Security Strategy including Secure Development Lifecycle (SDLC) that encompasses a secure software development lifecycle. Conducting code and security reviews of your applications, identifying and mitigating vulnerabilities, strong application access controls, and input and output encoding in turn address vulnerabilities and prevent injection attacks and application-level attacks.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
        <div class="icon-box">
          <p class="icon-box-title">Network and Infrastructure Security</p>
          <p class="text-left">We help develop a comprehensive security strategy to secure an organization’s cloud and/or on-premises infrastructure to protect your organization’s critical assets, data and intellectual property, IT systems from cyber threats.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
        <div class="icon-box">
          <p class="icon-box-title">Security operations</p>
          <p class="text-left">For seamless security management, we set up user-friendly tools, alerts, and effective monitoring processes. This also includes continuous cyber risk quantification, vulnerability assessment and penetration testing.</p>
        </div>
      </div> -->
    </div>
  </div>
</section>
<section id="our-differentiators" class="our-differentiators">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h3 class="w-100">{{$data->double_title}}</h3>
    </div>
    <div class="row">
    <?php $double_value = json_decode($data->double_value);?>
      @if(!empty($double_value) && $double_value != "")
        @foreach($double_value as $db)
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('accolades-img/')}}/{{$db->image1}}" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>{!! $db->description !!}</p>
              </div>
            </div>
          </div>
        @endforeach
      @endif
      <!-- <div class="col-lg-6 col-md-6">
        <div class="our-differentiators-main">
          <div class="our-differentiators-main-img">                
              <img src="assets/img/cloud-security/The-Intuitive-Cloud-2.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
              <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
          </div>
          <div class="our-differentiators-main-content">
            <p>Enjoy end-to-end network security with continuous testing and scanning. Go the extra mile, run phishing and social engineering tests to future-proof your enterprise</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="our-differentiators-main">
          <div class="our-differentiators-main-img">                
              <img src="assets/img/cloud-security/The-Intuitive-Cloud-3.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
              <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
          </div>
          <div class="our-differentiators-main-content">
            <p>Depend on industry-leading assessment controls (NIST SP800-144, Cloud Controls Matrix, CIS controls and benchmarks) when you sign up with us</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="our-differentiators-main">
          <div class="our-differentiators-main-img">                
              <img src="assets/img/cloud-security/The-Intuitive-Cloud-4.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
              <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
          </div>
          <div class="our-differentiators-main-content">
            <p>Understand your security posture and focus budget and resources based on real-time data and comprehensive dashboards</p>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
<section id="Our-Differentiators" class="Our-Differentiators">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h3 class="w-100">{{$data->imapact_title}}</h3>
    </div>
    <div class="row">
    <?php $impact = json_decode($data->impact);?>
      @if(!empty($impact) && $impact != "")
        @foreach($impact as $imp)
          <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <p class="text-left">{!! $imp->description !!}</p>
            </div>
          </div>
        @endforeach
      @endif
      <!-- <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <p class="text-left">Create an organizational culture shift and test both people and processes for security vulnerabilities</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <p class="text-left">Stay continuously secure across every aspect of your enterprise with automation, InfraSec, container and microservice security, serverless run-time protection, code security, and release management</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <p class="text-left">With incident response readiness, taskforce, cyber recovery and data management services</p>
        </div>
      </div> -->
    </div>
  </div>
</section>
<section id="read-about" class="read-about">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h3>Read about the latest developments in Intuitive InfoSec and InfraSec</h3>
    </div>
    <div class="intuitive-insights-slider">
      @if($blog)
        @foreach($blog as $b)
        <div class="intuitive-insights-main-box">

          <div class="intuitive-insights-content">
      <p class="date">By {{$b->author}} / @if(isset($b->post_date) && $b->post_date != "") {{ \Carbon\Carbon::createFromTimestamp(strtotime($b->post_date))->format('M d,Y')}}@else {{ \Carbon\Carbon::createFromTimestamp(strtotime($b->created_at))->format('M d,Y')}} @endif</p>
            <!-- <p class="date">23 Oct,2021</p> -->

            <h4 class="intuitive-insights-title mb-3">{{$b->title}}</h4>

            <p class="intuitive-insights-info">{!! $b->short_description !!}</p>

            <div class="intuitive-insights-img mb-3 d-flex align-items-center">

              <img src="{{asset('img/Home/arrow-button.png')}}" class="img-fluid">

              <a href="{{route('blog.details', ['slug' => $b->slug])}}" class="requste-button">Read More</a>

            </div>

          </div>

        </div>
        @endforeach
        @endif
    </div>
  </div> 
</section>
<section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
  <div class="container">
  <div class="row d-flex align-items-center">
    <div class="col-lg-12 col-md-12">
      <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
      <div class=" d-flex align-items-center believe-button mt-5">
        <img src="{{asset('img/Home/arrow-button.png')}}" class="img-fluid">
        <a href="https://www.intuitive.cloud/contact-us" class="button">Get in touch today</a></div>
      </div>
      <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center we-believe-that-content" data-aos="fade-right" data-aos-delay="100">
      </div>
    </div>
  </div>
</section>
</main>

    <!-- /main -->
@endsection
@section('js')
<script>
	$(document).ready(function(){
		// getData();
	})
	function categopost(ids){
		var data = new FormData();
		data.append('id', ids);
		var response = runAjax('{{route("ajax.category.post.list")}}', data); 
		if(response.status == '200'){
			$('#data-list').empty();
			if(response.data.length > 0){
				var htmlData = '';
				$.each(response.data, function( index, value ) {
					//var date = moment.unix(value.timestamp).format("DD-MMMM-YYYY (h:mm a)");
					htmlData+= '<div class="col-lg-6 col-md-6 mb-4"><div class="blog-details"><div class="blog-image"><img src="'+ value.image+'" class="img-fluid" /></div>'+
									'<div class="blog-content"><h4>'+ value.title+'</h4><p class="mb-4">'+ value.description+'</p>'+
									'<a href="/blog/'+ value.id+'">Read More</a></div></div></div>';
								
					})
				$('#data-list').html(htmlData);
			}
		}
	}
	// GET LIST
	// function getData(){
	// 	var data = new FormData();
	// 	data.append('page', $('#filterBox #page').val());
	// 	data.append('count', $('#filterBox #count').val());
	// 	data.append('status', $('input[name="statusRadio"]:checked').val());
	// 	var response = adminAjax('{{route("ajax.category.list")}}', data); 
	// 	if(response.status == '200'){
	// 		$('#data-list').empty();
	// 		if(response.data.length > 0){
	// 			var htmlData = '';
	// 			$.each(response.data, function( index, value ) {
	// 				//var date = moment.unix(value.timestamp).format("DD-MMMM-YYYY (h:mm a)");
	// 				htmlData+= '<tr>'+
	// 								'<th scope="row">'+ value.id +'</th>'+
	// 								'<td><img src="'+ value.image +'" height="50px" width="50px"></td>'+
	// 								'<td>'+ value.title +'</td>'+
	// 								'<td>'+ value.priority +'</td>'+
	// 								'<td>'+ value.status +'</td>'+
	// 								'<td>'+ value.action +'</td>'+
	// 							'</tr>';
	// 			})
	// 			$('#data-list').html(htmlData);
	// 		}
	// 	}
	// }
</script>
@endsection