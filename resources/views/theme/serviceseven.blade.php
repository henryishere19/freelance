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

    <section id="data-engineering" class="data-engineering">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3 class="w-100">{{$data->content_title}}</h3>
        </div>

        <div class="row">
        <?php $contant = json_decode($data->content);?>
          @if(!empty($contant) && $contant != "")
          @foreach($contant as $con)
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                <img src="{{asset('accolades-img/')}}/{{$con->image}}" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">{{$con->title}}</p>
            </div>
          </div>
          @endforeach
		@endif
          <!-- <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-2.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Data Architecture</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-3.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Data as a Service</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-4.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Data Engineering</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-5.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Data Science</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="600">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-6.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Data Supply Chain</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="700">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-7.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Advanced Analytics</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="800">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/data-&-ai-ml/DataOps-Centers-8.svg" class="img-fluid superpowers-image">
              </div>
              <p class="text-title">Cognitive Services</p>
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
                <p>{{$mig->description}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
        <!-- <div class="row mt-5 mb-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>Improve customer experiences</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="{{asset('img/Home/arrow-button.png')}}" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>Businesses can improve customer experiences, foster loyalty, and achieve better outcomes by leveraging customer data to gain insights into purchasing behaviors, automate inventory management, and target their audience more effectively.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>Make more informed business decisions</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>Obtain a comprehensive perspective of your data that can aid you in making informed decisions and identifying the next course of action for your organization.</p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <!-- <section id="our-differentiators" class="our-differentiators">
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
        </div>
      </div>
    </section> -->
    <section id="our-core" class="our-core">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3 class="w-100">{{$data->innovation_title}}</h3>
        </div>
        <div class="row">
          <div class="data-engineering-main">
          <?php $innovation = json_decode($data->innovation);?>
            @foreach($innovation as $ino)
            <div class="main-mobile-text">
              <!-- <h5 class="mobile-text">Data Discovery</h5> -->
              <div class="icon-box">
                <div class="icon">
                  <img src="{{asset('accolades-img/')}}/{{$ino->image}}" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">{{$ino->title}}</p>
                <p>{{$ino->description}}</p>
              </div>
            </div>
            @endforeach
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Orchestration</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-2.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Ideation</p>
                <p>Ideation is the process of creating new ideas to solve problems or create new products/services.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data X Hub</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-3.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Use Case Definition</p>
                <p>A scenario for achieving a specific goal or objective in a business system or process.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Curration</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-4.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Valuation</p>
                <p>Prioritizing use cases involves ranking the most valuable scenarios a product or system improve business value</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Consumption</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-5.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Backlog</p>
                <p>Organize, prioritize, and track the work that needs to be done by the DataOps team to optimize and streamline the entire data lifecycle</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Consumption</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-6.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Blueprint</p>
                <p>Templates for deploying and configuring cloud resources and services.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Orchestration</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-7.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Orchestrate</p>
                <p>Developing, testing, refining a user-friendly and reliable data solution that meets business requirements.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data X Hub</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-8.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Deliver</p>
                <p>Practices to streamline development, testing, deployment, and maintenance of data systems and apps.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Curration</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-9.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Operate</p>
                <p>Managing and optimizing application deployment, monitoring, and maintenance in production.</p>
              </div>
            </div> -->
            <!-- <div class="main-mobile-text"> -->
              <!-- <h5 class="mobile-text">Data Consumption</h5> -->
              <!-- <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/data-&-ai-ml/DataOps-Lifecycle-10.svg" class="img-fluid superpowers-image">
                </div>
                <p class="text-title">Business Value</p>
                <p>Turn <b>raw data</b> into <b>meaningful insights</b> that can inform <b>strategic decision-making</b> and <b>drive business growth</b>.</p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>
    @if(count($casestudy) > 0)
    <section id="read-about" class="read-about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>Read about the latest developments in Intuitive SaaS Migration</h3>
        </div>
        <div class="read-about-slider">
        @foreach($casestudy as $case)
          <div class="read-about-main-box">
            <div class="read-about-content">
              <h4 class="read-about-title mb-3">{{$case->title}}</h4>
              <p class="read-about-info mb-5">{{$case->description}}</p>
              <div class="read-about-img mt-5 mb-3 d-flex align-items-center">
                <img src="{{asset($case->image)}}" class="img-fluid">
                <a href="#" class="requste-button">Download</a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- <div class="read-about-main-box">
            <div class="read-about-content">
              <h4 class="read-about-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="read-about-info mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="read-about-img mt-5 mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Download</a>
              </div>
            </div>
          </div>
          <div class="read-about-main-box">
            <div class="read-about-content">
              <h4 class="read-about-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="read-about-info mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="read-about-img mt-5 mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Download</a>
              </div>
            </div>
          </div>
          <div class="read-about-main-box">
            <div class="read-about-content">
              <h4 class="read-about-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="read-about-info mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="read-about-img mt-5 mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Download</a>
              </div>
            </div>
          </div> -->
        </div>
      </div> 
    </section>
    @endif
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
    <section id="our-differentiators" class="our-differentiators">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>{{$data->double_title}}</h3>
        </div>

        <div class="row d-flex align-items-center">
        <?php $double_value = json_decode($data->double_value);?>
      @if(!empty($double_value) && $double_value != "")
        @foreach($double_value as $mig)
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('accolades-img/')}}/{{$mig->image1}}" class="img-fluid w-100 our-shape-one shape-one">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>{!! $mig->description !!}</p>
              </div>
            </div>
          </div>
          @endforeach
      @endif
          <!-- <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('img/data-&-ai-ml/The-Intuitive-2.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>Deploy at record speed with support from our extensive team of professionals and streamlined transformation processes</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('img/data-&-ai-ml/The-Intuitive-3.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>Process large amounts of real-time data, transform and publish across your enterprise in a secure scalable self-service environment</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="our-differentiators-main">
              <div class="our-differentiators-main-img">                
                  <img src="{{asset('img/data-&-ai-ml/The-Intuitive-4.svg')}}" class="img-fluid w-100 our-shape-one shape-one">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 our-shape-two">
              </div>
              <div class="our-differentiators-main-content">
                <p>Utilize data orchestration and real-time analytics via automated pipelines without disrupting services for your internal users or external customers</p>
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
            @foreach($impact as $imp)
              <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                  <p class="text-left">{{$imp->description}}</p>
                </div>
              </div>
            @endforeach
          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <p class="text-left">Maximize your business success with our expertise, proven frameworks, and strategic partnerships</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <p class="text-left">Full range of cloud services designed to address all the accompanying hurdles and roadblocks, from security and availability to performance, compliance, integration, and visibility</p>
            </div>
          </div> -->
        </div>

      </div>
    </section>
    <section id="read-about" class="read-about">
  <div class="container" data-aos="fade-up">

	<div class="section-title">
	  <h3>Read about the latest developments in DataOps</h3>
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

      <div class="row">
        <div class="col-lg-12 col-md-12 content">
          <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
            <div class=" d-flex align-items-center believe-button mt-5">
              <img src="{{asset('img/Home/arrow-button.png')}}" class="img-fluid">
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