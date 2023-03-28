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
                      <h1>Possibilities are endless,<br class="d-none d-md-block">discover yours here</h1>                       
                      <p class="mt-4">At Intuitive.Cloud, you’ll have the opportunity to work with great people, work on big projects and make a real difference for some of the leading brands.</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="banner-img">
                      <img src="assets/img/Home/Slider-Image.png" class="img-fluid">
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
    <section id="the-intuitive-life" class="the-intuitive-life">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3 class="w-100">The Intuitive Life</h3>
        </div>
        <div class="row">
			@foreach($lifeat as $life)
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <p class="text-title icon-box-second-title">{{$life->title}}</p>
              <p class="text-medium">{{$life->description}}</p>
            </div>
          </div>
		  @endforeach
          <!-- <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <p class="text-title icon-box-second-title">Achieve your Potential</p>
              <p class="text-medium">We don’t just hire you! We invest in developing your talents with training and mentorship while challenging you with meaningful work that ensures you can make an impact and build your skills.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <p class="text-title icon-box-second-title">Work on the Next Big Thing</p>
              <p class="text-medium">We are not just followers, we are the creators! You will always find yourself working on one of its kind projects that create real impact.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <p class="text-title icon-box-second-title">Don’t just Work, THRIVE</p>
              <p class="text-medium">While you might start as a junior, we know that’s not what you should be known for. Start young, fail fast and climb the growth ladder faster than anyone. No questions asked.</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <section id="makes-intuitive" class="makes-intuitive">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3 class="w-100">Perks to make your life easier</h3>
        </div>
        <div class="row">
			@foreach($easer as $ase)
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="{{asset('uploads')}}\{{$ase->image}}" class="img-fluid w-100 shape-one">
                  <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>{{$ase->title}}</p>
              </div>
            </div>
          </div>
		  @endforeach
          <!-- <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Life-At/Icon-2.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>Monthly Team Dinner/ Event</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Life-At/Icon-3.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>$500 Referral Bonus</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Life-At/Icon-4.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>100% Paid Training on Technical Subjects</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Life-At/Icon-5.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>Sponsorship for Events/ Conferences</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Life-At/Icon-6.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>Annual Team Picnic</p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <section id="work-play" class="work-play">
      <div class="container" data-aos="fade-up">
        <div class="second-section-title d-flex align-items-center justify-content-between">
          <h2>{{$company->title}}</h2>
          <img src="assets/img/Life-At/Right-Errow.png">
        </div>
        <div class="wrap mt-lg-5">
          <div class="happy-team-slider">
			@foreach($gallary as $gal)
            <div class="item">
              <img src="{{asset($gal->media)}}" alt="" class="img-fluid">
            </div>
			@endforeach
            <div class="item">
              <img src="assets/img/Life-At/Slider-2.jpg" alt="" class="img-fluid">
            </div>
            <!-- <div class="item">
              <img src="assets/img/Life-At/Slider-3.jpg" alt="" class="img-fluid">
            </div>
            <div class="item">
              <img src="assets/img/Life-At/Slider-4.jpg" alt="" class="img-fluid">
            </div>
            <div class="item">
              <img src="assets/img/Life-At/Slider-5.jpg" alt="" class="img-fluid">
            </div>
            <div class="item">
              <img src="assets/img/Life-At/Slider-6.jpg" alt="" class="img-fluid">
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <section id="listen-to-stories" class="listen-to-stories">
      <div class="container" data-aos="fade-up">
        <div class="section-title d-flex align-items-center justify-content-between">
          <h2 class="second-color">Listen to stories of our team</h2>
          <img src="assets/img/Life-At/Black-Right-Errow.png">
        </div>
        <div class="testimonial">
          <div class="testimonial__inner">
            <div class="testimonial-slider">
              <div class="testimonial-slide">
                <div class="testimonial_box">
                  <div class="testimonial_box-inner">
                    <div class="testimonial_box-top">
                      <div class="testimonial_box-img">
                        <img src="assets/img/Life-At/Icon.png" alt="profile">
                      </div>
                      <div class="testimonial_box-text">
                        <p>“I have been working at Intuitive for a little over a year and a half. The company is sound, well run and the people are first rate. I would recommend Intuitive as an employer to anyone looking to further their career in Information Technology.”</p>
                      </div>
                      <div class="testimonial_box-name">
                        <h4>Arthur Bell, Sr Linux Engineer, North Carolina</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-slide">
                <div class="testimonial_box">
                  <div class="testimonial_box-inner">
                    <div class="testimonial_box-top">
                      <div class="testimonial_box-img">
                        <img src="assets/img/Life-At/Icon.png" alt="profile">
                      </div>
                      <div class="testimonial_box-text">
                        <p>"I joined Intuitive in October 2020 having known some of the Intuitive team over the previous years. Since joining, I have found an organization that excels in putting people in a position where they can grow and mature within their skills, roles and responsibilities. Just completing my two-year anniversary and I am already looking forward to the next two years and the two years after that"</p>
                      </div>
                      <div class="testimonial_box-name">
                        <h4>David Foster, Sales Leader, New York</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-slide">
                <div class="testimonial_box">
                  <div class="testimonial_box-inner">
                    <div class="testimonial_box-top">
                      <div class="testimonial_box-img">
                        <img src="assets/img/Life-At/Icon.png" alt="profile">
                      </div>
                      <div class="testimonial_box-text">
                        <p>"I have worked for Intuitive as a consultant for the past 2 and a half years and the experience is nothing but amazing. Every team I have worked with at Intuitive is filled with smart and motivated people who are excited to work for the company. The leadership team at Intuitive has successfully internalized its goals and objectives hence all the employees feel appreciated and recognized for their dedication and hard work. Overall, the company is governed by a team of dedicated and goal-driven leaders who are passionate about helping their employees, contractors, and clients achieve their goals."</p>
                      </div>
                      <div class="testimonial_box-name">
                        <h4>Usenobong Akpan, Cloud Architect, Texas</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-slide">
                <div class="testimonial_box">
                  <div class="testimonial_box-inner">
                    <div class="testimonial_box-top">
                      <div class="testimonial_box-img">
                        <img src="assets/img/Life-At/Icon.png" alt="profile">
                      </div>
                      <div class="testimonial_box-text">
                        <p>"Intuitive Partners Inc. is a career accelerator that allows professionals to develop their skills on multiple cloud platform, learn new skills, take their careers in a different direction, and pursue a career they are passionate about.<br><br>They are such a wonderful destiny for those who are willing to establish their career growth on cloud systems. I am truely happy to be a part of the team!!!"</p>
                      </div>
                      <div class="testimonial_box-name">
                        <h4>Kalaivani P, Sr Automation Engineer, Florida</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="know-more" class="know-more">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 content">
            <h2>Want to do meaningful work<br class="d-none d-md-block">that solves everyday problems?</h2>
              <div class=" d-flex align-items-center believe-button mt-5">
                <img src="assets/img/digital-workspace/arrow-button-white.png" class="img-fluid">
                <!-- <a href="#" class="button">View Open Positions Now!</a> -->
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