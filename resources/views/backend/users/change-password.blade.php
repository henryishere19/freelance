@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Change Password</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('page.my-profile') }}" class="text-muted text-hover-primary">Profile</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-dark">Change Password</li>
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('content')
		<div id="kt_content_container" class="container-xxl">
			<div class="card card-flush h-lg-100" id="kt_contacts_main">
				<div class="card-body pt-5">
					<form id="kt_ecommerce_settings_general_form" class="form" action="javascript:void(0);" onsubmit="saveData()";>
						<div class="row g-9 mb-8">
							<div class="col-md-4 fv-row">
								<label class="fs-6 fw-bold form-label mt-3">
									<span class="required">Current Password</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter current password."></i>
								</label>
								<div class="validation-div" id="val-current_password"></div>
								<input type="text" class="form-control form-control-solid" id="current_password"/>
							</div>
						</div>
						<div class="row g-9 mb-8">
							<div class="col-md-4 fv-row">
								<label class="fs-6 fw-bold form-label mt-3">
									<span class="required">New Password</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter new password."></i>
								</label>
								<div class="validation-div" id="val-new_password"></div>
								<input type="password" class="form-control form-control-solid" id="new_password" maxlength="22"/>
							</div>
						</div>
						<div class="row g-9 mb-8">
							<div class="col-md-4 fv-row">
								<label class="fs-6 fw-bold form-label mt-3">
									<span class="required">Confirm Password</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter confirm password."></i>
								</label>
								<div class="validation-div" id="val-confirm_password"></div>
								<input type="password" class="form-control form-control-solid" id="confirm_password" maxlength="22"/>
							</div>
						</div>
						
						<div class="separator mb-6"></div>
						<div class="d-flex justify-content-left">
							<button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Reset</button>
							<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
								<span class="indicator-label">Update</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection

@section('js')

<script type="text/javascript">
	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('current_password', $('#current_password').val());
		data.append('new_password', $('#new_password').val());
		data.append('confirm_password', $('#confirm_password').val());
		
		var response = adminAjax('{{route("ajax.change.password")}}', data);
		if(response.status == '200' && response.success == '1'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
  	}
</script>
@endsection