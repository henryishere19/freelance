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

    <section id="run-your-enterprise" class="run-your-enterprise">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-4 run-your-enterprise-heading">
          @if(isset($data->content_title_main) && $data->content_title_main != "")
            <h4 class="fin-ops">{{$data->content_title_main}}</h4>
          @endif        
          </div>            
          <div class="col-lg-7 run-your-enterprise-content">
          @if(isset($data->maincontentdescription) && $data->maincontentdescription != "")
				<p>{!! $data->maincontentdescription !!}</p>
			@endif
          </div>
        </div>
      </div>
    </section>

    <section id="devsecOps-innovations" class="devsecOps-innovations">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3 class="w-100">{{$data->innovation_title}}</h3>
        </div>

        <div class="row">
        <?php $innovation = json_decode($data->innovation); $x=1;?>
					@if(!empty($innovation) && $innovation != "")
						@foreach($innovation as $ino)
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <p class="text-title">{{$ino->title}}</p>
              {!! $ino->description !!}
            </div>
          </div>
          @endforeach
           @endif  
          <!-- <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <p class="text-title">Cost Optimization & Consulting</p>
              <ul>
                <li>Commitment Management</li>
                <li>Implement Cost Allocation</li>
                <li>Data Analytics and Forecasting</li>
                <li>Cost Anomaly Detection</li>
                <li>Remediation</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <p class="text-title">FinOps Culture</p>
              <ul>
                <li>Vocabulary Alignment</li>
                <li>FinOps Adoption</li>
                <li>Collaboration</li>
                <li>Accountability</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <p class="text-title">FinOps Managed Services</p>
              <ul>
                <li>Commitment Management</li>
                <li>Customized Reporting</li>
                <li>Proactive Monitoring and Alerting Managed Optimization</li>
                <li>Elastic Engineering Services</li>
              </ul>
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
        <?php $migration = json_decode($data->migration); $x=1;?>
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
              <h2>Be set for the long run</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>We are dedicated to assisting your organization in implementing a successful FinOps practice. Our first step will be to evaluate your current position and collaborate with you to develop a customized roadmap fostering FinOps culture that is suitable for your company. Our ultimate objective is to empower you to operate independently and achieve success on your own terms.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="enabling-title-box">
              <h2>Flexible managed services</h2>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 mb-4 gradiant-border">
            <div class="enabling-content-box">
              <div class="arrow-img">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
              </div>
              <div class="enabling-content">
                <p>We can step in and take in-charge any FinOps capability for instance, commitment-based discount management, real-time reporting or anomaly detection. We also provide on-demand access to our experts to help you fine-tune your FinOps journey. By entrusting us, you can focus on growing your business.</p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
      <div class="container">

      <div class="row">
        <div class="col-lg-12 col-md-12 content">
          <h2>Ready to Partner with Intuitive to Deliver Excellence?</h2>
            <div class=" d-flex align-items-center believe-button mt-5">
              <img src="{{url('assets/img/Home/arrow-button.png')}}" class="img-fluid">
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