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
                      <h1>Work on the next <br class="d-none d-md-block"> big thing at Intuitive</h1>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="banner-img">
                      <img src="assets/img/career.png" class="img-fluid">
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

    <!-- ======= Job Listing Filter ======= -->
    <!-- <section id="job_filter" class="job-filter">
      <div class="container">
        <div class="job-filter-box">
          <form class="filter-form" action="" method="post">
            <ul class="job-filter-list">
              <li>
                <select class="form-select" aria-label="Default select example">
                  <option selected disabled>Function</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </li>
              <li>
                <select class="form-select" aria-label="Default select example">
                  <option selected disabled>Sector</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </li>
              <li>
                <select class="form-select" aria-label="Default select example">
                  <option selected disabled>Region</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </li>
              <li>
                <select class="form-select" aria-label="Default select example">
                  <option selected disabled>Department</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </li>
              <li>
                <button class="filter-submit">Submit</button>
              </li>
            </ul>
          </form>
        </div>
      </div>
    </section> -->
    <!-- ======= End Job Filter ======= -->

    <!-- ======= Job Listing ======= -->
    <section id="job_listing" class="job-listing">
      <div class="container">
        <div class="job-listing-contaier">
          @foreach($jsndata->items as $item)
          <div class="single-job">
            <div class="row align-items-center">
              <div class="col-lg-9 col-md-9">
                <div class="job-title">
                  <h2>{{$item->title}}</h2>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="job-view-more-button">
                  <a href="{{ route('carearviewjob', ['boardid'=>113153, 'jobid'=> $item->adId]) }}">View More</a>
                </div>
                
                  <p class="carear_date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->postedAt))->format('M d, Y')}}</p>

              </div>
              <div class="col-lg-12 col-md-12">
                <div class="job-discription">
                  <p>{{$item->summary}}</p>
                  <!-- <ul class="job-listing-contant">
                    
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- <div class="single-job">
            <div class="row align-items-center">
              <div class="col-lg-9 col-md-9">
                <div class="job-title">
                  <h2>Sr. Cloud Data Infrastructure Architect</h2>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="job-view-more-button">
                  <a href="career-single.html">View More</a>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="job-discription">
                  <ul class="job-listing-contant">
                    <li>Data Center</li>
                    <li>Remote</li>
                    <li>Contract</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="single-job">
            <div class="row align-items-center">
              <div class="col-lg-9 col-md-9">
                <div class="job-title">
                  <h2>Senior Database Engineer</h2>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="job-view-more-button">
                  <a href="career-single.html">View More</a>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="job-discription">
                  <ul class="job-listing-contant">
                    <li>Database</li>
                    <li>Remote</li>
                    <li>Contract</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="single-job">
            <div class="row align-items-center">
              <div class="col-lg-9 col-md-9">
                <div class="job-title">
                  <h2>Cloud Architect</h2>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="job-view-more-button">
                  <a href="career-single.html">View More</a>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="job-discription">
                  <ul class="job-listing-contant">
                    <li>Cloud</li>
                    <li>Remote</li>
                    <li>Permanent / Full Time</li>
                  </ul>
                </div>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </section>
    <!-- ======= End Job Listing ======= -->

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