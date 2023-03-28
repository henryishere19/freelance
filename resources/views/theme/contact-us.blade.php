@extends('layouts.theme.master')

@section('content')
<main>
    	
	<!-- ======= Main Banner Section ======= -->
	<section id="main-banner" class="main-banner">
		<div class="container-fluid p-0">
			<div class="banner-details">
				<div class="banner-main">
					<div class="banner-img d-none d-md-block">
						<img src="image/contact-main-banners.png" class="img-fluid w-100">
					</div>
					<div class="banner-img-mobile d-block d-md-none">
						<img src="image/contact-mobile-banner.png" class="img-fluid w-100">
					</div>
					<!-- <div class="main-banner-content">
						<div class="container">
							<div class="banner-text">
								<h1>Possibilities are endless. <br class="d-none d-md-block">Discover yours here.
								</h1>
								<p class="mt-4">At Intuitive.Cloud, you’ll have the opportunity to work with
									great<br class="d-none d-md-block">
									people, work on big projects and make a real difference for some of the<br
										class="d-none d-md-block">
									leading brands.</p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- ======= End Main Banner Section ======= -->

	<!-- ======= Contact Info Section ======= -->
	<section class="contact-info" id="contact-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center mb-4">
					<div class="address-info mb-5">
						<div class="map-icon">
							<img src="image/map-icon.png" class="img-fluid">
						</div>
						<div class="address">
							<p>
								<b>Corporate Headquarters:</b><br>
								INTUITIVE TECHNOLOGY PARTNERS INC.<br>
								33 Wood Ave. S, STE 600<br>
								Iselin, NJ, 08830-2717, USA
							</p>
						</div>
					</div>
					<div class="address-info">
						<div class="map-icon">
							<img src="image/map-icon.png" class="img-fluid">
						</div>
						<div class="address">
							<p>
								<b>Regional Offices:</b><br>
								Austin, Texas<br>
								Toronto, Canada<br>
								Madrid, Spain<br>
								Bengaluru, India<br>
								Dubai, UAE
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="responsive-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3030.939783624318!2d-74.328824!3d40.565007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b66219855555%3A0x209a3660c39687f9!2s33%20S%20Wood%20Ave%20Suite%20600%2C%20Iselin%2C%20NJ%2008830%2C%20USA!5e0!3m2!1sen!2sin!4v1668753395780!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center mb-4">
					<div class="contact-info">
						<div class="call-icon">
							<img src="image/cal-icon.png" class="img-fluid">
						</div>
						<div class="contact">
							<p>
								<b>Contact Us:</b><br>
								<a href="mailto:support@intuitive.cloud">Technical Support: support@intuitive.cloud</a><br>
								<a href="mailto:info@intuitive.cloud">General Information: info@intuitive.cloud</a><br>
								<a href="mailto:sales@intuitive.cloud">Sales: sales@intuitive.cloud</a><br>
								<a href="mailto:hr@intuitive.cloud">Careers/Job Inquiry: hr@intuitive.cloud</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="contact-us-form">
						<form id="contact-us-form" method="post">
						@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
							<div class="form-headinig mb-4 text-center">
								<h2>Request a dasCallback</h2>
							</div>
							<div class="mb-4">
								<input type="text" name="name" id="name" placeholder="Name" class="form-control">
							</div>
							<div class="mb-4">
								<input type="text" name="number" id="number" placeholder="Phone Number" class="form-control">
							</div>
							<div class="mb-4">
								<input type="email" name="email" id="email" placeholder="Email" class="form-control">
							</div>
							<div class="mb-4">
								<textarea rows="4" cols="50" name="message" id="message" placeholder="Message" class="form-control"></textarea>
							</div>
							<div class="submit-button mb-4">
								<button>Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Contact Info Section ======= -->

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