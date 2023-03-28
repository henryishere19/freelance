@extends('layouts.theme.master')

@section('content')
<main id="main">

<!-- ======= Main Banner Section ======= -->
<section id="main-banner" class="main-banner">
	<div class="container-fluid p-0">
		<div class="banner-details">
			<div class="banner-main">
				@foreach($slide as $sli)
				<div class="banner-img">
					@if(isset($sli->image) && $sli->image != "")
					<img src="{{asset($sli->image)}}" class="img-fluid w-100">
					@else
					<!-- <img src="image/Mobile-Banner.jpg" class="img-fluid w-100"> -->
					@endif
				</div>
				<div class="banner-img-mobile">
					@if(isset($sli->mobie_image) && $sli->mobie_image != "")
					<img src="{{asset($sli->mobie_image)}}" class="img-fluid w-100">
					@else
					<!-- <img src="image/Mobile-Banner.jpg" class="img-fluid w-100"> -->
					@endif
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- ======= End Main Banner Section ======= -->

<!-- ======= Latest Blogs Section ======= -->
<section id="blog-page" class="blog-page">
	<div class="container" data-aos="fade-up">

		<div class="section-title mb-lg-5">
			<h2 class="second-color">Latest Blogs</h2>
		</div>

		<div class="row">

			<div class="col-lg-8 col-md-8 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
				<div class="row" id="data-list">
					@foreach($data as $value)
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="{{asset($value->image)}}" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>{{$value->title}}</h4>
								<p class="mb-4">{!! $value->description !!}</p>
								<a href="/blog/{{$value->id}}">Read More</a>
							</div>
						</div>
					</div>
					@endforeach
					<?php echo $data->render(); ?>
					<!-- <div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="image/Blog-Image.png" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>VMware Horizon VDI on AWS</h4>
								<p class="mb-4">Intuitive was approached by a Large Integrated Health Management company to
									solve a security issue.</p>
								<a href="blog-inner-page.html">Read More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="image/Blog-Image.png" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>VMware Horizon VDI on AWS</h4>
								<p class="mb-4">Intuitive was approached by a Large Integrated Health Management company to
									solve a security issue.</p>
								<a href="blog-inner-page.html">Read More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="image/Blog-Image.png" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>VMware Horizon VDI on AWS</h4>
								<p class="mb-4">Intuitive was approached by a Large Integrated Health Management company to
									solve a security issue.</p>
								<a href="blog-inner-page.html">Read More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="image/Blog-Image.png" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>VMware Horizon VDI on AWS</h4>
								<p class="mb-4">Intuitive was approached by a Large Integrated Health Management company to
									solve a security issue.</p>
								<a href="blog-inner-page.html">Read More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="blog-details">
							<div class="blog-image">
								<img src="image/Blog-Image.png" class="img-fluid" />
							</div>
							<div class="blog-content">
								<h4>VMware Horizon VDI on AWS</h4>
								<p class="mb-4">Intuitive was approached by a Large Integrated Health Management company to
									solve a security issue.</p>
								<a href="blog-inner-page.html">Read More</a>
							</div>
						</div>
					</div> -->
				</div>
			</div>

			<div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
				<div class="section-title category-box mb-5">
					<h2 class="second-color category">Category</h2>
					<ul>
						@foreach($category as $cat)
						<li onClick="categopost({{$cat->id}})"><a href="javascript:void(0)" alt=""> {{$cat->title}}</a></li>
						@endforeach
						<!-- <li><a href="" alt="" class="active"> Lorem Ipsum <img src="image/left-chevron-icon.png" class="img-fluid"/></a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li>
						<li><a href="" alt=""> Lorem Ipsum</a></li> -->
					</ul>
				</div>
				<div class="section-title popular-blog mb-5">
					<h2 class="second-color mb-3">Popular blogs</h2>
					@foreach($popularpost as $post)
					<a href="/blog/{{$post->id}}">
						<div class="popular-blog-detail mb-3">
							<div class="d-flex align-items-stretch">
								<img src="{{asset($post->image)}}" style=" height: 100px;width: 100px;"/>
								<p>{{$post->title}}</p>
							</div>
						</div>
					</a>
					@endforeach
					<!-- <div class="popular-blog-detail mb-3">
						<div class="d-flex align-items-stretch">
							<img src="image/Blog-Demo-Image.png" />
							<p>Lorem Ipsum is simply dummy text and typesetting</p>
						</div>
					</div>
					<div class="popular-blog-detail mb-3">
						<div class="d-flex align-items-stretch">
							<img src="image/Blog-Demo-Image.png" />
							<p>Lorem Ipsum is simply dummy text and typesetting</p>
						</div>
					</div>
					<div class="popular-blog-detail mb-3">
						<div class="d-flex align-items-stretch">
							<img src="image/Blog-Demo-Image.png" />
							<p>Lorem Ipsum is simply dummy text and typesetting</p>
						</div>
					</div>
					<div class="popular-blog-detail mb-3">
						<div class="d-flex align-items-stretch">
							<img src="image/Blog-Demo-Image.png" />
							<p>Lorem Ipsum is simply dummy text and typesetting</p>
						</div>
					</div> -->
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