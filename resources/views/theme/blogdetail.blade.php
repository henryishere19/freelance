@extends('layouts.theme.master')



@section('content')



<main id="main">



<!-- ======= Latest Blogs Section ======= -->

<section id="blog-inner-page" class="blog-inner-page">

  <div class="container" data-aos="fade-up">



	  <div class="row">



		<div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

		  <div class="blog-details">

			<div class="blog-image">

				<img src="{{asset($data->banner_image)}}" class="img-fluid w-100" />

			</div>

			<div class="blog-content">

			<h1 class="date">By {{$data->author}} / @if(isset($data->post_date) && $data->post_date != "") {{ \Carbon\Carbon::createFromTimestamp(strtotime($data->post_date))->format('M d,Y')}}@else {{ \Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->format('M d,Y')}} @endif</h1>

			{!! $data->description !!}

			</div>

		  </div>

		</div>

		<div class="blog-next-button mt-3 mb-3 d-flex justify-content-between align-items-stretch">

			<div>

				<a href="/blog/@if(isset($next_record->slug) && $next_record->slug != ''){{$next_record->slug}}@endif"><button>Previous</button></a>

			</div>

			<div>

			<a href="/blog/@if(isset($previous_record->slug) && $previous_record->slug != ''){{$previous_record->slug}}@endif"><button>Next</button></a>

			</div>

			

		</div>



	  </div>



  </div>

</section>

<!-- ======= End Latest Blogs Section ======= -->



</main>

    <!-- /main -->

@endsection

