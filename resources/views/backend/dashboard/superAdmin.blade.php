@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div id="kt_content_container" class="container-xxl">
		<div class="row gy-5 g-xl-8">
			<div class="col-xl-12">
				<div class="card card-xxl-stretch mb-5 mb-xl-8">
					<div class="card-header border-0 pt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder fs-3 mb-1">Latest Blog</span>
						</h3>
						<div class="card-toolbar">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1 active" data-bs-toggle="tab" href="javascript:void(0);" onclick="getData('month')">Month</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1" data-bs-toggle="tab" href="javascript:void(0);" onclick="getData('week')">Week</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4" data-bs-toggle="tab" href="javascript:void(0);" onclick="getData('day')">Day</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body py-3">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
								<div class="table-responsive">
									<table class="table data-tbl table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<thead>
											<tr class="fw-bolder text-muted">
												<th class="min-w-30px">SL No</th>
												<th class="min-w-80px">Image</th>
												<th>Title</th>
												<th>Created at</th>
												<th>Category</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
	$(document).ready(function(){
		getData('month');
	});
	
	// Get Data
	function getData(type = ''){
		var i = 1;
		var table = $('.data-tbl').DataTable({
				destroy: true,
				ajax: {
					url: "{{route('ajax.post.list')}}",
					method: "POST",
					"data" : {
						"_token": "{{ csrf_token() }}",
						"role" : "Customer",
						"type" : type,
						//"orderper":$('#gettypeorder .active').data('getorderdata'),
					}
				},
				columns: [
					{
				"render": function() {
                        return i++;
                    }
                },
				{data: 'image', name: 'image'},
					{data: 'title', name: 'title'},
					{data: 'created_at', name: 'created_at'},
					{data: 'category', name: 'category'},
				]
			});
	}
</script>
@endsection