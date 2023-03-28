<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>@if(isset($page_title)){{$page_title}}@endif</title>

  <meta content="@if(isset($page_main_title) && $page_main_title != ""){{$page_main_title}}@endif" name="title">

  

  <meta content="@if(isset($page_description) && $page_description != ""){{$page_description}}@endif" name="description">

  <meta content="" name="keywords">



  <!-- Favicons -->

  <link href="{{asset('img/Fav-Icon.png')}}" rel="icon">

  <link href="{{asset('img/Fav-Icon.png')}}" rel="apple-touch-icon">



  <!-- Google Fonts -->

  <!-- <link

    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"

    rel="stylesheet"> -->



  <!-- Vendor CSS Files -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">

  <link href="{{asset('assets/vendor/build/css/intlTelInput.css')}}" rel="stylesheet">

  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />



  <!-- Template Main CSS File -->

  <link href="{{asset('css/style.css')}}" rel="stylesheet">

	<script>var user_id = ''; @if(Auth::user()) var user_id = '{{ Auth::user()->id }}'; @endif var token = '{{ csrf_token() }}'; var SITE_URL = '{{ url("") }}';</script>
  <script src="https://www.google.com/recaptcha/api.js"></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NDW3BPGN3X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-NDW3BPGN3X');
  </script>



</head>



<body>



  <!-- ======= Header ======= -->

  @include('layouts.theme.partials.header')

  <!-- End Header -->



  <!-- ======= Hero Section ======= -->

 

  <!-- ======= End Hero Section ======= -->

  @yield('content')

  

  <!-- End #main -->



  <!-- ======= Footer ======= -->

  @include('layouts.theme.partials.footer')

  

  <!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><img src="{{asset('img/Home/Rocket.svg')}}" class=img-fluid></a>



  <!-- Vendor JS Files -->

  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->

  <script src="{{asset('vendor/aos/aos.js')}}"></script>

  <script src="{{asset('assets/vendor/build/js/intlTelInput.js')}}"></script>

  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>



  <!-- Template Main JS File -->

  <script src="{{asset('js/main.js')}}"></script>

  <script src="{{asset('themeAssets/custom.js')}}"></script>



  @yield('js')


  
<div class="modal fade cookie" id="cookieModalToggle" aria-hidden="true" aria-labelledby="cookieModalToggleLabel" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{asset('img/Main-Logo.png')}}" class="shape-cookie">
        <h3 class="modal-title" id="cookieModalToggleLabel">Cookie Consent</h3>
      
      </div>
      <div class="modal-body">
        We use cookies that are necessary to run our website and improve your experience while navigating through the website. We also use cookies to provide you with relevant information in your searches on our and other websites. The additional cookies are only used with your consent.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-close btn-primary" data-bs-dismiss="modal" aria-label="Close" onclick="acceptCookieConsent();">Accept</button>
        <button class="btn btn-primary" data-bs-target="#cookieModalToggle2" data-bs-toggle="modal">Customize</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade cookie" id="cookieModalToggle2" aria-hidden="true" aria-labelledby="cookieModalToggleLabel2" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{asset('img/Main-Logo.png')}}" class="shape-cookie">
        <h3 class="modal-title" id="cookieModalToggleLabel2">Manage cookies</h3>
        
      </div>
      <div class="modal-body">
        <p>Manage how Intuitive.Cloud use cookies, in accordance with our Cookie policy, by making your choices below. Please note that if you disable cookies and similar technologies entirely, our website may not function properly.</p>
        <div id="accept_neccessary" class="accept row">
          <input type="checkbox" id="necessary" name="necessary" value="necessary" class="col-md-1 col-1">
          <label for="necessary" class="col-md-11 col-10">These cookies must be enabled, we are not able to operate without them. They are related to the core functionality of the website and related services.</label>
        </div>
        <div id="accept_functionality" class="accept row">
          <input type="checkbox" id="functionality" name="functionality" value="functionality" class="col-md-1 col-1">
          <label for="functionality"  class="col-md-11 col-10">These cookies increase the functionality of our website. We may use these to provide a personalized experience by remembering your settings preferences, name, language, country, etc.</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary accept_all" data-bs-dismiss="modal" aria-label="Close" onclick="acceptCookieConsent();">Accept All</button>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
jQuery(window).on('load', function(){ 
  let cookie_consent = getCookie("user_cookie_consent");
  if(cookie_consent != ""){
    jQuery('#cookieModalToggle').modal('hide');
    jQuery('#cookieModalToggle2').modal('hide');
  }else{
    jQuery('#cookieModalToggle').modal('show');
    jQuery('#cookieModalToggle').modal({
          backdrop: 'static',
          keyboard: false
    });  
    jQuery('#cookieModalToggle2').modal({backdrop: 'static', keyboard: false});
  }
});

jQuery("input#necessary , input#functionality").click(function () {
  if (jQuery('input#necessary').is(":checked")) {
  jQuery(".accept_all").css('opacity','1');
  jQuery(".accept_all").css('pointer-events','unset');
}
else{
  jQuery(".accept_all").css('opacity','0.5');
  jQuery(".accept_all").css('pointer-events','none');
}
});

// Create cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Delete cookie
function deleteCookie(cname) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}

// Read cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set cookie consent
function acceptCookieConsent(){
    deleteCookie('user_cookie_consent');
    setCookie('user_cookie_consent', 1, 30);
}    
    </script>

</body>



</html>