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
					<img src="{{asset($data->banner_image)}}" class="img-banner_image w-100">
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
									<p class="mt-4">{!! $data->description !!}
									</p>
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
       <!-- ======= Run Your Section ======= -->
       <section id="run-your" class="run-your">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 content d-flex flex-column justify-content-center mb-4"
                        data-aos="fade-up">
                        {!! $data->maincontentdescription !!}
                    </div>
                    <div class="col-lg-6 col-md-6 text-center run-your-img">
                        <img src="{{asset(  $data->content_image)}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= End Run Your Section ======= -->

        <!-- ======= Migration Innovations Section ======= -->
        <section class="migration-innovations" id="migration-innovations">
            <div class="container">
                <div class="section-title mb-lg-5">
                    <h2>{{$data->content_title}}</h2>
                </div>
                <div class="row mt-5">
                <?php $content = json_decode($data->content); $x=1;?>
					@if(!empty($content) && $content != "")
						@foreach($content as $con)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="migration-innovations-main">
                                    <div class="migration-innovations-img">
                                        <img src="{{asset('accolades-img')}}/{{$con->image}}" class="img-fluid">
                                    </div>
                                    <div class="migration-innovations-content">
                                        <h3>{{$con->title}}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif    
                </div>
            </div>
        </section>
        <!-- ======= End Migration Innovations Section ======= -->

        <!-- ======= Cloud Migration Section ======= -->
        <section class="cloud-migration" id="cloud-migration">
            <div class="container">
                <div class="section-title mb-lg-5">
                    <h2>{{$data->title_migration}}</h2>
                </div>
                <div class="row mt-5">
                <?php $migration = json_decode($data->migration); $x=1;?>
					@if(!empty($migration) && $migration != "")
						@foreach($migration as $mig)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="cloud-migration-main">
                                    <div class="cloud-migration-main-content">
                                        <h3>{{$mig->title}}</h3>
                                        <p>{{$mig->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif  
                </div>
            </div>
        </section>
        <!-- ======= End Cloud Migration Section ======= -->

        <!-- ======= High-Impact Section ======= -->
        <!-- ======= End High-Impact Section ======= -->

        <!-- ======= DevSecOps Section ======= -->
        <section id="unlock-value" class="unlock-value">
            <div class="container" data-aos="fade-up">

                <div class="section-title mb-lg-5">
                    <h2>The Intuitive DataOps and ML Impact</h2>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-6 col-md-6 d-flex align-items-center mb-4" data-aos="zoom-in">
                        <div class="icon-box">
                            <div class="icon"><img src="image/ML-Impact-1.gif" /></div>
                            <p>Enjoy maximum future-proof compatibility across your cloud infrastructure and tools as we are accredited industry-wide.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-center mb-4" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><img src="image/ML-Impact-2.gif" /></div>
                            <p>Deploy at record speed with support from our extensive team of professionals and streamlined transformation processes.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-center mb-4" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><img src="image/ML-Impact-3.gif" /></div>
                            <p>Process large amounts of real-time data, transform and publish across your enterprise in a secure scalable self-service environment.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-center mb-4" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><img src="image/ML-Impact-4.gif" /></div>
                            <p>Utilize data orchestration and real-time analytics via automated pipelines without disrupting services for your internal users or external customers.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End DevSecOps Section -->

        

        <!-- ======= Read About Section ======= -->
        @if(count($casestudy) > 0)
        <section id="read-about" class="read-about">
            <div class="container">
                <div class="section-title mb-lg-5">
                    <h2>Read about the latest developments <br> in Intuitive DevSecOps</h2>
                </div>
                <div class="row mt-5">
                    @foreach($casestudy as $case)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="read-about-main">
                            <div class="read-about-img">
                                <img src="{{asset($case->image)}}" class="img-fluid w-100">
                            </div>
                            <div class="read-about-content">
                                <p>{{$case->title}}</p>
                                <a href="{{$case->link}}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-4 col-md-6 mb-4">
                        <div class="read-about-main">
                            <div class="read-about-img">
                                <img src="image/read-about-img.png" class="img-fluid w-100">
                            </div>
                            <div class="read-about-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="read-about-main">
                            <div class="read-about-img">
                                <img src="image/read-about-img.png" class="img-fluid w-100">
                            </div>
                            <div class="read-about-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                <a href="#">Download</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        @endif
        <!-- ======= End Read About Section ======= -->

        <!-- ======= Trusted Partners Section ======= -->
        <!-- End Trusted Partners Section -->

        <!-- ======= Miss Our latest Section ======= -->
        <section id="what-to-do" class="what-to-do">
            <div class="container">
                <div class="row set-position">
                    <div class="col-lg-8">
                        <h2>Want to know more? Fill in your queries and we will get back to you.</h2>
                        <a href="https://www.intuitive.cloud/contact-us" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">Get in touch now</a>
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