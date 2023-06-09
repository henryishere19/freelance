<div id="kt_header" style="" class="header align-items-stretch">
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
			<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
				<span class="svg-icon svg-icon-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
						<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
					</svg>
				</span>
			</div>
		</div>
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="{{url('') }}" class="d-lg-none">
				<img alt="Logo" src="{{ asset('backendAssets/media/logos/logo-2.svg') }}" class="h-30px" />
			</a>
		</div>
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<div class="d-flex align-items-stretch" id="kt_header_nav">
			
			</div>
			
			<div class="d-flex align-items-stretch flex-shrink-0">
				<div class="d-flex align-items-center ms-1 ms-lg-3">
					<a class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" href="javascript:void(0);"><i class="fonticon-sun fs-2"></i></a>
				</div>
				<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
					<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
						@if(Auth::user()->profile_image)
						<img src="{{ asset(Auth::user()->profile_image) }}" alt="user" />
						@else
						<img src="{{ asset('backendAssets/media/svg/avatars/blank.svg') }}" alt="user" />
						@endif
					</div>
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
						<div class="menu-item px-3">
							<div class="menu-content d-flex align-items-center px-3">
								@if(Auth::user()->profile_image)
								<div class="symbol symbol-50px me-5"><img alt="Logo" src="{{ asset(Auth::user()->profile_image) }}" /></div>
								@else
								<div class="symbol symbol-50px me-5"><img alt="Logo" src="{{ asset('backendAssets/media/svg/avatars/blank.svg') }}" /></div>
								@endif
								<div class="d-flex flex-column">
									<div class="fw-bolder d-flex align-items-center fs-5">{{ Settings::decryptData(Auth::user()->name) }}</div>
									<a class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->user_type }}</a>
								</div>
							</div>
						</div>
						<div class="separator my-2"></div>
						<div class="menu-item px-5"><a href="{{ route('page.my-profile') }}" class="menu-link px-5">My Profile</a></div>
						<div class="menu-item px-5"><a href="{{ route('page.change.password') }}" class="menu-link px-5">Change Password</a></div>
						<!--<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
							<a href="#" class="menu-link px-5"><span class="menu-title position-relative">Language</span></a>
							<div class="menu-sub menu-sub-dropdown w-175px py-4">
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5 active">
									<span class="symbol symbol-20px me-4"><img class="rounded-1" src="assets/media/flags/united-states.svg" alt=""/></span>English</a>
								</div>
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5">
									<span class="symbol symbol-20px me-4"><img class="rounded-1" src="assets/media/flags/spain.svg" alt=""/></span>Spanish</a>
								</div>
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5">
									<span class="symbol symbol-20px me-4"><img class="rounded-1" src="assets/media/flags/germany.svg" alt=""/></span>German</a>
								</div>
							</div>
						</div>-->
						<div class="separator my-2"></div>
						<div class="menu-item px-5"><a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>