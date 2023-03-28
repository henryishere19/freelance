<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="<?php echo URL::to('/'); ?>" class="logo"><img src="{{asset('assets/img/Intuitive Logo.png')}}" alt=""></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{route('about-us')}}">About</a></li>
          <li class="dropdown"><a href="#"><span>Services</span> <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul>
              <li><a href="{{route('service.view.one', ['slug' =>'cloud-finops'])}}">Cloud FinOps</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'cloud-infrastructure-engineering'])}}">Cloud Infrastructure Engineering</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'cloud-native'])}}">Cloud Native, AppSecOps, DevSecOps</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'data-ops'])}}">DataOps</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'ai-ml-solutions'])}}">AI & ML</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'cloud-security-and-grc'])}}">Cyber Security and GRC</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'digital-workspace'])}}">Digital Workspace (M365)</a></li>
              <li><a href="{{route('service.view.one', ['slug' =>'hybrid-cloud'])}}">Hybrid Cloud, SDDC, SD-WAN, SDN</a></li>
              

            </ul>
          </li>
          <li><a class="nav-link scrollto " href="{{route('lifeatnew')}}">Life at Intuitive</a></li>
          <li><a class="nav-link scrollto" href="{{route('carear')}}">Careers</a></li>
          <li><a class="nav-link scrollto " href="{{route('blog.list')}}">Blogs</a></li>
          <li><a class="nav-link scrollto" href="{{route('portfolio')}}">Innovation Portfolio</a></li>
          <li><a class="nav-link scrollto " href="{{route('press-release')}}">Press Releases</a></li>
          <li><a class="nav-link scrollto" href="{{route('contact-us')}}">Contact Us</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Partners</span> <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
          <ul>
            <li><a href="{{route('aws')}}">AWS</a></li>
            </ul>
          </li> -->
          <!-- <li><a class="nav-link scrollto " href="blogs.html">Blogs</a></li> -->
        </ul>
        <i class="fa fa-bars mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>