<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<!--begin::Brand-->
	<div class="aside-logo flex-column-auto" id="kt_aside_logo">
		<a href="{{ url('') }}" target="_blank">
			<img alt="Logo" src="@if(Settings::get('logo')){{ asset(Settings::get('logo')) }} @endif" class="h-25px logo" />
		</a>
		<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
			<span class="svg-icon svg-icon-1 rotate-180">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
					<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
				</svg>
			</span>
		</div>
	</div>
	<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid">
		<!--begin::Aside Menu-->
		<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<!--begin::Menu-->
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div class="menu-item">
					<a class="menu-link" href="{{ route('dashboard') }}">
						<span class="menu-icon"><i class="bi bi-grid fs-3"></i></span>
						<span class="menu-title">Dashboard</span>
					</a>
				</div>
				
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Manage</span>
					</div>
				</div>
				
				<!-- Order Management -->
				<!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="bi bi-cart fs-3"></i></span>
						<span class="menu-title">Orders &nbsp; <div class="nav-order-count badge badge-light-danger">2</div></span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.open.order.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Open Orders</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.order.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Order History</span>
							</a>
						</div>
					</div>
				</div> -->
				
				<!-- Slider Management -->
				<div class="menu-item">
					<a class="menu-link" href="{{ route('sliders.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Sliders</span>
					</a>
				</div>

				<!-- Accolades Management -->
				<div class="menu-item">
					<a class="menu-link" href="{{ route('accolades.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Accolades</span>
					</a>
				</div>
				
				<!-- Section -->
				<div class="menu-item">
					<a class="menu-link" href="{{ route('ajax.setionindex.index') }}">
						<span class="menu-icon"><i class="fa fa-film"></i></span>
						<span class="menu-title">Section</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('ajax.instiveindex.index') }}">
						<span class="menu-icon"><i class="fa fa-film"></i></span>
						<span class="menu-title">Intuitive</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('portfolio.index') }}">
						<span class="menu-icon"><i class="fa fa-film"></i></span>
						<span class="menu-title">portfolio</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('pressrelease.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Press-Release</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('lifeatinsetive.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Lifeatinsetive</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('ajax.easier.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Easer</span>
					</a>
				</div>
				<!-- Company -->
				<div class="menu-item">
					<a class="menu-link" href="{{ route('company.index') }}">
						<span class="menu-icon"><i class="fa fa-building"></i></span>
						<span class="menu-title">Company</span>
					</a>
				</div>
				<!-- casestudy -->
				<div class="menu-item">
					<a class="menu-link" href="{{ route('casestudy.index') }}">
						<span class="menu-icon"><i class="fa fa-building"></i></span>
						<span class="menu-title">Case Study</span>
					</a>
				</div>

				<div class="menu-item">
					<a class="menu-link" href="{{ route('leader.index') }}">
						<span class="menu-icon"><i class="fa fa-building"></i></span>
						<span class="menu-title">Leader Ship</span>
					</a>
				</div>
				
				<div class="menu-item">
					<a class="menu-link" href="{{ route('years.index') }}">
						<span class="menu-icon"><i class="fa fa-building"></i></span>
						<span class="menu-title">Years Ship</span>
					</a>
				</div>

				

				<!-- Offer Management -->
				
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="fa fa-box"></i></span>
						<span class="menu-title">Blog Management</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.post.management', ['blog']) }}">
								<span class="menu-icon"><i class="fa fa-clone"></i></span>
								<span class="menu-title">Blogs</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('category.list', ['Blog']) }}">
								<span class="menu-bullet"><span class="fa fa-clone"></span></span>
								<span class="menu-title">Categories</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="fa fa-box"></i></span>
						<span class="menu-title">Service Management</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.service.management', ['Service']) }}">
								<span class="menu-icon"><i class="fa fa-clone"></i></span>
								<span class="menu-title">Service</span>
							</a>
						</div>
						<!-- <div class="menu-item">
							<a class="menu-link" href="{{ route('category.list', ['Blog']) }}">
								<span class="menu-bullet"><span class="fa fa-clone"></span></span>
								<span class="menu-title">Categories</span>
							</a>
						</div> -->
					</div>
				</div>
				<!-- Product Management -->
				<!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="fa fa-box"></i></span>
						<span class="menu-title">Product Management</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{route('products.index') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Products</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('category.list', ['product']) }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Categories</span>
							</a>
						</div>
					</div>
				</div> -->
				
				<!-- Coupon Management -->
				<!-- <div class="menu-item">
					<a class="menu-link" href="{{ route('coupons.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Coupons</span>
					</a>
				</div> -->
				<!-- Offer Management -->
				<!-- <div class="menu-item">
					<a class="menu-link" href="{{ route('offers.index') }}">
						<span class="menu-icon"><i class="fa fa-clone"></i></span>
						<span class="menu-title">Offers</span>
					</a>
				</div> -->
				
				<!-- Product Management -->
				<!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="fa fa-box"></i></span>
						<span class="menu-title">FAQ Management</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{route('faq-topics.index') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">FAQ Topics</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('faqs.index') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">FAQs</span>
							</a>
						</div>
					</div>
				</div> -->
				
				<!-- Location Management -->
				<!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="fa fa-map"></i></span>
						<span class="menu-title">Location Management</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.county.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Countries</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.state.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">States</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.city.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Cities</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="{{ route('page.area.list') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Areas</span>
							</a>
						</div>
					</div>
				</div> -->
				
				<!-- User Management -->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon"><i class="bi bi-people fs-3"></i></span>
						<span class="menu-title">Users</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						{{-- Subscribe email --}}
						<div class="menu-item">
							<a class="menu-link" href="{{ route('user.service') }}">
								<span class="menu-icon"><i class="fa fa-wrench"></i></span>
								<span class="menu-title">Popup Customer Details</span>
							</a>
						</div>
						{{-- contact --}}

						<div class="menu-item">
							<a class="menu-link" href="{{ route('contact.list') }}">
								<span class="menu-icon"><i class="fa fa-address-book"></i></span>
								<span class="menu-title">Contact Us Details</span>
							</a>
						</div>

						{{-- Subscribe email --}}
						<div class="menu-item">
							<a class="menu-link" href="{{ route('subscribe/mail') }}">
								<span class="menu-icon"><i class="fa fa-envelope"></i></span>
								<span class="menu-title">Subscribed User List</span>
							</a>
						</div>
						<!-- <div class="menu-item">
							<a class="menu-link" href="{{ url('backend/manage/Customer') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Customers</span>
							</a>
						</div> -->
						
						<!-- <div class="menu-item">
							<a class="menu-link" href="{{ url('backend/manage/Vendor') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Vendors</span>
							</a>
						</div> -->
						<!-- <div class="menu-item">
							<a class="menu-link" href="{{ url('backend/manage/superAdmin') }}">
								<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
								<span class="menu-title">Admins</span>
							</a>
						</div> -->
					</div>
				</div>
				
				<!-- Settings Management -->
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="{{ route('page.general-settings') }}">
						<span class="menu-icon"><i class="bi bi-patch-check fs-3"></i></span>
						<span class="menu-title">General</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
		<a href="{{ route('logout') }}" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Logout from the application.">
			<span class="btn-label">Logout</span>
		</a>
	</div>
</div>