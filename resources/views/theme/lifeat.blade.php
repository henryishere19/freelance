@extends('layouts.theme.master')

@section('content')
<main id="main">

	<!-- ======= Main Banner Section ======= -->
	<section id="main-banner" class="main-banner">
		<div class="container-fluid p-0">
			<div class="banner-details">
				<div class="banner-main">
					<div class="banner-img d-none d-md-block">
						@if(isset($data->banner_image) && $data->banner_image != "")
						<img src="{{asset($data->banner_image)}}" class="img-fluid w-100">
						@endif
					</div>
					<div class="banner-img-mobile d-block d-md-none">
						@if(isset($data->mobile_banner) && $data->mobile_banner != "")
						<img src="{{asset($data->mobile_banner)}}" class="img-fluid w-100">
						@endif
					</div>
					<div class="main-banner-content">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 col-md-8">
									<div class="banner-text">
										<h1>{{$data->title}}</h1>
										<p class="mt-4">{!! $data->description !!}</p>
									</div>
								</div>
								<div class="col-lg-6 col-md-4"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= End Main Banner Section ======= -->

	<!-- ======= The Intuitive Life Section ======= -->
	<section id="the-intuitive-life" class="the-intuitive-life">
		<div class="container" data-aos="fade-up">

			<div class="section-title mb-5">
				<h2 class="second-color">{{$data->content_title}}</h2>
			</div>

			<div class="row">
			<?php $content = json_decode($data->content);
			?>
				@foreach($content as $con)
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
					<div class="member">
						<div class="member-img">
							<img src="{{asset('accolades-img')}}/{{$con->image}}" class="img-fluid w-100" alt="">
						</div>
						<div class="member-info mt-4">
							<p class="heading">{{$con->title}}</p>
							<p>{!! $con->description !!}</p>
						</div>
					</div>
				</div>
				@endforeach

			</div>

		</div>
	</section>
	<!-- ======= End The Intuitive Life Section ======= -->

	<!-- ======= Perks To Make Your life Easier Section ======= -->
	<section id="perks-to-make" class="perks-to-make">
		<div class="container" data-aos="fade-up">

			<div class="section-title mb-5">
				<h2 class="second-color">{{$data->imapact_title}}</h2>
			</div>

			<div class="row">
				<?php $impact = json_decode($data->impact);?>
				@foreach($impact as $imp)
					<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
						<div class="icon-box">
							<div class="icon"><img src="{{asset('accolades-img')}}/{{$imp->image}}" /></div>
							<p>{!! $imp->description !!}</p>
						</div>
					</div>
				@endforeach
			</div>

		</div>
	</section>
	<!-- End Perks To Make Your life Easier Section -->

	<!-- ======= Work + Play Section ======= -->
	<section id="work-play" class="work-play">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2 class="second-color">{{$slider->title}} </h2>
			</div>
			<div class="wrap">
				<div class="happy-team-slider">
					@foreach($slide as $sli)
					<div class="item">
						<img src="{{asset($sli->image)}}" alt="" class="img-fluid">
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- End Work + Play Section -->

	<!-- ======= Listen To stories Of Our Team Section ======= -->
	<section id="listen-to-stories" class="listen-to-stories">
		<div class="container" data-aos="fade-up">

			<div class="section-title mb-5">
				<h2 class="second-color">{{$slider2->title}}</h2>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="our-team-slider">
						@foreach($slide2 as $sl2)
						<div class="our-team-box">
							<div class="our-team-image">
								<img src="{{asset($sl2->image)}}" alt="" class="img-fluid">
							</div>
							<div class="our-team-content">
								<p>
									“{{$sl2->description}}”
								</p>
								<h4>
									{{$sl2->title}}
								</h4>
							</div>
						</div>
						@endforeach
						<!-- <div class="our-team-box">
							<div class="our-team-image">
								<img src="image/our-team-icon.png" alt="" class="img-fluid">
							</div>
							<div class="our-team-content">
								<p>
									"I joined Intuitive in October 2020 having known some of the Intuitive team over
									the previous years. Since joining,
									I have found an organization that excels in putting people in a position where
									they can grow and mature within their skills, roles and responsibilities. Just
									completing my two-year anniversary and I am already looking forward to the next
									two years and the two years after that"
								</p>
								<h4>
									David Foster, Sales Leader, New York
								</h4>
							</div>
						</div>
						<div class="our-team-box">
							<div class="our-team-image">
								<img src="image/our-team-icon.png" alt="" class="img-fluid">
							</div>
							<div class="our-team-content">
								<p>
									“I have been working at Intuitive for a little over a year and a half. The
									company is sound, well run and the people are first rate. I would recommend
									Intuitive as an employer to anyone looking to further their career in
									Information Technology.”
								</p>
								<h4>
									Arthur Bell, Sr Linux Engineer,
									North Carolina
								</h4>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Listen To stories Of Our Team Section -->

	<!-- ======= Miss Our latest Section ======= -->
	<section id="what-to-do" class="what-to-do">
		<div class="container">
			<div class="row set-position">
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
					<h2>Want to do meaningful work
						that solves everyday problems?</h2>
					<a href="" class="">View Open Positions Now!</a>
				</div>
				<div class="col-lg-4 content d-flex flex-column justify-content-end" data-aos="fade-right"
					data-aos-delay="100">
				</div>
			</div>
		</div>
	</section>
	<!-- End Miss Our latest Section -->

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