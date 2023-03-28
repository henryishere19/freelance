@extends('layouts.theme.master')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="slider stick-dots">
        @if(count($slide) >= 1)
          @foreach($slide as $slider)
          <div class="slide d-flex align-items-center">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h6 class="animated" data-animation-in="fadeInUp">{{$slider->description}}</h6>

                  <h2 class="animated" data-animation-in="fadeInUp">{{$slider->title}}</h2>
                  <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="{{$slider->	redirect_to}}"> {{$slider->button_text}}</a></p>
                </div>
                <div class="col-lg-5 col-md-6 col-6 slider-image">
                  @if(isset($slider->image) && $slider->image != "")
                  <img src="{{asset($slider->image)}}" class="img-fluid d-block" />
                  @elseif(isset($slider->video) && $slider->video != "")
                  <video autoplay="" muted="" loop="" playsinline="" class="w-100 pointer-events-none" style="height: auto; object-fit: cover;transform: translate3d(0px, 0px, 0px)">
                      <source type="video/mp4" src="{{asset('uploads/video/')}}/{{$slider->video_mobile}}">
                  </video>
                  @else
                  <img src="assets/img/Home/Slider-Data-&-AIML.png" class="img-fluid">
                  @endif
                </div>
            </div>
          </div>
          @endforeach
        @endif
        <!-- <div class="slide d-flex align-items-center">
          <div class="row d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h2 class="animated" data-animation-in="fadeInUp">Accelerate development & secure your software supply chain through innovation</h2>
                <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="cloud-native.html"> Understand How!</a></p>
              </div>
              <div class="col-lg-5 col-md-6 col-6 slider-image">
                <img src="assets/img/Home/Slider-Cloud-Native.png" class="img-fluid d-block" />
              </div>
          </div>
        </div>

        <div class="slide d-flex align-items-center">
          <div class="row d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h2 class="animated" data-animation-in="fadeInUp">Experience excellence in digital transformation</h2>
                <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="digital-workspace.html"> Get started today!</a></p>
              </div>
              <div class="col-lg-5 col-md-6 col-6 slider-image">
                <img src="assets/img/Home/Slider-Digital-Workspace.png" class="img-fluid d-block" />
              </div>
          </div>
        </div>

        <div class="slide d-flex align-items-center">
          <div class="row d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h2 class="animated" data-animation-in="fadeInUp">Build a solid digital foundation, both on-prem and cloud</h2>
                <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="hybrid-cloud.html"> Speak to our experts now!</a></p>
              </div>
              <div class="col-lg-5 col-md-6 col-6 slider-image">
                <img src="assets/img/Home/Slider-Hybrid-Cloud.png" class="img-fluid d-block" />
              </div>
          </div>
        </div>

        <div class="slide d-flex align-items-center">
          <div class="row d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h2 class="animated" data-animation-in="fadeInUp">Reduce business risks with cloud-agnostic security strategies</h2>
                <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="cloud-security-and-grc.html"> Get in touch today!</a></p>
              </div>
              <div class="col-lg-5 col-md-6 col-6 slider-image">
                <img src="assets/img/Home/Slider-Cloud-Security.png" class="img-fluid d-block" />
              </div>
          </div>
        </div>

        <div class="slide d-flex align-items-center">
          <div class="row d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-6 slide_content-headings">
                <h2 class="animated" data-animation-in="fadeInUp">Simplify the complexities of cloud adoption for enterprises</h2>
                <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><a href="cloud-infrastructure-engineering.html"> Get started today!</a></p>
              </div>
              <div class="col-lg-5 col-md-6 col-6 slider-image">
                <img src="assets/img/Home/Slidr-Cloud-Infrastructure.png" class="img-fluid d-block" />
              </div>
          </div>
        </div> -->

      </div>
    </div>
</section>
  <!-- ======= End Hero Section ======= -->
<main id="main">
    <section id="helping-businesses" class="helping-businesses">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 helping-businesses-heading d-flex align-items-center">
            <h1>{{$data3->title}}</h1>
          </div>
          <div class="col-lg-6 col-md-6 helping-businesses-content">
            <p>{!! $data3->description !!}</p>
          </div>
        </div>
      </div>
    </section>
    <section id="intuitive-superpowers" class="intuitive-superpowers">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3>Intuitive Superpowers</h3>
        </div>
        <div class="row justify-content-center">
          @if($servicenew)
            @foreach($servicenew as $new)
            <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{route('service.view.one', ['slug' => $new->slug])}}" class="w-100">
                <div class="icon-box">
                  <div class="icon">
                    <img src="{{asset('service-img')}}/{{$new->image}}" class="img-fluid superpowers-image">
                  </div>
                  <p>{{$new->home_page_title}}</p>
                </div>
              </a>
            </div>
            @endforeach
          @endif
          <!-- <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <a href="data-&-ai-ml.html" class="w-100">
              <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/Home/Intuitive-Superpowers-2.png" class="img-fluid superpowers-image">
                </div>
                <p>Data & AI/ML</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <a href="cloud-infrastructure-engineering.html" class="w-100">
              <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/Home/Intuitive-Superpowers-3.png" class="img-fluid superpowers-image">
                </div>
                <p>Cloud Infrastructure Engineering</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <a href="cloud-security-and-grc.html" class="w-100">
              <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/Home/Intuitive-Superpowers-4.png" class="img-fluid superpowers-image">
                </div>
                <p>Cyber Security & GRC</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <a href="hybrid-cloud.html" class="w-100">
              <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/Home/Intuitive-Superpowers-5.png" class="img-fluid superpowers-image">
                </div>
                <p>Hybrid Cloud, SDDC, SD-WAN, SDN</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <a href="digital-workspace.html" class="w-100">
              <div class="icon-box">
                <div class="icon">
                  <img src="assets/img/Home/Intuitive-Superpowers-6.png" class="img-fluid superpowers-image">
                </div>
                <p>Digital Workspace</p>
              </div>
            </a>
          </div> -->
        </div>
      </div>
    </section>
    <section id="globally-recognized" class="globally-recognized">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 d-flex align-items-center globally-recognized-heading" data-aos="fade-right" data-aos-delay="100">
            <h4>{{$data2->title}}</h4>
          </div>
          <div class="col-lg-12 col-md-12 mt-lg-3 globally-recognized-image" data-aos="fade-left" data-aos-delay="100">
            @if(isset($data2->image) && $data2->image != "")
             <img src="{{asset($data2->image)}}" class="img-fluid w-100 shape-two">

          
            <!-- <img src="assets/img/Home/map-photo.jpg" class="img-fluid"> -->
            
            @elseif(isset($data2->video) && $data2->video != "")
            <video preload="none" playsinline="" autoplay="" muted="" loop="" class="video-embed fade-on-load pointer-events-none w-100 object-cover ready" style="pointer-events: none;" id="site_videos">
                <source src="{{asset('uploads/video/')}}/{{$data2->video}}" type="video/mp4">
            </video>
            @endif
          </div>
        </div>
      </div>
    </section>
    
    <section id="makes-intuitive" class="makes-intuitive">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3 class="w-100">What makes Intuitive special</h3>
        </div>
        <div class="row justify-content-center">
          @if($data4)
          @foreach($data4 as $da)
            <div class="col-lg-4 col-md-6">
              <div class="makes-intuitive-main">
                <div class="makes-intuitive-main-img">                
                    <img src="{{asset('same-img')}}/{{$da->image}}" class="img-fluid w-100 shape-one">
                    <img src="{{asset('img/Home/Shape.png')}}" class="img-fluid w-100 shape-two">
                </div>
                <div class="makes-intuitive-main-content">
                  <p>{{$da->title}}</p>
                </div>
              </div>
            </div>
          @endforeach
          @endif
          <!-- <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Home/makes-intuitive-2.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>America’s fastest growing private companies, INC 5000’s 2022</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Home/makes-intuitive-3.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>400+ highly experienced professionals</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Home/makes-intuitive-4.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>98%  customer retention since inception</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="makes-intuitive-main">
              <div class="makes-intuitive-main-img">                
                  <img src="assets/img/Home/makes-intuitive-5.png" class="img-fluid w-100 shape-one">
                  <img src="assets/img/Home/Shape.png" class="img-fluid w-100 shape-two">
              </div>
              <div class="makes-intuitive-main-content">
                <p>100+ enterprise customers across BFSI, HCLS, Manufacturing, Retail, and ISV verticals</p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>
   
    <section id="collaborate" class="collaborate">
      <div class="container" data-aos="fade-up">
        <div class="row align-items-center d-none d-md-block">
          <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h2>{{$company1->title}}</h2>
            <p>{!! $company1->description !!}</p>
          </div>
          @if($media1)
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-evenly" data-aos="fade-up" data-aos-delay="200">
          @for($i=0;$i<5;$i++)
          <div class="logo-border d-flex justify-content-center">
              <img src="{{$media1[$i]['media']}}" />
            </div>
          @endfor
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="200">
          @for($x=5;$x<11;$x++)
          <div class="logo-border d-flex justify-content-center">
              <img src="{{$media1[$x]['media']}}" />
            </div>
          @endfor
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="200">
          @for($j=11;$j<17;$j++)
          <div class="logo-border d-flex justify-content-center">
              <img src="{{$media1[$j]['media']}}" />
            </div>
          @endfor
         
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="200">
          @for($m=17;$m<23;$m++)
          <div class="logo-border d-flex justify-content-center">
              <img src="{{$media1[$m]['media']}}" />
            </div>
          @endfor
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="200">
          @for($m=23;$m < 29;$m++)
          <div class="logo-border d-flex justify-content-center">
              <img src="{{$media1[$m]['media']}}" />
            </div>
          @endfor
          </div>
          @endif
        </div>
        <!-- <div class="row align-items-center d-none d-md-block">
          <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h2>Collaborate. Innovate. Elevate.</h2>
            <p>We believe that innovation comes from a true meeting of the minds. That’s why we partner with
              the best technology platforms to create differentiated solutions that work for you.</p>
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-evenly" data-aos="fade-up" data-aos-delay="100">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-1.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-25.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-3.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-4.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-28.png" />
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="200">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-18.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-19.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-20.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-21.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-22.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-23.png" />
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="300">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-9.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-10.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-11.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-12.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-8.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-7.png" />
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="400">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-13.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-14.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-26.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-16.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-29.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-31.png" />
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-12 client-logo d-flex align-items-center justify-content-evenly" data-aos="fade-up" data-aos-delay="500">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-5.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-24.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-6.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-27.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-30.png" />
            </div>
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-35.jpg" />
            </div>
          </div>
        </div> -->
        <div class="row align-items-center d-md-none ">
          <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center">
            <h2>Collaborate. Innovate. Elevate.</h2>
            <p>We believe thatff innovation comes from a true meeting of the minds. That’s why we partner with
              the best technology platforms to create differentiated solutions that work for you.</p>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-1.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-25.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-3.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-4.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-5.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-6.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-7.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-8.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-9.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-10.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-11.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-12.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-13.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-14.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-15.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-16.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-17.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-18.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-19.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-20.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-21.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-22.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-23.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-24.png" />
            </div>
          </div>
          <!-- <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-26.png" />
            </div>
          </div> -->
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-27.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-28.png" />
            </div>
          </div>
          <div class="col-3">
            <div class="logo-border d-flex justify-content-center">
              <img src="assets/img/Home/Collaborate-35.png" />
            </div>
          </div>

        </div>
      </div>
    </section>
    <section id="we-believe-that" class="we-believe-that">
      <div class="container">

      <div class="row d-flex align-items-center">
        <div class="col-lg-8 col-md-6">
          <!-- <h2>@if($data9){{$data9->title}}@endif</h2> -->
          <h2>We are extraordinary because of our people</h2>
          <!-- <p class="mt-3">@if($data9){!! $data9->description !!}@endif</p> -->
          <p class="mt-3">At Intuitive.Cloud, our people are at the core of our success story. We believe in a people-first culture that encourages all “Intuiti-ans” to be their best selves—all it takes to break barriers and create exceptional outcomes.</p>
          <div class=" d-flex align-items-center believe-button mt-5">
            <img src="assets/img/Home/arrow-button.png" class="img-fluid">
            <a href="@if($data9){{ $data9->link }}@endif" class="button">Work with us!</a></div>
          </div>
          <div class="col-lg-4 col-md-6 content d-flex flex-column justify-content-center we-believe-that-content">
              <img src="{{asset('img/arrow image.png')}}" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <section id="intuitive-insights" class="intuitive-insights">
      <div class="container">
        <div class="section-title">
          <h3>Intuitive insights</h3>
        </div>
        <div class="intuitive-insights-slider">
          @if($blog)
          @foreach($blog as $b)
          <div class="intuitive-insights-main-box">
            <div class="intuitive-insights-content">
              <p class="date">By {{$b->author}} / @if(isset($b->post_date) && $b->post_date != "") {{ \Carbon\Carbon::createFromTimestamp(strtotime($b->post_date))->format('M d,Y')}}@else {{ \Carbon\Carbon::createFromTimestamp(strtotime($b->created_at))->format('M d,Y')}} @endif</p>
              <h4 class="intuitive-insights-title mb-3">{{$b->title}}</h4>
              <div class="blog-infos" style="    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;"><p class="intuitive-insights-info">{!! $b->short_description !!}</p></div>
              <div class="intuitive-insights-img mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="{{route('blog.details', ['slug' => $b->slug])}}" class="requste-button">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          <!-- <div class="intuitive-insights-main-box">
            <div class="intuitive-insights-content">
              <p class="date">23 Oct,2021</p>
              <h4 class="intuitive-insights-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="intuitive-insights-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="intuitive-insights-img mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Read More</a>
              </div>
            </div>
          </div>
          <div class="intuitive-insights-main-box">
            <div class="intuitive-insights-content">
              <p class="date">23 Oct,2021</p>
              <h4 class="intuitive-insights-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="intuitive-insights-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="intuitive-insights-img mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Read More</a>
              </div>
            </div>
          </div>
          <div class="intuitive-insights-main-box">
            <div class="intuitive-insights-content">
              <p class="date">23 Oct,2021</p>
              <h4 class="intuitive-insights-title mb-3">Lorem Ipsum is simply dummy text </h4>
              <p class="intuitive-insights-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <div class="intuitive-insights-img mb-3 d-flex align-items-center">
                <img src="assets/img/Home/arrow-button.png" class="img-fluid">
                <a href="#" class="requste-button">Read More</a>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <section id="miss-our-latest" class="miss-our-latest">
      <div class="container">

        <div class="row">
          <div class="col-lg-7 col-md-6 content d-flex align-items-center">
            <div class="section-title">
              <h3>Don’t miss our latest client innovation stories and breakthroughs.</h3>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 content d-flex flex-column justify-content-center">
            <p>Subscribe to our monthly newsletter.</p>
            <div class="d-flex align-items-center subscribe-button">
              <form  action="javascript:void(0);" method="POST" onsubmit="subscribe()" class="mt-3 newsletter-form">
              @csrf
                <input type="email" name="email" id="email" placeholder="Enter your email address" autocomplete="off">
                <button ><i class="fa fa-chevron-right" aria-hidden="true"></i> Submit</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section>
    <section id="ready-to-disrupt" class="ready-to-disrupt gray-bg">
      <div class="container">

      <div class="row d-flex align-items-center">
        <div class="col-lg-12 col-md-12">
          <h2>@if($data10){{$data10->title}}@endif</h2>
          <div class=" d-flex align-items-center believe-button mt-5">
            <img src="assets/img/Home/arrow-button.png" class="img-fluid">
            <a href="@if($data10){{$data10->link}}@endif" class="button">Get in touch today</a></div>
          </div>
          <div class="col-lg-12 col-md-12 content d-flex flex-column justify-content-center we-believe-that-content" data-aos="fade-right" data-aos-delay="100">
            <!-- <img src="assets/img/Home/Ready-to-disrupt.png" class="img-fluid"> -->
          </div>
        </div>

      </div>
    </section>
</main>
  <!-- End #main -->
  

@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Subscribe
        function subscribe() {
            var data = new FormData();
            data.append('email', $('#email').val());

            var response = runAjax('ajax_subscribe', data);
            if (response.status == '200' && response.success == '1') {
                swal.fire({type: 'success',title: response.message,showConfirmButton: false,timer: 1500});
                // setTimeout(function() {location.reload();}, 2000)

            } else if (response.status == '422') {
                $('.validation-div').text('');
                $.each(response.error, function(index, value) {
                    $('#val-' + index).text(value);
                });

            } else if (response.status == '201') {
                swal.fire({title: response.message,type: 'error'});
            }
        }
    </script>
    <script type="text/javascript">
    // $.getJSON('https://ipapi.co/json/', function(result) 
    // {
    //      if(result.continent_code == 'EU')
    //      {
    //         $(window).on('load', function(){        
    //         $('#cookieModalToggle').modal('show');
    //         $('#cookieModalToggle').modal({
    //             backdrop: 'static',
    //             keyboard: false
    //           });  
    //         $('#cookieModalToggle2').modal({backdrop: 'static', keyboard: false});
    //           }); 
    //       }
    //    }
    // );
    
  </script> 
@endsection