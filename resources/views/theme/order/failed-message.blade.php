@extends('layouts.theme.master')

@section('content')
	<!--<div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content" data-speed="0.06" data-revert="true">
                <h2 data-aos="fade-right" data-aos-delay="30" data-aos-duration="300">Payment Failed</h2>
                <ul data-aos="fade-right" data-aos-delay="70" data-aos-duration="700">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Payment Failed</li>
                </ul>
            </div>
            <div class="page-banner-image" data-speed="0.08" data-revert="true">
                <img src="{{asset('themeAssets/images/page-banner/banner-2.png')}}" data-aos="fade-left" data-aos-delay="80" data-aos-duration="800" alt="image">
            </div>
        </div>
    </div>-->

    <div class="error-area ptb-100">
        <div class="container">
            <div class="error-content">
                <img src="{{asset('themeAssets/images/unsuccessful.png')}}" alt="image">
                <h3>Failed to create Order</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                <a href="shop" class="default-btn">Try Again</a>
            </div>
        </div>
    </div>
@endsection