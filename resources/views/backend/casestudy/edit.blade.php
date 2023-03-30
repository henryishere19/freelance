@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Case Study</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('admin.casestudy.index') }}" class="text-muted text-hover-primary">Case Study</a></li>
					
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
					<form id="kt_ecommerce_settings_general_form" class="form" method="post" action="javascript:void(0);" onsubmit="saveData()";>
						<div class="row">
							<div class="col col col-md-4">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Title</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the title here."></i>
									</label>
									<input type="text" class="form-control form-control-solid" id="title" value="{{$data->title}}"/>
									<div class="validation-div" id="val-title"></div>
								</div>
							</div>
						</div>
						<div class="row blogDiv">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="short_description" class=""> Short Description</label>
									<textarea id="short_description"  rows="4" class="form-control">{{$data->short_description}}</textarea>
									<div class="validation-div" id="val-short_description"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label class="form-label">Select Showing Content</label>
								<select class="form-select mb-2" id="select_content_or_blog" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
									<option value="blog" @if($data->show_content == 'blog') selected="" @endif>Editor</option>
									<option value="file" @if($data->show_content == 'file') selected="" @endif>File</option>
								</select>
							</div>
							@if(!empty($services))
								<div class="col-md-6">
									<label class="form-label">Service</label>
									<select class="form-select mb-2" id="service" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
										@foreach($services as $key => $val)
											<option @if($data->services_id == $val->id) selected="" @endif value="{{$val->id}}">{{$val->slug}}</option>
										@endforeach
									</select>
									<!-- <div class="text-muted fs-7">Set a description for better visibility.</div> -->
								</div>
							@endif
							
						</div>
						<div class="row blogDiv">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="description" class="">Description</label>
									<textarea id="description"  rows="4" class="form-control">{{ $data->description }}</textarea>
									<div class="validation-div" id="val-description"></div>
								</div>
							</div>
						</div>
						<div class="row pdfDiv">
							<div class="col-md-6">
								<div class="card card-flush py-4">
									<div class="card-header" style="padding: 0px;">
										<div class="card-title"><h2> FIle</h2></div>
										<input type="file" id="fileupload" class="form-control">
										<div class="validation-div" id="val-fileupload"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card card-flush py-4">
									<div class="card-header" style="padding: 0px;">
										<div class="card-title"><h2> Images</h2></div>
										<input type="file" id="image" class="form-control">
										<img id="image-src" src="{{asset($data->image)}}" height="120"width="120px">
										<div class="validation-div" id="val-image"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card card-flush py-4">
									<div class="card-header" style="padding: 0px;">
										<div class="card-title"><h2> Post Date</h2></div>
										<input type="date" value="{{$data->post_date}}" id="post_date" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card card-flush py-4">
									<div class="card-header" style="padding: 0px;">
										<div class="card-title"><h2> Header Images</h2></div>
										<input type="file" id="image_header" class="form-control">
										<img id="image-src-header" src="{{asset($data->image_header)}}" height="120"width="120px">
										<div class="validation-div" id="val-image_header"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card card-flush py-4">
									<div class="card-header" style="padding: 0px;">
										<div class="card-title"><h2> Post Author</h2></div>
										<input type="text" id="post_author" value="{{$data->post_author}}" class="form-control">
										<div class="validation-div" id="val-post_author"></div>
									</div>
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
						
						<div class="separator mb-6"></div>
						<div class="d-flex justify-content-end">
							<a class="btn btn-light me-3" href="{{route('admin.casestudy.index')}}">Cancel</a>
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
<script src="https://cdn.tiny.cloud/1/344q5fi5mjmf6trdrw5naubzza7s17jt9k57e6s09dlpbl1u/tinymce/5/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: '#description',
		plugins: 'save code table image paste',
		toolbar: 'save undo redo | table image alignleft aligncenter alignright alignjustify code',
		save_enablewhendirty: true,
		toolbar_drawer: 'floating',
		tinycomments_mode: 'embedded',
		height : '580',
		oninit : 'setPlainText',
		images_upload_handler: function (blobInfo, success, failure) {
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'adminApis/save_media');
			xhr.onload = function() {
				var json;
				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}
			
				json = JSON.parse(xhr.responseText);
			
				if (!json || typeof json.details != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}
				//success('https://www.codefencers.com/media/' + json.details);
			};
			formData = new FormData();
			formData.append('media', blobInfo.blob(), blobInfo.filename());
			xhr.send(formData);
		},
		init_instance_callback : function(editor) {
			var freeTiny = document.querySelector('.tox .tox-notification--in');
			freeTiny.style.display = 'none';
		},
		setup : function(ed) {
			ed.on("change", function(e){
				$('#description').html(tinymce.activeEditor.getContent());
			});
			ed.on("keyup", function(){
				$('#description').html(tinymce.activeEditor.getContent());
			})
		}
	});
	// tinyMCE.triggerSave();
	// tinyMCE.activeEditor.execCommand('mceSave');
	

	$("#image").change(function() {
			readURL(this);
		});
		$("#image_header").change(function() {
			readURLHeader(this);
		});
	// CREATE
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				jQuery('#image-src').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	function readURLHeader(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				jQuery('#image-src-header').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		// data.append('type', $('#pageselect option:selected').val());
		// data.append('link', $('#pageselectss option:selected').val());
		// data.append('page_for', $('#pagefor option:selected').val());
		data.append('image', jQuery('#image')[0].files[0]);
		data.append('fileupload', jQuery('#fileupload')[0].files[0]);
		data.append('description', $('#description').val());
		data.append('select_content_or_blog', $('#select_content_or_blog').val());
		data.append('service', $('#service').val());
		data.append('post_date', $('#post_date').val());
		data.append('post_author', $('#post_author').val());
		data.append('short_description', $('#short_description').val());
		data.append('image_header', jQuery('#image_header')[0].files[0]);
		
		
		// data.append('links', $('#customelink').val());
		data.append('status', $('#status').val());
		var response = adminAjax('{{route("admin.casestudy.update")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ window.location.replace("{{route('admin.casestudy.index')}}") }, 2000);
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
	
	<script>
	// $('.pagelink').hide();
	// $('#pageselect').on('change',function(){
	// 	if($(this).val() == "cusomlink")
	// 	{
	// 		$('.linkcustome').show();
	// 		$('.pagelink').hide();
	// 	}
	// 	else if($(this).val() == "page"){
	// 		$('.pagelink').show();
	// 		$('.linkcustome').hide();
	// 	}
	// 	else{
	// 		$('.linkcustome').hide();
	// $('.pagelink').hide();
	// 	}
	// 	console.log();
	// })
	// Save File
	function saveFile(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('file', file);
		var response = adminAjax('{{route("ajax.product.save.gallery")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			if(response.data.media){
				$('#gallery-list').append('<div class="gallery-img me-3 mt-5"><img src="'+ response.data.media +'" class="" alt=""></div>');
			}
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}

	
		if('{{$data->show_content}}' == "file"){
			$('.pdfDiv').show();
			$('.blogDiv').hide();
		}else{
			$('.blogDiv').show();
			$('.pdfDiv').hide();
		}
	
	$('#select_content_or_blog').on('load change select',function(){
		if($(this).val() == "file"){
			$('.pdfDiv').show();
			$('.blogDiv').hide();
		}else{
			$('.blogDiv').show();
			$('.pdfDiv').hide();
		}
	});
	
</script>
@endsection