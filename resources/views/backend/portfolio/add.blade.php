@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Create Portfolio</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('portfolio.index') }}" class="text-muted text-hover-primary">Portfolio</a></li>
					
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
						<!-- <div class="row">
							<div class="col col-md-3">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Select Topic</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the location where need to place this slider."></i>
									</label>
									<select id="topic" class="form-select form-select-solid lh-1 py-3">
										<option value="">Select</option>
										@foreach($topics as $list)
										<option value="{{$list->id}}">{{$list->title}}</option>
										@endforeach
									</select>
									<div class="validation-div" id="val-topic"></div>
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col col col-md-4">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Title</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the title here."></i>
									</label>
									<input type="text" class="form-control form-control-solid" id="title"/>
									<div class="validation-div" id="val-title"></div>
								</div>
							</div>
							<div class="col col-md-2">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Priority</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ex. 0 - 100"></i>
									</label>
									<input type="number" class="form-control form-control-solid" id="priority"/>
									<div class="validation-div" id="val-priority"></div>
								</div>
							</div>
						</div>

						
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="description" class="">Description</label>
									<textarea id="description"  rows="4" class="form-control"></textarea>
									<div class="validation-div" id="val-description"></div>
								</div>
								
							</div>
						</div>
						
						<div class="row">
							<div class="col col col-md-9">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<button type="button" name="add" id="add">Add Other Portfolio</button>
									</label>
									<div id="dynamic_field"></div>
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
											</select>
											<div class="validation-div" id="val-status"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						

						<div class="separator mb-6"></div>
						<div class="d-flex justify-content-end">
							<a class="btn btn-light me-3" href="{{route('faqs.index')}}">Cancel</a>
							<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
								<span class="indicator-label">Save</span>
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
<script>
	$(document).ready(function() {
    var i=1; 
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<div class="appendrows"  id="row'+i+'"><label class="appendrow" for="member_'+ i +'">'+ i +'</label><input type="file" class="form-control form-control-solid" name="member_image[]"  id="member_image"><input type="text" class="form-control form-control-solid" name="member_title[]" value=""><textarea class="form-control portfoliodetail_desc" id="portfoliodetail_desc"></textarea><button type="button" class="btn btn-danger btn_remove" name="remove" id="'+ i +'">X</button></div>')
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});
	// CREATE
	function saveData(){
		var data = new FormData();
		data.append('topic', $('#topic').val());
		data.append('title', $('#title').val());
		data.append('priority', $('#priority').val());
		data.append('description', $('#description').val());
		data.append('status', $('#status').val());
		var i = 1;
		$("input[name='member_image[]']").each(function(){
			data.append('file[]',jQuery(this)[0].files[0] );
			i++;
		});
		var x = 1;
		$("input[name='member_title[]']").each(function(){
			data.append('image_title[]',$(this).val());
			x++;
		});
		$(".portfoliodetail_desc").each(function(){
			data.append('description_detail[]',$(this).val());
			x++;
		});
		
		var response = adminAjax('{{route("ajax.store.portfolio")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ window.location.href = "{{route('portfolio.index')}}"; }, 2000);
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
@section('css')
<style>
.appendrows{
		display:flex;
	}	
	</style>
@endsection