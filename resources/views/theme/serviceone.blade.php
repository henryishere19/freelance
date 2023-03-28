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

				<p>{!! $data->maincontentdescription !!}</p>

			@endif

		</div>

        </div>

      </div>

    </section>



    <section id="cloud-saas" class="cloud-saas">

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

						<img src="{{asset('accolades-img/')}}/{{$ino->image}}" class="img-fluid migration-innovations superpowers-image">

					</div>

					<p>{!! $ino->title !!}</p>

					</div>

				</div>

		  	@endforeach

      	@endif

          <!-- <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-2.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Quick Intune adoption</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-3.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Complete deployment and strategy support</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-4.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Exchange Server Migration as a Service</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-5.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Identity Migration as a Service</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="600">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-6.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Infrastructure server migration like domain controllers, ADFS, etc</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="700">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-7.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Cloud Software as a Service</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="800">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Cloud-SaaS-8.svg" class="img-fluid migration-innovations superpowers-image">

              </div>

              <p>Co-management implementation</p>

            </div>

          </div> -->

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

              <h2>Cost reduction leading to maximum savings</h2>

            </div>

          </div>

          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">

            <div class="enabling-content-box">

              <div class="arrow-img">

                <img src="assets/img/Home/arrow-button.png" class="img-fluid">

              </div>

              <div class="enabling-content">

                <p>By empowering employees with digital workspace, companies can unlock new levels of efficiency and cost savings that were previously not possible. Whether it's through automation, increased collaboration, or better use of technology, the benefits of digital workspace are real and tangible.</p>

              </div>

            </div>

          </div>

        </div>

        <div class="row mt-5">

          <div class="col-lg-4 col-md-4 mb-4">

            <div class="enabling-title-box">

              <h2>Increased employee satisfaction and retention</h2>

            </div>

          </div>

          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">

            <div class="enabling-content-box">

              <div class="arrow-img">

                <img src="assets/img/Home/arrow-button.png" class="img-fluid">

              </div>

              <div class="enabling-content">

                <p>With the rise of remote work, the digital workplace has become a critical aspect of the employee experience. Organizations with digital workplaces have reported a staggering 87% increase in employee retention, which is a testament to the positive impact of digital work environments on employee satisfaction and well-being.</p>

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

						<p class="text-left">{!! $con->description !!}</p>

						</div>

					</div>

		  		@endforeach

      		@endif

          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">

            <div class="icon-box">

              <p class="icon-box-title">Plan</p>

              <p class="text-left">We help you decide on the right solution, and we set the groundwork for migration. We discuss your machine and application dependencies and create migration runbooks. All prerequisites are taken care of.</p>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">

            <div class="icon-box">

              <p class="icon-box-title">Migrate</p>

              <p class="text-left">The process begins with detailed checklist which involves from server installation, security and compliance from on-premises end and Microsoft 365 tenant enrollment to establish a unified work environment and completing the domain verification to start generating user accounts for cloud solutions.</p>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">

            <div class="icon-box">

              <p class="icon-box-title">Manage</p>

              <p class="text-left">After the basics are in place, we implement all security standards, set the scale of your operations, and optimize. Here we start handing over the operations to you and provide debriefs to your team.</p>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">

            <div class="icon-box">

              <p class="icon-box-title">Adopt</p>

              <p class="text-left">To ensure a smooth transition, we conduct enablement sessions for your in-house global administrators and brief your non-technical team members.</p>

            </div>

          </div> -->

        </div>



      </div>

    </section>



    <section id="the-intuitive" class="intuitive-superpowers">

      <div class="container" data-aos="fade-up">



        <div class="section-title">

          <h3 class="w-100">{{$data->imapact_title}}</h3>

        </div>



        <div class="row">

		<?php $impact = json_decode($data->impact);?>

			@if(!empty($impact) && $impact != "")

				@foreach($impact as $imp)

					<div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">

						<div class="icon-box">

						<div class="icon">

							<img src="{{asset('accolades-img/')}}/{{$imp->image}}" class="img-fluid workspace-impact superpowers-image">

						</div>

						<p>{{$imp->description}}</p>

						</div>

					</div>

				@endforeach

			@endif

          <!-- <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Intuitive-Digital-2.svg" class="img-fluid workspace-impact superpowers-image">

              </div>

              <p>Seamless end-to-end migration handled by our team</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Intuitive-Digital-3.svg" class="img-fluid workspace-impact superpowers-image">

              </div>

              <p>End-to-end migration support</p>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">

            <div class="icon-box">

              <div class="icon">

                <img src="assets/img/digital-workspace/Intuitive-Digital-4.svg" class="img-fluid workspace-impact superpowers-image">

              </div>

              <p>All Microsoft recommendation configurations</p>

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

                  <img src="assets/img/digital-workspace/Our-differentiators-2.svg" class="img-fluid w-100 our-shape-one shape-one">

                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">

              </div>

              <div class="our-differentiators-main-content">

                <p>Complementary cloud transformation advisory and design services</p>

              </div>

            </div>

          </div>

          <div class="col-lg-6 col-md-6">

            <div class="our-differentiators-main">

              <div class="our-differentiators-main-img">                

                  <img src="assets/img/digital-workspace/Our-differentiators-3.svg" class="img-fluid w-100 our-shape-one shape-one">

                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">

              </div>

              <div class="our-differentiators-main-content">

                <p>Vulnerability analysis and remediation on your existing Microsoft infrastructure</p>

              </div>

            </div>

          </div>

          <div class="col-lg-6 col-md-6">

            <div class="our-differentiators-main">

              <div class="our-differentiators-main-img">                

                  <img src="assets/img/digital-workspace/Our-differentiators-4.svg" class="img-fluid w-100 our-shape-one shape-one">

                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">

              </div>

              <div class="our-differentiators-main-content">

                <p>Integrated security features and optimal end-to-end configuration</p>

              </div>

            </div>

          </div> -->

        </div>

      </div>

    </section>



    <section id="read-about" class="read-about">

      <div class="container" data-aos="fade-up">



        <div class="section-title">

          <h3>Read about the latest developments in Intuitive SaaS Migration</h3>

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