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



<!-- ======= Latest Blogs Section ======= -->



<section id="blog-page" class="blog-page">

	<div class="container" data-aos="fade-up">

		<div class="section-title">

			<h3>Latest Blogs</h2>

		</div>

		<div class="row">

			<div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

				<div class="row">

					@foreach($data as $value)

					<div class="col-lg-6 col-md-6 mb-4 ">

						<div class="blog-details">

							<div class="blog-image">

								<img src="{{asset($value->image)}}" class="img-fluid" />

							</div>

							<div class="blog-content">

							<p class="date">By {{$value->author}} / @if(isset($value->post_date) && $value->post_date != "") {{ \Carbon\Carbon::createFromTimestamp(strtotime($value->post_date))->format('M d, Y')}}@else {{ \Carbon\Carbon::createFromTimestamp(strtotime($value->created_at))->format('M d, Y')}} @endif</p>

								<h4>{{$value->title}}</h4>

								<p class="mb-4">{{ $value->short_description }}</p>

								<a href="/blog/{{$value->slug}}" class="gradiant-button">Read More</a>

							</div>

						</div>

					</div>

					@endforeach

					<?php echo $data->render(); ?>

				</div>

			</div>

		</div>

	</div>

</section>

<!-- ======= End Latest Blogs Section ======= -->



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

									'<div class="blog-content"><h4>'+ value.title+'</h4><div class="blogdesc"><p class="mb-4">'+ value.description+'</p></div>'+

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