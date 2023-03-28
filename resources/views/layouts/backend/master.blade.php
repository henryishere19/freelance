<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="{{ url('') }}">
		<title>@if(isset($page_title) && $page_title != '' ) {{$page_title}} @endif - {{ config('constants.APP_NAME') }}</title>
		
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<link rel="shortcut icon" href="{{asset('favicon.jpeg') }}" />
		
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('backendAssets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{asset('backendAssets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- CUSTOM CSS -->
		<link rel="stylesheet" href="{{asset('backendAssets/custom.css')}}" />
		
		<!-- Data tables -->
		<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		
		<!-- jQuery CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		
		<!-- CUSTOM JS -->
		<script>var token = '{{ csrf_token() }}'; var SITE_URL = '{{ url("") }}';</script>
		
		<script src="{{asset('backendAssets/custom.js') }}"></script>
		
		@yield('css')
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		
		@yield('popup')
		
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				@include('layouts.backend.partials.sidebar')
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('layouts.backend.partials.header')
					
					<!--Order notification tone-->
					<div id="audioHtml"></div>
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!-- Filters -->
						@yield('toolbar')
						
						<!--begin::Content-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
						<img id="loading-image"  src="ConventionalOblongFairybluebird-max-1mb.gif" style="display:none;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
    background-color: #ffffff8c;"/>
							@yield('content')
						</div>
					</div>
					
					<!--begin::Footer-->
					@include('layouts.backend.partials.footer')
				</div>
			</div>
		</div>
		<!--end::Root-->
		
		<script>var hostUrl = "assets/";</script>
		
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('backendAssets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('backendAssets/js/scripts.bundle.js') }}"></script>
		
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('backendAssets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<script src="{{ asset('backendAssets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('backendAssets/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('backendAssets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('backendAssets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('backendAssets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('backendAssets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('backendAssets/js/custom/utilities/modals/users-search.js') }}"></script>
		
		<!-- Drang and Drop Media -->
		<script src="{{ asset('backendAssets/js/drag-and-drop-media.js') }}"></script>
		
		<!-- Data tables -->
		<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
		@yield('js')
	</body>
</html>