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
                <p> {{$sli->description}}</p>
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
    <section id="press-release" class="press-release">
      <div class="container" data-aos="fade-up">
        <div class="row">
		@if($pressrelease)
			@foreach($pressrelease as $pe)
				<div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4 press-release-main-box" data-aos="zoom-in" data-aos-delay="100">
					<div class="press-release-box d-flex align-items-center justify-content-center">
					<a href="{{$pe->link}}" target="_blank">
						<h2>{{$pe->title}}</h2>
						<img src="{{asset($pe->image)}}" class="img-fluid">
					</a>
					</div>
				</div>
			@endforeach
		@endif
          <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.crn.com/news/channel-programs/2022-fast-growth-150-the-top-25-solution-providers/17?itc=refresh" target="_blank">
                <img src="assets/img/press-release/Logo-2.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.inc.com/profile/intuitive-technology-partners" target="_blank">
                <img src="assets/img/press-release/Logo-3.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.businesswire.com/news/home/20221011005367/en/Safe-Security-and-Intuitive.Cloud-Announce-a-Partnership-to-Offer-a-New-Cyber-Risk-Quantification-Offering" target="_blank">
                <img src="assets/img/press-release/Logo-4.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.crn.com/rankings-and-lists/fast-growth-2021-details.htm?c=20" target="_blank">
                <img src="assets/img/press-release/Logo-5.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.linkedin.com/feed/update/urn:li:activity:7004229130787393536" target="_blank">
                <img src="assets/img/press-release/Logo-6.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.prnewswire.com/news-releases/devrev-intuitive-team-to-advance-customer-centricity-301708823.html" target="_blank">
                <img src="assets/img/press-release/Logo-7.png" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.endorlabs.com/blog/endor-labs-and-intuitive-partner-to-help-enterprises-leverage-open-source-software-most-securely-and-effectively?utm_content=233317202&utm_medium=social&utm_source=linkedin&hss_channel=lcp-74949406" target="_blank">
                <img src="assets/img/press-release/Logo-8.jpg" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="press-release-box d-flex align-items-center justify-content-center">
              <a href="https://www.linkedin.com/feed/update/urn:li:activity:7004229130787393536" target="_blank">
                <img src="assets/img/press-release/Logo-9.jpg" class="img-fluid">
              </a>
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