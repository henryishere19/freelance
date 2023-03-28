@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit {{ $role }}</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted">{{ $role }}</li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-dark">Create</li>
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
						<div class="mb-7">
							<label class="fs-6 fw-bold mb-3">
								<span>Select Avatar</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
							</label>
							<div class="mt-1">
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('backendAssets/media/svg/avatars/blank.svg') }}')">
									<div class="image-input-wrapper w-100px h-100px" style="background-image: url('{{ asset('backendAssets/media/svg/avatars/blank.svg') }}')"></div>
									<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
										<i class="bi bi-pencil-fill fs-7"></i>
										<input type="file" id="image" name="avatar" accept=".png, .jpg, .jpeg" />
										<input type="hidden" name="avatar_remove" />
									</label>
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
										<i class="bi bi-x fs-2"></i>
									</span>
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
										<i class="bi bi-x fs-2"></i>
									</span>
								</div>
							</div>
						</div>
						
						<div class="fv-row mb-7">
							<label class="fs-6 fw-bold form-label mt-3">
								<span class="required">Name</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i>
							</label>
							<input type="text" class="form-control form-control-solid" id="name" value="{{ Settings::decryptData($data->name) }}" />
							<div class="validation-div" id="val-name"></div>
						</div>
						<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
							<div class="col">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Email</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's email."></i>
									</label>
									<input type="email" class="form-control form-control-solid" id="email" value="{{ Settings::decryptData($data->email) }}"/>
									<div class="validation-div" id="val-email"></div>
								</div>
							</div>
							<div class="col">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Phone</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's phone number."></i>
									</label>
									<input type="number" class="form-control form-control-solid" id="phone_number" value="{{ Settings::decryptData($data->phone_number) }}"/>
									<div class="validation-div" id="val-phone_number"></div>
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
							<div class="col">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3"><span>New Password</span></label>
									<input type="password" class="form-control form-control-solid" id="password"/>
									<div class="validation-div" id="val-password"></div>
								</div>
							</div>
						</div>
						
						<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-3 row-cols-lg-5">
							<div class="col">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3"><span class="required">Status</span></label>
									<div class="w-100">
										<div class="form-floating border rounded">
											<select id="status" class="form-select form-select-solid lh-1 py-3">
												<option value="active">Active</option>
												<option value="inactive">Inactive</option>
												<option value="blocked">Block</option>
											</select>
											<div class="validation-div" id="val-status"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="separator mb-6"></div>
						<div class="d-flex justify-content-end">
							<button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
							<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
								<span class="indicator-label">Save</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
					</form>
				</div>
				
				<hr>
				<!-- Wallet -->
				<div class="card-body pt-5">
					<div class="mb-7">
						<div class="row">
							<div class="col-md-3">
								<div class="overflow-auto pb-5">
									<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
										<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
											<div class="mb-3 mb-md-0 fw-semibold">
												<h4 class="text-gray-900 fw-bold">Balance</h4>
												<h2 class="text-gray-900 fw-bold">0.00</h2>
											</div>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#walletModal"><span class="badge badge-pill badge-danger">+</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="table-responsive">
							<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 data-tbl">
								<thead>
									<tr class="fw-bolder text-muted">
										<th class="min-w-30px">#</th>
										<th class="min-w-200px">Date</th>
										<th class="min-w-150px">Title</th>
										<th class="min-w-150px">Type</th>
										<th class="min-w-150px">Status</th>
										<th class="min-w-100px text-end">Amount</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('js')

<script type="text/javascript">
	
	// Get Wallet Data
	$(function () {
		var table = $('.data-tbl').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{route('ajax.user.wallet.history')}}",
			},
			columns: [
				{data: 'id', name: 'id'},
				{data: 'date', name: 'date'},
				{data: 'title', name: 'title'},
				{data: 'type', name: 'type'},
				{data: 'status', name: 'status'},
				{data: 'amount', name: 'amount'},
			]
		});
	});
	
	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('role', '{{$role}}');
		data.append('user_id', '{{$data->id}}');
		data.append('name', $('#name').val());
		data.append('email', $('#email').val());
		data.append('phone_number', $('#phone_number').val());
		data.append('password', $('#password').val());
		data.append('status', $('#status').val());
		data.append('image', $('#image')[0].files[0]);
		
		var response = adminAjax('{{route("user.management.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.href ='{{route("user.list",[$role])}}'; }, 2000)
			
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