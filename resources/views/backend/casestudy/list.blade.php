@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Case Study</h1>
			</div>
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<a href="{{ route('admin.casestudy.add') }}" class="btn btn-sm btn-primary">Create</a>
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
								<th class="min-w-80px">Image</th>
								<th class="min-w-200px">Title</th>
								<th class="min-w-200px">Page Service</th>
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
				url: "{{route('admin.casestudy.list')}}",
				method: "POST",
				"data" : {
					"_token": "{{ csrf_token() }}",
				}
			},
			columns: [
				{"render": function() {return i++;}},
				
				{data: 'image', name: 'image'},
				{data: 'title', name: 'title'},
				{data: 'service_name', name: 'service_name'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
	});
	
	// DELETE
	function deleteThis(item_id = ''){
		if(confirm("{{trans('common.delete_confirm')}}")){
			var data = new FormData();
			data.append('item_id', item_id);
			var response = adminAjax('{{route("admin.casestudy.delete")}}', data);
			if(response.status == '200'){
				location.reload();
			}else if(response.status == '201'){
				swal.fire({title: response.message,type: 'error'});
			}
		}
	}
</script>
@endsection