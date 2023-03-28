@extends('layouts.backend.master')

@section('popup')
	<!--begin::Modal - Add New-->
	<div class="modal fade" id="app-modalBox" tabindex="-1" aria-hidden="true">
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
				
				<div id="app-modalBody" class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
				
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="saveModalBox()">Save changes</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit Slider</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('sliders.index') }}" class="text-muted text-hover-primary">Sliders</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-dark">Edit</li>
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
					<div class="row">
						<div class="col col col-md-4">
							<div class="fv-row mb-7">
								<label class="fs-6 fw-bold form-label mt-3">
									<span class="required">Title</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the title here."></i>
								</label>
								<input type="text" class="form-control form-control-solid" id="title" value="{{ $data->title }}"/>
								<div class="validation-div" id="val-title"></div>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="fv-row mb-7">
								<label class="fs-6 fw-bold form-label mt-3">
									<span class="required">Location (slug)</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Location where need to place this slider."></i>
								</label>
								<input type="text" class="form-control form-control-solid" id="slug" value="{{ $data->slug }}" disabled />
								<div class="validation-div" id="val-slug"></div>
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
											<option value="active" @if($data->status == 'active') selected @endif>{{trans('common.active')}}</option>
											<option value="inactive" @if($data->status == 'inactive') selected @endif>{{trans('common.inactive')}}</option>
										</select>
										<div class="validation-div" id="val-status"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<br>
					<br>
					<div class="row g-10">
						<div class="col-md-12">
							<h5>Add Slide <a class="btn-shadow-primary btn btn-secondary btn-sm text-white" onclick="openPopUpBox()"><i class="bi bi-plus"></i></a></h5>
							<input type="hidden" id="app-modal-btn" data-toggle="modal"data-target="#app-modalBox" value="Open Model"/>
							<hr>
						</div>
						
						@if(count($slides) > 0)
						<?php $x=1; ?>
						@foreach($slides as $list)
						<?php
							if(isset($list->video) && $list->video != "")
							{
								$imge =asset(Config::get('constants.DEFAULT_VIDEO'));
							}
							elseif(isset($list->video_mobile) && $list->video_mobile != ""){
								$imge = asset(Config::get('constants.DEFAULT_VIDEO'));
							}
							elseif(isset($list->image) && $list->image != ""){
								$imge = asset($list->image);
							}
							else
							{
								$imge =asset(Config::get('constants.DEFAULT_VIDEO'));
							}
							?>
						<div class="col-md-3">
							<div class="overlay mt-8">
								<h2>slide <?php echo $x; ?></h2>
								<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-150px" style='background-image:url("{{$imge}}")'></div>
								<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
									<a href="javascript:void(0);" onclick="openPopUpBox({{ $list->id }})" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
									<a href="javascript:void(0);" onclick="deleteSlide({{ $list->id }})" class="btn btn-sm btn-danger ms-3"><i class="bi bi-trash-fill text-white"></i></a>
								</div>
							</div>
						</div>
						<?php $x++; ?>
						@endforeach
						@endif
					</div>
					
					<div class="separator mb-6"></div>
					<div class="d-flex justify-content-end">
						<a class="btn btn-light me-3" href="{{route('sliders.index')}}">Cancel</a>
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
	
// 	$('#is_imgvid').on('change', function() {
//   alert( this.value );
// });

$(document).ready(function(){
	$("#displayvideo").hide();
	$("#displayimg").hide();
})

function getval(sel)
{
	if(sel.value == "Image")
	{
		$("#displayimg").show();
		$("#displayvideo").hide();
	}
	else if(sel.value == "Video")
	{
		$("#displayimg").hide();
		$("#displayvideo").show();
	}
	else
	{
		$("#displayvideo").hide();
		$("#displayimg").hide();
	}
}
function getvalmobile(sel){
	if(sel.value == "Image")
	{
		$("#displayimgmobile").show();
		$("#displayvideomobile").hide();
	}
	else if(sel.value == "Video")
	{
		$("#displayimgmobile").hide();
		$("#displayvideomobile").show();
	}
	else
	{
		$("#displayimgmobile").hide();
		$("#displayvideomobile").hide();
	}
}
	// CREATE
	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('slug', $('#slug').val());
		data.append('title', $('#title').val());
		data.append('status', $('#status').val());
		var response = adminAjax('{{route("sliders.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ window.location.href = "{{route('sliders.index')}}"; }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Open Model
	function openPopUpBox(item_id = ''){
		var data = new FormData();
		data.append('item_id', item_id);
		var response = adminAjax('{{route("ajax.slider.open.slide.box")}}', data);
		if(response.status == '200'){
			if(response.data){
				$('#app-modalBody').html(response.data);
				$( "#app-modalBox" ).modal( "toggle" );
				return false;
			}
		}
		swal.fire({title: response.message,type: 'error'});
	}
	
	// Save Model Data
	function saveModalBox(){
		var data = new FormData();
		data.append('item_id', $('#app-modalBody #item_id').val());
		data.append('slider_id', '{{$data->id}}');
		data.append('title', $('#app-modalBody #title').val());
		data.append('priority', $('#app-modalBody #priority').val());
		data.append('description', $('#app-modalBody #description').val());
		data.append('image', $('#image')[0].files[0]);
		data.append('video', $('#video')[0].files[0]);
		data.append('imagedestop', $('#imagedestop')[0].files[0]);
		data.append('videodestop', $('#videodestop')[0].files[0]);
		data.append('video', $('#video')[0].files[0]);
		data.append('is_clickable', $('#app-modalBody #is_clickable').val());
		data.append('button_url', $('#app-modalBody #button_url').val());
		data.append('redirect_to', $('#app-modalBody #redirect_to').val());
		//data.append('button_text', $('#button_text').val());
		var response = adminAjax('{{route("ajax.slider.store.slide")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#app-modalBody #val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Save Model Data
	function deleteSlide(item_id = ''){
		var data = new FormData();
		data.append('item_id', item_id);
		var response = adminAjax('{{route("ajax.delete.slide")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
function is_clickable(){
	if($('#is_clickable option:selected').val() == "Yes")
	{
		$('#redirect_content').show();
	}
	else{
		$('#redirect_content').hide();
	}
}
	
</script>
@endsection