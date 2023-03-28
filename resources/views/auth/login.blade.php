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
			      			        <h3 class="mb-4">{{ __('Login') }}</h3>
			      		        </div>
			      	        </div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
			      		        <div class="form-group mb-3">
			      			        <label class="label" for="name">{{ __('Email Address') }}</label>
			      			        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>                              
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>

		                        <div class="form-group mb-3">
		            	            <label class="label" for="password">{{ __('Password') }}</label>
		                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">		                    
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
		                        <div class="form-group">
		            	            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
		                        </div>
		                        <div class="form-group d-md-flex">
		            	            <div class="w-50 text-left">
			            	            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									    <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
									    <span class="checkmark"></span>
										</label>
									</div>
                                    
									<div class="w-50 text-md-right">
                                        @if (Route::has('password.request'))
										    <a href="{{ route('password.request') }}">Forgot Password</a>
                                        @endif
									</div>
		                        </div>
		                    </form>
		                    <!-- <p class="text-center">Not a member? <a data-toggle="tab" href="{{ route('register') }}">Sign Up</a></p> -->
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</section>

@endsection