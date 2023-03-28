@extends('layouts.theme.master')

@section('content')

<main id="main">

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
	<div class="slider stick-dots">

	  <div class="slide d-flex align-items-center">
		<div class="row d-flex align-items-center">
		  <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
		  	<h2 class="animated" data-animation-in="fadeInUp">Your own Wide Area <br class="d-none d-md-block">Network, in-house</h2>
			<p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">Scale your cloud to thousands of secure endpoints. Maximize <br class="d-none d-md-block">value through sustainable networks.</p>
		 </div>
		  <div class="col-lg-5 col-md-6 col-6 slider-image">
				<img src="{{asset('img/Hybrid-Cloud/Streamline-Your-IT-Operations-with-Our-Scalable-SDDC-Services.png')}}" class="img-fluid w-100 d-block" />
		  </div>
		</div>
	  </div>

	  <div class="slide d-flex align-items-center">
		<div class="row d-flex align-items-center">
		  <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
			<h2 class="animated" data-animation-in="fadeInUp">Streamline your IT operations with our scalable SDDC services</h2>
			<p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">Say goodbye to the complexities of traditional data center management and hello to an agile, cost-effective, and efficient IT environment.</p>
		  </div>
		  <div class="col-lg-5 col-md-6 col-6 slider-image">
			<img src="{{asset('img/Hybrid-Cloud/Streamline-Your-IT-Operations-with-Our-Scalable-SDDC-Services.png')}}" class="img-fluid d-block" />
		  </div>
		</div>
	  </div>

	  <div class="slide d-flex align-items-center">
		<div class="row d-flex align-items-center">
		  <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
			<h2 class="animated" data-animation-in="fadeInUp">Unlock the power of your network with SDN innovation</h2>
			<p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">Optimize your network to meet the evolving demands of your business and customers.</p>
		  </div>
		  <div class="col-lg-5 col-md-6 col-6 slider-image">
			<img src="{{asset('img/Hybrid-Cloud/Unlock-the-Power-of-Your-Network-with-SDN-Innovation.png')}}" class="img-fluid d-block" />
		  </div>
		</div>
	  </div>

	</div>
  </div>
</section>
<!-- ======= End Hero Section ======= -->

<section id="real-time" class="real-time">
  <div class="container">
	<div class="row d-flex align-items-center">
	  <div class="col-lg-5 real-time-heading">
		@if(isset($data->content_title_main) && $data->content_title_main != "")
			<h1>{{$data->content_title_main}}</h1>
		@endif
	  </div>            
	  <div class="col-lg-7 real-time-content">
			@if(isset($data->maincontentdescription) && $data->maincontentdescription != "")
				<h4>{!! $data->maincontentdescription !!}</h4>
			@endif
	  </div>
	  </div>
	</div>
  </div>
</section>

<section id="hybrid-cloud" class="hybrid-cloud">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3 class="w-100">{{$data->content_title}}</h3>
	</div>

	<div class="row">
	<?php $content = json_decode($data->content);?>
      @if(!empty($content) && $content != "")
		@foreach($content as $ino)
			<div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
				<div class="icon-box">
				<div class="icon">
					<img src="{{asset('accolades-img/')}}/{{$ino->image}}" class="img-fluid DevSecOps-innovations superpowers-image">
				</div>
				<p class="text-title">{{$ino->title}}</p>
				<p>{!! $ino->description !!}</p>
				</div>
			</div>
	  	@endforeach
      @endif
	  <!-- <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-2.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Software Defined Networks using NSX-T</p>
		  <p><b>Accelerate the deployment and delivery of your applications economically while improving agility and flexibility</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-3.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Infrastructure Services (Data Center Virtualization)</p>
		  <p><b>Access a simulated, cloud and collocated virtual/cloud data center</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-4.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Storage Consulting</p>
		  <p><b>Create a software defined storage unit using vSAN for your business</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-5.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Global Deployment</p>
		  <p><b>Take your business international with resource availability across 70+ countries</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="600">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-6.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Managed Services</p>
		  <p><b>Make your business agile and consistent in an economic and strategic way</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="700">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-7.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Cloud Advisory Services</p>
		  <p><b>Enhance your business by developing a roadmap that is customized according to your work and infrastructure</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="800">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-8.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Cloud Migration Services</p>
		  <p><b>Accelerate your journey to cloud to maximize performance</b></p>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="900">
		<div class="icon-box">
		  <div class="icon">
			<img src="assets/img/Hybrid-Cloud/SDDC-9.svg" class="img-fluid DevSecOps-innovations superpowers-image">
		  </div>
		  <p class="text-title">Cloud Managed Services</p>
		  <p><b>Control your monitoring and reporting requirements, test performance, and handle backup and recovery</b></p>
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
			  <img src="assets/img/Hybrid-Cloud/the-Intuitive-2.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Trained professionals delivering SDN, SD-WAN and SDDC specific consulting and technology solutions</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="assets/img/Hybrid-Cloud/the-Intuitive-3.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Instant troubleshooting in case of interruptions to minimize disruption to business</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="assets/img/Hybrid-Cloud/the-Intuitive-4.svg" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>360-degree responsibility of your entire IT operations</p>
		  </div>
		</div>
	  </div> -->
	</div>
  </div>
</section>

<section id="data-engineering" class="data-engineering">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3 class="w-100">{{$data->title_migration}}</h3>
	</div>

	<div class="row">
	<?php $migration = json_decode($data->migration);?>
      @if(!empty($migration) && $migration != "")
        @foreach($migration as $mig)
			<div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
				<div class="icon-box">
				<!-- <div class="icon">
					<img src="assets/img/Hybrid-Cloud/SD-WAN-1.png" class="img-fluid DevSecOps-innovations">
				</div> -->
				<p class="text-title">{{$mig->title}}</p>
				<p>{!! $mig->description !!}</p>
				</div>
			</div>
	  	@endforeach
      @endif
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
		<!-- <img src="assets/img/Home/Ready-to-disrupt.png" class="img-fluid"> -->
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
	data.append('service','{{$data->title}}');
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