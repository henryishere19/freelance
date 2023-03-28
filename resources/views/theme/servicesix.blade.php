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
                      <!-- <img src="assets/img/Home/Slidr-Cloud-Infrastructure.png" class="img-fluid"> -->
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

    <section id="achieve-greater" class="achieve-greater">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 col-md-6 achieve-greater-heading">
			@if(isset($data->content_title_main) && $data->content_title_main != "")
				<h4>{{$data->content_title_main}}</h4>
			@endif
          </div>
          <div class="col-lg-6 col-md-6 achieve-greater-content">
		  @if(isset($data->maincontentdescription) && $data->maincontentdescription != "")
				<h4>{!! $data->maincontentdescription !!}</h4>
			@endif
           </div>
        </div>
      </div>
    </section>

    <section class="enabling" class="enabling">
      <div class="container">
        <div class="section-title">
          <h3 class="w-100">{{$data->content_title}}</h3>
        </div>
		<?php $contant = json_decode($data->content);?>
		@if(!empty($contant) && $contant != "")
		@foreach($contant as $con)
        <div class="row mt-5 mb-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>{{$con->title}}</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="{{url('assets/img/Home/arrow-button.png')}}" class="img-fluid">
              </div>
              <div class="enabling-content">
			  <p>{!! $con->description !!}</p>
              </div>
            </div>
          </div>
        </div>
		@endforeach
		@endif
        <!-- <div class="row mt-5 mb-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>Ability to get rid of most or all hardware and software</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>Say goodbye to server maintenance, network switches, and backup generators, and hello to a streamlined infrastructure that is managed by your cloud provider. Not only does this help reduce costs, but it also frees up your IT team to focus on more critical tasks.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>Quick application deployment</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>Rapidly deploy applications to meet the ever-changing needs of your business. No longer do you need to wait for additional hardware or for IT staff to set up servers. With a range of services that support different cloud infrastructure technologies, you can easily and quickly choose the one that meets your needs.</p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <section id="we-deliver" class="we-deliver">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3 class="w-100">@if(isset($data->title_migration)){{$data->title_migration}}@endif</h3>
        </div>
        <div class="row d-flex justify-content-center">
          <?php $migration = json_decode($data->migration);?>
          @if($migration)
            @foreach($migration as $mig)
              <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                  <p class="icon-box-title">{{$mig->title}}</p>
                  <p class="text-left">{{$mig->description}}</p>
                </div>
              </div>
              @endforeach
          @endif
          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <p class="icon-box-title">Landing Zone Setup for Security, Governance and Control</p>
              <p class="text-left">Easily navigate the complex landscape of regulatory compliance and security with necessary tools and guidance to build a secure, compliant and efficient infrastructure.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <p class="icon-box-title">Enterprise DR Design and Implementation</p>
              <p class="text-left">Highly skilled architects with extensive experience in DR design and implementation work together to help organizations minimize downtime and recover quickly and without interruption.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <p class="icon-box-title">Well Architected Review</p>
              <p class="text-left">Our team of experts work with you to review your existing architecture, identify any areas of improvement, and provide recommendations on how to optimize your architecture for better performance, scalability, and cost efficiency.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon-box">
              <p class="icon-box-title">Cloud Operations</p>
              <p class="text-left">We provide organizations with a safe and efficient method to operate in the cloud, thus allowing organizations to restructure their business, upgrade and transfer their applications, and drive innovation.</p>
            </div>
          </div> -->
        </div>

      </div>
    </section>

    <section id="our-differentiators" class="our-differentiators">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3 class="w-100">@if(isset($data->double_title)){{$data->double_title}}@endif</h3>
        </div>

        <div class="row">
        <?php $double = json_decode($data->double_value);?>
          @if($double)
          @foreach($double as $dov)
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('accolades-img/')}}/{{$dov->image1}}" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>{{$dov->description}}</p>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          <!-- <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="assets/img/cloud-security/info-icon-2.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>Wide range of services from system analysis, data protection, data backup, data recovery to database management</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="assets/img/cloud-security/info-icon-3.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>12+ years of experience in providing solutions to the public sector, private enterprises and government agencies</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="assets/img/cloud-security/info-icon-4.svg" class="img-fluid w-100 our-shape-one shape-one our-differentiators">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>Solutions designed to help organizations with regulatory compliance, cybersecurity, governance and risk management</p>
              </div>
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
    <!-- <section id="Clients" class="Clients">
      <div class="container" data-aos="fade-up">
        <div class="section-title mb-4 text-center">
          <h2 class="black-text">We’re the trusted partners for Fortune 500 enterprises</h2>
        </div>
        <div class="Clients-slider">

          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-1.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-2.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-3.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-4.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-5.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-6.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-7.png" class="img-fluid">
          </div>
          <div class="icon-box">
            <img src="assets/img/Home/Collaborate-8.png" class="img-fluid">
          </div>
        </div>
      </div>
    </section> -->

    <section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
      <div class="container">

      <div class="row">
        <div class="col-lg-12 col-md-12 content">
          <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
            <div class=" d-flex align-items-center believe-button mt-5">
              <img src="{{url('assets/img/Home/arrow-button.png')}}" class="img-fluid">
              <!-- <a href="#" class="button">Fill Queries</a> -->
              <a href="https://www.intuitive.cloud/contact-us" class="button">Get in touch today</a>
            </div>
            </div>
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