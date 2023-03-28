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
	  <div class="col-lg-6 run-your-enterprise-heading d-flex align-items-center">
			@if(isset($data->content_title_main) && $data->content_title_main != "")
				<h4>{{$data->content_title_main}}</h4>
			@endif
	  </div>            
	  <div class="col-lg-6 run-your-enterprise-content">
		@if(isset($data->maincontentdescription) && $data->maincontentdescription != "")
			<h4>{!! $data->maincontentdescription !!}</h4>
		@endif
	  </div>
	</div>
  </div>
</section>

<section id="devsecOps-innovations" class="devsecOps-innovations">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3 class="w-100">{{$data->innovation_title}}</h3>
	</div>

	<div class="row">
	<?php $innovation = json_decode($data->innovation);?>
      @if(!empty($innovation) && $innovation != "")
		@foreach($innovation as $ino)
		<div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
			<div class="icon-box">
			<div class="icon">
				<img src="{{asset('accolades-img/')}}/{{$ino->image}}" class="img-fluid superpowers-image">
			</div>
			<p class="text-title">{{$ino->title}}</p>
			<p>{!! $ino->description !!}</p>
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
					<p>{!! $mig->description !!}</p>
				</div>
				</div>
			</div>
			</div>
		@endforeach
      @endif
	<!-- <div class="row mt-5 mb-5">
	  <div class="col-lg-4 col-md-4 mb-4">
		<div class="enabling-title-box">
		  <h2>Solidifying security from the start</h2>
		</div>
	  </div>
	  <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
		<div class="enabling-content-box">
		  <div class="arrow-img">
			<img src="assets/img/Home/arrow-button.png" class="img-fluid">
		  </div>
		  <div class="enabling-content">
			<p>The consequences of a security breach can be dire, ranging from massive financial losses to irreparable damage to a company's reputation. By integrating security at every step of the development cycle, DevSecOps teams catch potential threats early and address them swiftly. No more fire-fighting mode when a vulnerability is discovered at the eleventh hour.</p>
		  </div>
		</div>
	  </div>
	</div>
	<div class="row mt-5">
	  <div class="col-lg-4 col-md-4 mb-4">
		<div class="enabling-title-box">
		  <h2>Modern development that is automation compatible</h2>
		</div>
	  </div>
	  <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
		<div class="enabling-content-box">
		  <div class="arrow-img">
			<img src="assets/img/Home/arrow-button.png" class="img-fluid">
		  </div>
		  <div class="enabling-content">
			<p>Gone are the days of manual security checks that slow down the development process. With CI/CD pipelines, automated testing can be seamlessly integrated into the software development cycle to ensure that security is baked into the product from the very start.</p>
		  </div>
		</div>
	  </div>
	</div> -->
  </div>
</section>

<section id="We-deliver-high-impact" class="We-deliver-high-impact">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3 class="w-100">{{$data->content_title}}</h3>
	</div>

	<div class="row">
	<?php $content = json_decode($data->content);?>
      @if(!empty($content) && $content != "")
        @foreach($content as $con)
			<div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
				<div class="icon-box">
				<p class="icon-box-title icon-box-bold">{{$con->title}}</p>
				<p class="text-left">{!! $con->description !!}</p>
				</div>
			</div>
		@endforeach
      @endif
	  <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
		<div class="icon-box">
		  <p class="icon-box-title icon-box-bold">Improvement Planning</p>
		  <p class="text-left">We apply our comprehensive maturity model to determine the current readiness levels of your business processes for upscaling your enterprise. We run CI/CD processes to build automation and start factoring in code quality and built-in security compliance and risk assessment. We also develop the DevSecOps policy definitions that will become the core of our automation. This is followed by integration of vulnerability and issue resolution and selection of tools you need.</p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
		<div class="icon-box">
		  <p class="icon-box-title icon-box-bold">Implementation</p>
		  <p class="text-left">We build and deliver the implementation plan which includes the efforts, cost and time. When you give us the nod, we begin architecture and design on your future state pipeline. We configure various DevSecOps tools for maximum agility, elasticity and security. Once everything is in place, we initiate adoption workshops (Ops/Dev/Sec/Infra) to also help upskill your people for using new Cloud processes.</p>
		</div>
	  </div> -->
	</div>

  </div>
</section>

<section id="our-differentiators" class="our-differentiators">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3>{{$data->double_title}}</h3>
	</div>

	<div class="row">
	<?php $double_value = json_decode($data->double_value);?>
      @if(!empty($double_value) && $double_value != "")
        @foreach($double_value as $db)
		<div class="col-lg-6 col-md-6">
			<div class="our-differentiators-main">
			<div class="our-differentiators-main-img">                
				<img src="{{asset('accolades-img/')}}/{{$db->image1}}" class="img-fluid w-100 our-shape-one shape-one">
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
			  <img src="assets/img/Cloud-Native/The-Intuitive-2.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p><b>Accelerate</b> implementation effortlessly with simplified automated pipelines and microservices</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="assets/img/Cloud-Native/The-Intuitive-3.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p><b>Ace</b> your DevSecOps compliances with automated audits and continuous validation</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="assets/img/Cloud-Native/The-Intuitive-4.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p><b>Access</b> cost-optimized tools with high availability for accessible self-service</p>
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
		  <p class="text-left">Draw workflow templates available as APIs for security scans, thresholds, stage gates and approvals easily</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
		<div class="icon-box">
		  <p class="text-left">Minimal time taken for integration with the customer CI/CD pipeline and changes, if any</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
		<div class="icon-box">
		  <p class="text-left">Access a dashboard to view all vulnerabilities and perform remediation</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
		<div class="icon-box">
		  <p class="text-left">Policy engine enables DevSecOps teams to perform active governance with automated tool configurations monitoring and auto-remediation</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
		<div class="icon-box">
		  <p class="text-left">Meet all regulatory compliance requirements (For e.g. PCI, GDPR, HITRUST) with the policy engine</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
		<div class="icon-box">
		  <p class="text-left">Utilize 350 KPIs and 600 best practices from planning to release</p>
		</div>
	  </div>
	  <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
		<div class="icon-box">
		  <p class="text-left">Reduce security scanning costs by monitoring usage and substituting open-source tooling where possible</p>
		</div>
	  </div> -->
	</div>

  </div>
</section>

<section id="read-about" class="read-about">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3>Read about the latest developments in AppSecOps & DevSecOps</h3>
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
  <div class="container" data-aos="fade-up">

  <div class="row d-flex align-items-center">
	<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
	function savepopupData(){
	var data = new FormData();
	data.append('name', $('#name').val());
	data.append('number', $('#number').val());
	data.append('email', $('#email').val());
	data.append('service','{{$data->slug}}');
	data.append('message', $('#message').val());
	var response = runAjax(SITE_URL +'/service-us', data);
	if(response.status == '200' && response.success == '1'){
		$('#exampleModal').hide();
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else if(response.status == '422'){
		$('.validation-div').text('');
		$.each(response.error, function( index, value ) {
			$('#val-'+index).text(value);
		});
	} else if(response.status == '201'){
		$('.validation-div').text('');
		swal.fire({title: response.message,type: 'error'});
	}else{
		// setTimeout(function(){ location.reload(); }, 2000);
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