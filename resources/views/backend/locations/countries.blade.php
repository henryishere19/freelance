@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Country Management</h1>
			</div>
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<div class="m-0">
					<a href="javascript:void(0);" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
					<span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
						</svg>
					</span>Filter</a>
					<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6244763d93048">
						<div class="px-7 py-5">
							<div class="fs-5 text-dark fw-bolder">Filter Options</div>
						</div>
						<div class="separator border-gray-200"></div>
						<div class="px-7 py-5">
							<div class="mb-10">
								<label class="form-label fw-bold">Status:</label>
								<div>
									<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6244763d93048" data-allow-clear="true">
										<option></option>
										<option value="1">Approved</option>
										<option value="2">Pending</option>
										<option value="2">In Process</option>
										<option value="2">Rejected</option>
									</select>
								</div>
							</div>
							<div class="mb-10">
								<label class="form-label fw-bold">Member Type:</label>
								<div class="d-flex">
									<label class="form-check form-check-sm form-check-custom form-check-solid me-5"><input class="form-check-input" type="checkbox" value="1" /><span class="form-check-label">Author</span></label>
									<label class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="2" checked="checked" /><span class="form-check-label">Customer</span></label>
								</div>
							</div>
							<div class="mb-10">
								<label class="form-label fw-bold">Notifications:</label>
								<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
									<label class="form-check-label">Enabled</label>
								</div>
								
							</div>
							<div class="d-flex justify-content-end">
								<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
								<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
							</div>
						</div>
					</div>
				</div>
				<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_box">Create</a>
			</div>
		</div>
	</div>
	
	<!--begin::Modal - Add New-->
	<div class="modal fade" id="kt_modal_box" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<div class="modal-content rounded">
				<div class="modal-header pb-0 border-0 justify-content-end">
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
							</svg>
						</span>
					</div>
				</div>
				<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
					<form id="formData" class="form" action="javascript:void(0);" onsubmit="saveData();">
						<div class="mb-13 text-center">
							<h1 class="mb-3">Create Country</h1>
						</div>
						<div class="d-flex flex-column mb-8 fv-row">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Title</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter title of the country"></i>
							</label>
							<div class="validation-div" id="val-title"></div>
							<input type="text" id="title" class="form-control form-control-solid" placeholder="Enter Country Title" />
						</div>
						<div class="row g-9 mb-8">
							<div class="col-md-6 fv-row">
								<label class="required fs-6 fw-bold mb-2">ISO code</label>
								<div class="validation-div" id="val-iso_code"></div>
								<div class="position-relative d-flex align-items-center">
									<input class="form-control form-control-solid" id="iso_code" placeholder="Enter ISO Code" />
								</div>
							</div>
							<div class="col-md-6 fv-row">
								<label class="required fs-6 fw-bold mb-2">Calling code</label>
								<div class="validation-div" id="val-calling_code"></div>
								<div class="position-relative d-flex align-items-center">
									<input class="form-control form-control-solid" id="calling_code" placeholder="Enter ISO Code" />
								</div>
							</div>
						</div>
						<div class="row g-9 mb-8">
							<div class="col-md-4 fv-row">
								<label class="required fs-6 fw-bold mb-2">Currency</label>
								<div class="validation-div" id="val-currency"></div>
								<div class="position-relative d-flex align-items-center">
									<input class="form-control form-control-solid" id="currency" placeholder="Ex. Rupees, Dollars" />
								</div>
							</div>
							<div class="col-md-4 fv-row">
								<label class="required fs-6 fw-bold mb-2">Currency Code</label>
								<div class="validation-div" id="val-currency_code"></div>
								<div class="position-relative d-flex align-items-center">
									<input class="form-control form-control-solid" id="currency_code" placeholder="Ex. INR, USD" />
								</div>
							</div>
							<div class="col-md-4 fv-row">
								<label class="required fs-6 fw-bold mb-2">Currency Symbol</label>
								<div class="validation-div" id="val-currency_symbol"></div>
								<div class="position-relative d-flex align-items-center">
									<input class="form-control form-control-solid" id="currency_symbol" placeholder="Ex. ₹, $" />
								</div>
							</div>
						</div>
						<div class="d-flex mb-8">
							<div class="me-5">
								<label class="fs-6 fw-bold">Status</label>
								<div class="fs-7 fw-bold text-muted">Manage status active or Inactive</div>
							</div>
							<label class="form-check form-switch form-check-custom form-check-solid">
								<input class="form-check-input" type="checkbox" id="status" checked="checked" />
							</label>
						</div>
						<div class="text-center">
							<input type="hidden" id="id" value="" />
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">
								<span class="indicator-label">Submit</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div id="kt_content_container" class="container-xxl">
		<div class="card mb-5 mb-xl-8">
			<div class="card-body py-3">
				<div class="table-responsive">
					<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 data-tbl">
						<thead>
							<tr class="fw-bolder text-muted">
								<th class="min-w-30px">#</th>
								<th class="min-w-200px">Title</th>
								<th class="min-w-30px">ISO Code</th>
								<th class="min-w-30px">Calling Code</th>
								<th class="min-w-30px">Currency Code</th>
								<th class="min-w-30px">Currency Symbol</th>
								<th class="min-w-30px">Status</th>
								<th class="min-w-100px text-end">Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script type="text/javascript">
	$(function () {
		var table = $('.data-tbl').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{route('ajax.location.list')}}",
				method: "POST",
				"data" : {
					"_token": "{{ csrf_token() }}",
					"type" : "country",
				}
			},
			columns: [
				{data: 'id', name: 'id'},
				{data: 'title', name: 'title'},
				{data: 'iso_code', name: 'iso_code'},
				{data: 'calling_code', name: 'calling_code'},
				{data: 'currency_code', name: 'currency_code'},
				{data: 'currency_symbol', name: 'currency_symbol'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
	});
  
	// STORE
  	function saveData(){
		var data = new FormData();
		data.append('type', 'country');
		data.append('id', $('#formData #id').val());
		data.append('title', $('#formData #title').val());
		data.append('iso_code', $('#formData #iso_code').val());
		data.append('calling_code', $('#formData #calling_code').val());
		data.append('currency', $('#formData #currency').val());
		data.append('currency_code', $('#formData #currency_code').val());
		data.append('currency_symbol', $('#formData #currency_symbol').val());
		if ($('input#status').is(':checked')) {
		data.append('status', 'active');
		}else{
		data.append('status', 'inactive');
		}
		
		var response = adminAjax('{{route("ajax.location.store")}}', data);
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
	
	// EDIT
  	function editThis(id = ''){
		var data = new FormData();
		data.append('type', 'country');
		data.append('id', id);
		
		var response = adminAjax('{{route("ajax.location.show")}}', data);
		if(response.status == '200' && response.success == '1'){
			$('#formData #id').val(response.data.id);
			$('#formData #title').val(response.data.title);
			$('#formData #iso_code').val(response.data.iso_code);
			$('#formData #calling_code').val(response.data.calling_code);
			$('#formData #currency').val(response.data.currency);
			$('#formData #currency_code').val(response.data.currency_code);
			$('#formData #currency_symbol').val(response.data.currency_symbol);
			$('#kt_modal_box').modal('toggle');
		}
  	}
	
  	// DELETE
	function deleteThis(item_id = ''){
		if(confirm("{{trans('common.delete_confirm')}}")){
			var data = new FormData();
			data.append('item_id', item_id);
			data.append('type', 'country');
			var response = adminAjax('{{route("ajax.location.delete")}}', data);
			if(response.status == '200'){
				swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
				setTimeout(function(){ location.reload(); }, 2000)
			}
		}
	}
</script>
@endsection