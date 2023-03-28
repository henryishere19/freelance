@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit Section</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('faqs.index') }}" class="text-muted text-hover-primary">FAQs</a></li>
					
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
									<input type="text" class="form-control form-control-solid" id="title" value="{{$data->title}}"/>
									<div class="validation-div" id="val-title"></div>
								</div>
							</div>
							
							<div class="col col-md-2">
								<div class="fv-row mb-7">
									<label class="fs-6 fw-bold form-label mt-3">
										<span class="required">Priority</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ex. 0 - 100"></i>
									</label>
									<input type="number" class="form-control form-control-solid" id="priority" value="{{$data->priority}}"/>
									<div class="validation-div" id="val-priority"></div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									<label for="description" class="">Description</label>
									<textarea id="description"  rows="4" class="form-control">{{$data->description}}</textarea>
									<div class="validation-div" id="val-description"></div>
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
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="description" class="">Image</label>
									<input type="file" class="form-control form-control-solid" id="image"/>
									<img src="{{asset('uploads')}}/{{$data->image}}" height="80" width="80">
									<div class="validation-div" id="val-image"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="description" class="">Image 2</label>
									<input type="file" class="form-control form-control-solid" id="imagesecond"/>
									<img src="{{asset('uploads')}}/{{$data->image_second}}" height="80" width="80">
									<div class="validation-div" id="val-image"></div>
								</div>
							</div>
						</div>
						<div class="separator mb-6"></div>
						<div class="d-flex justify-content-end">
							<a class="btn btn-light me-3" href="{{route('ajax.setionindex.index')}}">Cancel</a>
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
		plugins: 'code table image paste',
		toolbar: 'undo redo | table image alignleft aligncenter alignright alignjustify code',
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
	});
	$("#image").change(function() {
			readURL(this);
		});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				jQuery('#image-src').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	// CREATE
	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		data.append('priority', $('#priority').val());
		data.append('description',tinyMCE.get('description').getContent());
		data.append('image',jQuery('#image')[0].files[0]);
		data.append('imagesecond',jQuery('#imagesecond')[0].files[0]);
		data.append('status', $('#status').val());
		var response = adminAjax('{{route("ajax.easier.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000);
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