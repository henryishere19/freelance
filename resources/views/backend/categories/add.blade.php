@extends('layouts.backend.master')
@section('css')
@endsection  
@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Create Section</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('ajax.setionindex.index') }}" class="text-muted text-hover-primary">Section</a></li>
					
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
			<form class="" action="javascript:void(0);" onsubmit="saveData()"  enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								<label for="title" class="">{{ trans('category.title') }}</label>
								<input type="text" id="title" value="" placeholder="Enter Title" class="form-control">
								<div class="validation-div" id="val-title"></div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="position-relative form-group">
								<label for="priority" class="">{{ trans('category.priority') }}</label>
								<input type="number" id="priority" placeholder="{{ trans('category.placeholder.enter_priority') }}" class="form-control">
								<div class="validation-div" id="val-priority"></div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								<label for="description" class="">{{ trans('category.description') }}</label>
								<textarea  name="description" id="description"  rows="4" class="form-control"></textarea>
								<div class="validation-div" id="val-description"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="position-relative form-group">
								<label for="image" class="">{{ trans('common.image') }}</label>
								<input type="file" id="image" placeholder="Choose Image" class="form-control" autocomplete="off">
								<img id="image-view" style="max-height: 180px;" />
								<small class="form-text text-muted">Max size 300 KB</small>
								<div class="validation-div" id="val-image"></div>
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
											</select>
											<div class="validation-div" id="val-status"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="form-row">
					<button class="mt-2 btn btn-primary">{{ trans('common.submit') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<!-- <div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
					<div class="page-title-head center-elem">
						<span class="d-inline-block pr-2"><i class="lnr-apartment opacity-6"></i></span>
						<span class="d-inline-block">{{ trans('category.add') }}</span>
					</div>
				</div>
			</div>
			<div class="page-title-actions">
				<div class="page-title-subheading opacity-10">
					<nav class="" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i aria-hidden="true" class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"> <a  href="{{ route('category.list',[$module]) }}">{{ trans('category.singular') }}</a></li>
							<li class="active breadcrumb-item" aria-current="page">Add New</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div> -->

	<!-- CONTENT START -->
	<!-- <div class="main-card mb-3 card">
		<div class="card-body">
			<form class="" action="javascript:void(0);" onsubmit="saveData()"  enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								<label for="title" class="">{{ trans('category.title') }}</label>
								<input type="text" id="title" value="" placeholder="Enter Title" class="form-control">
								<div class="validation-div" id="val-title"></div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="position-relative form-group">
								<label for="priority" class="">{{ trans('category.priority') }}</label>
								<input type="number" id="priority" placeholder="{{ trans('category.placeholder.enter_priority') }}" class="form-control">
								<div class="validation-div" id="val-priority"></div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								<label for="description" class="">{{ trans('category.description') }}</label>
								<textarea  name="description" id="description"  rows="4" class="form-control"></textarea>
								<div class="validation-div" id="val-description"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="position-relative form-group">
								<label for="image" class="">{{ trans('common.image') }}</label>
								<input type="file" id="image" placeholder="Choose Image" class="form-control" autocomplete="off">
								<img id="image-view" style="max-height: 180px;" />
								<small class="form-text text-muted">Max size 300 KB</small>
								<div class="validation-div" id="val-image"></div>
							</div>
						</div>
					</div>
				<div class="form-row">
					<button class="mt-2 btn btn-primary">{{ trans('common.submit') }}</button>
				</div>
			</form>
		</div>
	</div> -->
	<!-- CONTENT OVER -->
@endsection

@section('js')
	<script>

        $(document).ready(function(e) {
            $("#image").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    jQuery('#image-view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
		
		// CREATE
		function saveData(){
			var data = new FormData();
			data.append('module', '{{$module}}');
			data.append('title', $('#title').val());
			data.append('description', $('#description').val());
			data.append('priority', $('#priority').val());
			data.append('status', $('#status').val());
			data.append('image', jQuery('#image')[0].files[0]);
			var response = adminAjax('{{route("category.store")}}', data);
			if(response.status == '200'){
				swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
				setTimeout(function(){ window.location.href = "{{route('category.list', [$module])}}" }, 2000);
			}else if(response.status == '422'){
				$('.validation-div').text('');
				$.each(response.error, function( index, value ) {
					$('#val-'+index).text(value);
				});
			}
		}
	</script>
@endsection