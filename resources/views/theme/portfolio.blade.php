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
				@foreach($slide as $sli)
					<div class="row d-flex align-items-center">
						<div class="col-lg-6 col-md-6">
							<div class="banner-text">
								<h1> {{$sli->title}}</h1>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="banner-img">
								@if(isset($sli->image) && $sli->image != "")
								<img src="{{asset($sli->image)}}" class="img-fluid w-100">
								@else
								<!-- <img src="image/Mobile-Banner.jpg" class="img-fluid w-100"> -->
								@endif
								<!-- <img src="assets/img/Main-Banner.png" class="img-fluid"> -->
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		</div>
	</div>
	</div>
</section>
	<!-- ======= End Main Banner Section ======= -->
	<section id="run-your-enterprise" class="run-your-enterprise">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 col-md-6 run-your-enterprise-heading">
            <h4>When it comes to startups and building tech companies, there is no fast track to success.</h4>
          </div>
          <div class="col-lg-5 col-md-6 run-your-enterprise-content">
            <p>At Intuitive.Cloud, we are allies to our innovation portfolio companies in their journey. We provide significant support to first-time founders and help them navigate many challenges that they might face while translating their ideas into successful businesses. </p>
            <p>At the same time, we leverage our partnership with leading technology companies to transform and create massive impact at scale.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="innovation-portfolio" class="innovation-portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>@if(isset($portfolio->title) && $portfolio->title != ""){{$portfolio->title}}@endif</h3>
        </div>

        <div class="row mb-5">
          <h4 class="mb-4">{{$portfolio->description}}</h4>
          @if($portfolio_detail2)
          @foreach($portfolio_detail as $pro)
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="{{asset('/portfolio-img/')}}/{{$pro->image}}" class="img-fluid">
                  <p>{{$pro->description}}</p>
                  <a href="@if(isset($pro->title) && $pro->title != ""){{$pro->title}}@endif" target="_blank"></a>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif

          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-1.png" class="img-fluid">
                  <p>MLOps & Model Development Factory</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-2.png" class="img-fluid">
                  <p>World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <div class="row mb-5">
          <h4 class="mb-4">@if(isset($portfolio2->title) && $portfolio2->title != ""){{$portfolio2->title}}@endif</h4>
          @if($portfolio_detail2)
          @foreach($portfolio_detail2 as $pro1)
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="{{asset('/portfolio-img/')}}/{{$pro1->image}}" class="img-fluid">
                  <p>{{$pro1->description}}</p>
                  <p><b>Founder's Vision</b></p>
                  <a href="@if(isset($pro1->title) && $pro1->title != ""){{$pro1->title}}@endif" target="_blank"></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-4.png" class="img-fluid">
                  <p>Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-5.png" class="img-fluid">
                  <p>AppSecOps Platform</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-6.png" class="img-fluid">
                  <p>AllOps & DevSecOps-as-a-Service Platform</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-7.png" class="img-fluid">
                  <p>Enterprise Risk Management (Cyber, Infra, App Data, Privacy)</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="600">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-8.png" class="img-fluid">
                  <p>AppDev & DevSecOps Code Compliance Platform</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="700">
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="assets/img/Portfolio/icon-9.png" class="img-fluid">
                  <p>Identity-first cloud infrastructure security platform with an easy-to-deploy SaaS solution</p>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <div class="row mb-5">
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mt-5 mb-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="portfolio-title">
              <h4>@if(isset($portfolio3->title) && $portfolio3->title != ""){{$portfolio3->title}}@endif</h4>
            </div>
            @if($portfolio_detail3 )
            @foreach($portfolio_detail3 as $pro3)
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="{{asset('/portfolio-img/')}}/{{$pro3->image}}" class="img-fluid">
                  <p>{{$pro3->description}}</p>
                  <a href="@if(isset($pro3->title) && $pro3->title != ""){{$pro3->title}}@endif" target="_blank"></a>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mt-5 mb-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="portfolio-title">
              <h4>{{$portfolio4->title}}</h4>
            </div>
            @if($portfolio_detail4 )
            @foreach($portfolio_detail4 as $pro4)
            <div class="icon-box">
              <div class="inner-box">
                <div class="icon">
                  <img src="{{asset('/portfolio-img/')}}/{{$pro4->image}}" class="img-fluid">
                  <p>{{$pro4->description}}</p>
                  <a href="@if(isset($pro4->title) && $pro4->title != ""){{$pro4->title}}@endif" target="_blank"></a>
                  <p><b>Founder's Vision</b></p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>

      </div>
    </section>

    <section id="invest-and-partner" class="invest-and-partner">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-1"></div>
          <div class="col-lg-10 col-md-12" data-aos="fade-right" data-aos-delay="100">
            <p>We invest and partner with some of the world’s best startups and leading technology companies, in the DevSecOps, Data & AI and Cloud Security space.</p>
            <p class="mt-5"><b>Work with us</b> to gain valuable exposure to these bleeding edge technologies throughout various stages of their evolution and gain real world experience in driving customer adoption and implementation at scale.</p>
          </div>
          <div class="col-lg-1"></div>
        </div>
      </div>
    </section>
	<!-- End Miss Our latest Section -->

  <section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
      <div class="container">

      <div class="row d-flex align-items-center">
        <div class="col-lg-12 col-md-12">
          <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
          <div class=" d-flex align-items-center believe-button mt-5">
            <img src="assets/img/Home/arrow-button.png" class="img-fluid">
            <a href="https://www.intuitive.cloud/contact-us" class="button">Get in touch today</a></div>
          </div>
          <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center we-believe-that-content aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
            <!-- <img src="assets/img/Home/Ready-to-disrupt.png" class="img-fluid"> -->
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