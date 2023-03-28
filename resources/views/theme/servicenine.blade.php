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
    <section id="We-deliver-high-impact" class="We-deliver-high-impact">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h3 class="w-100">{{$data->content_title}}</h3>
        </div>
       
        <div class="row">
        <?php $content = json_decode($data->content);?>
          @if(!empty($content) && $content != "")
          @foreach($content as $mig)
          <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <p class="icon-box-title icon-box-bold">{{$mig->title}}</p>
              <p class="text-left">{!! $mig->description !!}</p>
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