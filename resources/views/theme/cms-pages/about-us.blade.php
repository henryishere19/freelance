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
				  <h1>Transforming businesses with “intuitive” solutions that drive results</h1>
				</div>
			  </div>
			  <div class="col-lg-6 col-md-6">
				<div class="banner-img">
				  <img src="{{asset('img/about-us/Main-Banner.png')}}" class="img-fluid">
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

<section id="about-slider" class="about-slider">
  <div class="container">

	<div class="section-title">
	  <h3 class="w-100">The Intuitive.Cloud Journey</h3>
	</div>

	<div class="main-slider d-flex">
		@if(count($years) > 0) 
		@foreach($years as $yr)
			<div class="main-slider-detail">
				<div class="main-slider-content">
				<p>{{$yr->content}}</p>
				</div>
				<div class="d-flex align-items-center justify-content-center main-slider-box">
				<h4 class="first m-0">{{$yr->title}}</h4>
				</div>
			</div>
		@endforeach
	  @endif
	  <!-- <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Built a powerhouse team with 400+ workforce</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="six m-0">2022</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Got featured by INC 500 as one of the Fastest Growing Private Companies in America</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="five m-0">2022</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Recognized by CRN’s Fast Growth 150 List for a second year in a row with #10</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="four m-0">2022</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Recognized on the CRN Fast Growth 150 List</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="third m-0">2021</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Accelerated growth with 200 people team</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="second m-0">2021</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Started Operations in Canada</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="first m-0">2020</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Scaled new heights with a 100+ people practice</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="six m-0">2019</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Led the way in data and AI/ML innovation with the launch of our services</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="five m-0">2019</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Expanded our reach with launch operations in Spain</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="four m-0">2019</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Took a leap of innovation with the incorporation of the Intuitive Innovation Arm</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="third m-0">2018</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Made our mark in Europe with commencement of operations</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="second m-0">2017</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Commencement of our Cybersecurity Division</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="first m-0">2016</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Launched our Public Cloud Offering Division to pave the way for the future of Cloud Computing</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="six m-0">2015</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Launched our SD-WAN, SDN, and Private Cloud Division to revolutionize networking</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="five m-0">2014</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Started a new office in the land of diversity, India</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="four m-0">2014</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Dipped our toes in the Arabian Gulf with an office in Dubai</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="third m-0">2014</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Launched our SDDC Division</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="second m-0">2013</h4>
		</div>
	  </div>
	  <div class="main-slider-detail">
		<div class="main-slider-content">
		  <p>Started operations for Intuitive.Cloud with a small team of 6</p>
		</div>
		<div class="d-flex align-items-center justify-content-center main-slider-box">
		  <h4 class="first m-0">2012</h4>
		</div>
	  </div> -->
	</div>

  </div>
</section>

<section id="our-purpose" class="our-purpose">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3>Our Purpose, Our Passion, Our Mission</h3>
	  <p class="text-left">Our mission at “Intuitive” is to serve and enable our customers, while transforming their use of technology solutions and services, to solve business problems and deliver successful outcomes. We are driven by innovation, compassion, and commitment through a global, highly experienced, and dedicated professional workforce.</p>
	</div>

	<div class="row">
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">               
			  <img src="{{asset('img/about-us/Icon-1.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Providing quality solutions and services</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="{{asset('img/about-us/Icon-2.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Provide competitive edge to customers</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="{{asset('img/about-us/Icon-3.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Be a trusted partner and customer advocate</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="{{asset('img/about-us/Icon-4.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Build a bridge between technology and business</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="{{asset('img/about-us/Icon-5.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Invest in technology innovation</p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-4 col-md-6">
		<div class="our-differentiators-main">
		  <div class="our-differentiators-main-img">                
			  <img src="{{asset('img/about-us/Icon-6.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
			  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 our-shape-two">
		  </div>
		  <div class="our-differentiators-main-content">
			<p>Transparency, equality and inclusion</p>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>

<section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
  <div class="container" data-aos="fade-up">

	<div class="row d-flex align-items-center">
	  <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
		<h2>Our Ambition, Our Dream, Our Vision</h2>
		<p>Founded on a vision of providing innovative and competitive solutions to businesses, “Intuitive” strives to help customers leverage technology to achieve business goals and excel in their core competencies.</p>
		<p>At “Intuitive”, we strive to bring quality services to our clients, with our experienced customer-oriented thinkers, agents, and business partners. Together, we focus on our customers’ needs and provide outstanding service to achieve the best results.</p>
	  </div>
	  <!-- <div class="col-lg-6 col-md-6 content we-believe-that-content" data-aos="fade-right" data-aos-delay="100">
		<img src="assets/img/Home/Ready-to-disrupt.png" class="img-fluid">
	  </div> -->
	</div>

  </div>
</section>

<section id="Leadership" class="Leadership">
  <div class="container">
	<div class="row">
	  <div class="mb-3">
		<h2 class="text-center">The driving force behind Intuitive.Cloud</h2>
	  </div>
	  <div class="col-lg-3 mb-4"></div>
	  @if($leader)
		<div class="col-lg-3 col-md-6 mb-4">
		  <div class="Leadership-main">
			<div class="Leadership-img">
			  <img src="{{asset($leader->image)}}" class="img-fluid w-100">
			</div>
			<div class="Leadership-content d-flex align-items-center justify-content-between">
			  <div class="d-flex align-items-center">
				<div class="errow-image">
				  <img src="assets/img/about-us/errow.png" class="img-fluid" />
				</div>
				<div class="details">
				  <h4>{{$leader->title}}</h4>
				  <p>{{$leader->designation}}</p>
				</div>
			  </div>
			  <div class="social-icon">
				<a href="{{$leader->linkdinlink}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			  </div>
			</div>
		  </div>
		</div>
		@endif
		@if($leader1)
		<div class="col-lg-3 col-md-6 mb-4">
			<div class="Leadership-main">
			  <div class="Leadership-img">
				<img src="{{asset($leader1->image)}}" class="img-fluid w-100">
			  </div>
			  <div class="Leadership-content d-flex align-items-center justify-content-between">
				<div class="d-flex align-items-center">
				  <div class="errow-image">
					<img src="assets/img/about-us/errow.png" class="img-fluid" />
				  </div>
				  <div class="details">
					<h4>{{$leader1->title}}</h4>
					<p>{{$leader1->designation}}</p>
				  </div>
				</div>
				<div class="social-icon">
				  <a href="{{$leader1->linkdinlink}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				</div>
			  </div>
			</div>
		</div>
		@endif
		<div class="col-lg-3 mb-4"></div>
	  </div>
	  
  </div>
</section>

<section id="Leadership" class="Leadership p-0">
	<div class="container">
		<div class="row justify-content-center">
			@if($leader2)
			@foreach($leader2 as $ld)
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="{{asset($ld->image)}}" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>{{$ld->title}}</h4>
								<p>{{$ld->designation}}</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="{{$ld->linkdinlink}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
			<!-- <div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-9.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Troy Wyatt</h4>
								<p>Global Field CTO</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/intuitivedataops/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
			  <div class="Leadership-main">
				<div class="Leadership-img">
					<img src="assets/img/about-us/Leadership-3.png" class="img-fluid w-100">
				</div>
				<div class="Leadership-content d-flex align-items-center justify-content-between">
				  <div class="d-flex align-items-center">
					<div class="errow-image">
					  <img src="assets/img/about-us/errow.png" class="img-fluid" />
					</div>
					<div class="details">
					  <h4>Steve DeMaria</h4>
					  <p>VP, Sales (Global)</p>
					</div>
				  </div>
				  <div class="social-icon">
					<a href="https://www.linkedin.com/in/steven-demaria-605002a/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-4.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Tim Murphy</h4>
								<p>VP, Talent Acquisition</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/tim-murphy-4696092/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-5.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Eric Chicha</h4>
								<p>VP, Sales (EMEA)</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/eric-chicha-535525/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-6.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Kajal Kakka</h4>
								<p>Operations Leader</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/kajal-kakka/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-8.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Divya Krishna</h4>
								<p>Global TAG and HR Leader</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/divya-krishna-t-783074140/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-10.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Shreni Thakkar</h4>
								<p>Sales Leader for Cloud and SDx</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/shrenithakkar/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="Leadership-main">
					<div class="Leadership-img">
						<img src="assets/img/about-us/Leadership-11.png" class="img-fluid w-100">
					</div>
					<div class="Leadership-content d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<div class="errow-image">
								<img src="assets/img/about-us/errow.png" class="img-fluid" />
							</div>
							<div class="details">
								<h4>Swapnil Badkur</h4>
								<p>Head of Program Management</p>
							</div>
						</div>
						<div class="social-icon">
							<a href="https://www.linkedin.com/in/swapnil-b-8496b920/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>

<section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
  <div class="container">

  <div class="row d-flex align-items-center">
	<div class="col-lg-12 col-md-12">
	  <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
	  <div class=" d-flex align-items-center believe-button mt-5">
		<img src="assets/img/Home/arrow-button.png" class="img-fluid">
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
