@extends('layouts.theme.master')

@section('content')
<main>
    	
        <!-- ======= Main Banner Section ======= -->
        <section id="main-banner" class="main-banner">
	<div class="container-fluid p-0">
	<div class="banner-details">
		<div class="banner-main">
		<div class="main-banner-content">
			<div class="container">
				@foreach($slide as $sli)
					<div class="row d-flex align-items-center">
						<div class="col-lg-6 col-md-6">
							<div class="banner-text">
								<h1> {{$sli->title}}</h1>
                <p> {{$sli->description}}</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="banner-img">
								@if(isset($sli->image) && $sli->image != "")
								<img src="{{asset($sli->image)}}" class="img-fluid w-100">
								@else
								<!-- <img src="image/Mobile-Banner.jpg" class="img-fluid w-100"> -->
								@endif
								<!-- <img src="assets/img/Main-Banner.png" class="img-fluid"> -->
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		</div>
	</div>
	</div>
</section>
        <!-- ======= End Main Banner Section ======= -->
    
        <!-- ======= Contact Info Section ======= -->
        <section class="contact-info" id="contact-info">
            <div class="container">
             <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="address-info">
                  <div class="map-icon">
                    <img src="assets/img/Contact/Icon-1.png" class="img-fluid">
                  </div>
                  <div class="address">
                    <p>
                      <b>Corporate Headquarters:</b><br>
                      INTUITIVE TECHNOLOGY PARTNERS INC.<br>
                      33 Wood Ave. S, Suite #600<br>
                      Iselin, NJ, 08830-2717, USA
                    </p>
                  </div>
                </div>
                  <div class="responsive-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3030.939783624318!2d-74.328824!3d40.565007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b66219855555%3A0x209a3660c39687f9!2s33%20S%20Wood%20Ave%20Suite%20600%2C%20Iselin%2C%20NJ%2008830%2C%20USA!5e0!3m2!1sen!2sin!4v1668753395780!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="address-info">
                  <div class="map-icon">
                    <img src="assets/img/Contact/Icon-1.png" class="img-fluid">
                  </div>
                  <div class="address">
                    <p>
                      <b>Regional Offices:</b><br>
                      Iselin, New Jersey<br>
                      Dallas, Texas<br>
                      Saratoga, California<br>
                      Portland, Oregon<br>
                      Toronto, Canada<br>
                      Paris, France<br>
                      London, United Kingdom<br>
                      Zurich, Switzerland<br>
                      Dublin, Ireland<br>
                      Dubai, UAE<br>
                      Bengaluru, India<br>
                      Pune, India<br>
                      Ahmedabad, India
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <!-- <div class="responsive-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3030.939783624318!2d-74.328824!3d40.565007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b66219855555%3A0x209a3660c39687f9!2s33%20S%20Wood%20Ave%20Suite%20600%2C%20Iselin%2C%20NJ%2008830%2C%20USA!5e0!3m2!1sen!2sin!4v1668753395780!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>-->
              </div>
              <div class="col-lg-6 col-md-6">
              </div>
              <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center mb-4">
                <div class="contact-info">
                    <div class="call-icon">
                      <img src="assets/img/Contact/Icon-3.png" class="img-fluid">
                    </div>
                    <div class="contact">
                      <p>
                        <b>Contact Us:</b><br>
                        <a href="mailto:support@intuitive.cloud">Technical Support: support@intuitive.cloud</a><br>
                        <a href="mailto:info@intuitive.cloud">General Information: info@intuitive.cloud</a><br>
                        <a href="mailto:sales@intuitive.cloud">Sales: sales@intuitive.cloud</a><br>
                        <a href="mailto:careers@intuitive.cloud">Careers/Job Inquiry: careers@intuitive.cloud</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="contact-us-form">
                        @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif            
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif            
                            {{-- <form id="contact-us-form"  action="javascript:void(0);" onsubmit="saveData()";> --}}
                        <form id="contact-us-form" action="{{ route('store.contact') }}" method="POST">
                            @csrf
                            <div class="form-headinig mb-4 text-center">
                                <h2>Request a Callback</h2>
                            </div>
                            <div class="mb-4">
                                <input type="text" name="fname" id="firstname" placeholder="First Name" class="form-control">
                            </div>
                            <div class="mb-4">
                                <input type="text" name="lname" id="lastname" placeholder="Last Name" class="form-control">
                            </div>
                            <div class="mb-4">
                                <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" class="form-control">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            </div>
                            <!-- <div class="mb-4">
                                <textarea rows="4" cols="50" name="message" id="message" placeholder="Message" class="form-control"></textarea>
                            </div> -->
                             <!-- Google reCaptcha v2 -->
                             {!! htmlFormSnippet() !!}
                             @if($errors->has('g-recaptcha-response'))
                               <div>
                                  <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                               </div>
                             @endif
                            <div class="submit-button mb-4 mt-4">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- ======= Contact Info Section ======= -->
    
    </main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
        
</script>

<script>
	$(document).ready(function(){
		// getData();
	})
	
    $.validator.addMethod(

"regex",

function(value, element, regexp) {

  var re = new RegExp(regexp);

  return this.optional(element) || re.test(value);

},

"Please check your input."

);

$("#contact-us-form").validate({
rules: {
  fname: {
    required: true,
    minlength: 2,
    regex: /^[a-zA-Z\s]+$/
  },
  lname: {
    required: true,
    minlength: 2,
    regex: /^[a-zA-Z\s]+$/
  },
  email: {
    required: true,
    email: true,
  },
  phone_number: {
    required: true,
    
    minlength: 10,
  },
},
messages: {
  fname: {
    required: "Please Enter Your Name",
    minlength: "Your name must consist of at least 4 characters",
    regex:"Please Enter valid name"
  },
  lname: {
    required: "Please Enter Your Name",
    minlength: "Your name must consist of at least 4 characters",
    regex:"Please Enter valid name"
  },
  email: {
    required: 'Please Enter your email',
    email: 'Please Enter valid Email address',
  },
  phone_number: {
    required: 'Please Enter your phone number',
  },
},

// submitHandler: function(form) {
//     $('.form-submit-btn').attr('disabled',true);
//     $('.form-submit-btn').html('<img src="https://thumbs.gfycat.com/BeautifulExhaustedHippopotamus-max-1mb.gif" style="width: 20px;">');
//     $.ajax({
//         url: 'site-email.php',
//         type: 'POST',
//         data: $(form).serialize(),
//         success: function(res) {
//           //$('.form-submit-btn').html('Send Message <img src="assets/img/arrow-right-c-2.png" alt="">');
//           form.reset();
//           window.location.href = "thank-you.php";
//         },

//         error: function(exx) {

//           //$('.form-submit-btn').html('Send Message <img src="assets/img/arrow-right-c-2.png" alt="">');

//           //$('.schedule-form-sbmt-btn').attr('disabled',false);



//           //$('.home-schedule-form-btn').html('Send Message <img src="assets/img/arrow-right-c-2.png" alt="">');

//           //$('.home-schedule-form-btn').attr('disabled',false);



//           $(form).find('.fail-success-message').show();

//           setTimeout(() => {

//             $(form).find('.fail-success-message').fadeOut(1000);

//           },5000);

//           console.log(exx);

//         }

//     })

// }

});

	
	
</script>
<!-- <script>
    // Vanilla Javascript
    var input = document.querySelector("#phone_number");
    window.intlTelInput(input,({
      // options here
      //$('#phone_number').val()
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone_number').val("");
          $('#phone_number').val("+"+countryCode+" "+ $('#phone_number').val());
       });
    });
  </script> -->
@endsection
