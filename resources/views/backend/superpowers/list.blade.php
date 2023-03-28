@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Superpowers</h1>
			</div>
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!-- <div class="m-0">
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
									<select id="status" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6244763d93048" data-allow-clear="true">
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
				</div> -->
				<a href="{{ route('ajax.superpowers.create') }}" class="btn btn-sm btn-primary">Create</a>
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
							<th class="min-w-30px"> Sl No</th>
								<th class="min-w-200px">Title</th>
								<th class="min-w-200px">Priority</th>
								<th class="min-w-80px">Status</th>
								<th class="min-w-80px text-end">Actions</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
	$(document).ready(function(e) {
	});
	
	$(function () {
		var i = 1;
		var table = $('.data-tbl').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{route('ajax.instiveindex.list')}}",
				method: "POST",
				"data" : {
					"_token": "{{ csrf_token() }}",
				}
			},
			columns: [
				{"render": function() {return i++;}},
				{data: 'title', name: 'title'},
				{data: 'priority', name: 'priority'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
	});
	
	// DELETE
	function deleteThis(item_id = ''){
		if(confirm("{{trans('common.delete_confirm')}}")){
			var data = new FormData();
			data.append('item_id', item_id);
			var response = adminAjax('{{route("ajax.instiveindex.delete")}}', data);
			if(response.status == '200'){
				location.reload();
			}else if(response.status == '201'){
				swal.fire({title: response.message,type: 'error'});
			}
		}
	}
</script>
@endsection