@extends('layouts.theme.master')

@section('content')
<main id="main">

        <!-- ======= Main Banner Section ======= -->
        <section id="main-banner" class="main-banner">
            <div class="container-fluid p-0">
                <div class="banner-details">
                    <div class="banner-main">
                        <div class="banner-img d-none d-md-block">
                            <img src="" class="img-fluid w-100">
                        </div>
                        <div class="banner-img-mobile d-block d-md-none">
                            <img src="" class="img-fluid w-100">
                        </div>
                        <div class="main-banner-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8">
                                        <div class="banner-text">
                                            <h1>asd</h1>
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

        <!-- ======= Read About Section ======= -->
        <section id="Leadership" class="Leadership">
            <div class="container">
                <div class="row">
                    <div class="mb-3">
                        <p>desc</p>
                    </div>
                    <div class="col-lg-3 mb-4"></div>
					@foreach($data as $value)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="Leadership-main">
                            <div class="Leadership-img">
                                <img src="{{$value->image}}" class="img-fluid w-100">
                            </div>
                            <div class="Leadership-content d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="errow-image">
                                        <img src="image/Leadership-errow.png" class="img-fluid" />
                                    </div>
                                    <div class="details">
                                        <h4>{{$value->title}}</h4>
                                        <p>{{$value->description}}</p>
                                    </div>
                                </div>
                                <div class="social-icon">
                                    <a href="{{$value->link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                    
                    <div class="col-lg-3 mb-4"></div>
                </div>
            </div>
        </section>
        <!-- ======= End Read About Section ======= -->

        <!-- ======= Differentiators Section ======= -->
        <section id="Leadership" class="Leadership p-0">
            <div class="container">
                <div class="row">
					@foreach($data as $val)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="Leadership-main">
                            <div class="Leadership-img">
                                <img src="{{$value->image}}" class="img-fluid w-100">
                            </div>
                            <div class="Leadership-content d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="errow-image">
                                        <img src="image/Leadership-errow.png" class="img-fluid" />
                                    </div>
                                    <div class="details">
                                        <h4>{{$val->title}}</h4>
                                        <p>{{$val->description}}</p>
                                    </div>
                                </div>
                                <div class="social-icon">
                                    <a href="{{$val->link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </section>


        <!-- <section class="Differentiators" id="Differentiators">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-1.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Validate application pipelines and assign a DevSecOps score based on the current
                                    level of DevSecOps maturity via our discovery engine</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-2.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Draw workflow templates available as APIs for security scans, thresholds, stage gates
                                    and approvals easily</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-3.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Minimal time taken for integration with the customer CI/CD pipeline and changes, if
                                    any</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-4.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Access a dashboard to view all vulnerabilities and perform remediation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-5.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Policy engine enables DevSecOps teams to perform active governance with automated
                                    tool configurations monitoring and auto-remediation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-6.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Meet all regulatory compliance requirements (For e.g. PCI, GDPR, HITRUST) with the
                                    policy engine</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-7.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Utilize 350 KPIs and 600 best practices from planning to release</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="Differentiators-main">
                            <div class="Differentiators-img">
                                <img src="image/Differentiators-img-8.png" class="img-fluid">
                            </div>
                            <div class="Differentiators-content">
                                <p>Reduce security scanning costs by monitoring usage and substituting open-source
                                    tooling where possible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- ======= Differentiators Section ======= -->

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