@extends('layouts.auth.master')

@section('content')
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img col d-flex align-items-center justify-content-center">
							<img class="w-75" src="{{ asset(Settings::get('logo')) }}"/>
						</div>
						<div class="login-wrap p-4 p-md-5">
			      	        <div class="d-flex">
			      		        <div class="w-100">
			      			        <h3 class="mb-4">{{ __('Registration') }}</h3>
			      		        </div>
			      	        </div>
							<form method="POST" action="javascript:void(0);" onsubmit="registerUser()" class="registration-form">
                                @csrf
			      		        <div class="form-group mb-3">
			      			        <label class="label" for="name">{{ __('Name') }}</label>
			      			        <input id="name" type="text" class="form-control" required autofocus>
									<div class="validation-div" id="val-name"></div>
								</div>
								
								<div class="form-group mb-3">
			      			        <label class="label" for="name">{{ __('Email Address') }}</label>
			      			        <input id="email" type="email" class="form-control" required autocomplete="email">
									<div class="validation-div" id="val-email"></div>
								</div>
								
								<div class="form-group mb-3">
			      			        <label class="label" for="name">{{ __('Phone Number') }}</label>
			      			        <input id="phone_number" type="number" class="form-control" required>
									<div class="validation-div" id="val-phone_number"></div>
								</div>

		                        <div class="form-group mb-3">
		            	            <label class="label" for="password">{{ __('Password') }}</label>
		                            <input type="password" id="password" class="form-control" required autocomplete="current-password">
									<div class="validation-div" id="val-password"></div>
								</div>
								<div class="form-group mb-3">
		            	            <label class="label" for="password">{{ __('Confirm Password') }}</label>
		                            <input type="password" id="confirm_password" class="form-control" required>
									<div class="validation-div" id="val-confirm_password"></div>
								</div>
								
		                        <div class="form-group">
		            	            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sugn Up</button>
		                        </div>
		                    </form>
		                    <p class="text-center">Already a member? <a data-toggle="tab" href="{{ route('login') }}">Sign In</a></p>
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</section>
@endsection