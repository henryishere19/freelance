@extends('layouts.backend.master')
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
	

	<!-- CONTENT START -->
	<div id="kt_content_container" class="container-xxl">
		<div class="card card-flush h-lg-100" id="kt_contacts_main">
			<div class="card-body pt-5">
				<form class="" action="javascript:void(0);" onsubmit="saveData()">
					<input name="_method" type="hidden" value="PUT">
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="title" class="">{{ trans('category.title') }}</label>
									<input type="text" id="title" value="{{$data->title}}" placeholder="" class="form-control">
									<div class="validation-div" id="val-title"></div>
									{{$data->title}}
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									<label for="priority" class="">{{ trans('category.priority') }}</label>
									<input type="number" id="priority" value="{{$data->priority}}" placeholder="{{ trans('category.placeholder.enter_priority') }}" class="form-control">
									<div class="validation-div" id="val-priority"></div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									<label for="description" class="">{{ trans('category.description') }}</label>
									<textarea  name="description" id="description"  rows="4" class="form-control"> {{$data->description}}</textarea>
									<div class="validation-div" id="val-description"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="position-relative form-group">
									<label for="image" class="">{{ trans('common.image') }}</label>
									<input type="file" id="image" placeholder="Choose Image" class="form-control" autocomplete="off">
									<img id="image-view" src="@if($data->image) {{asset($data->image)}} @endif" style="max-height: 180px;"/>
									<small class="form-text text-muted">Max size 300 KB</small>
									<div class="validation-div" id="val-image"></div>
								</div>
							</div>
						</div>
					<div class="form-row">
						<div class="col-md-2">
						<div class="form-group">
							<label for="status" class="content-label">{{trans('common.status')}}</label>
							<select class="form-control" name="status" id="status" required>
								<option value="active" 
								@if($data->status == 'active') selected @endif>
								{{trans('common.active')}}
								</option>
								<option value="inactive" 
								@if($data->status == 'inactive') selected @endif>
								{{trans('common.inactive')}}
								</option>
							</select>
						</div>
						</div>    
					</div>
					<div class="form-row">
					<button class="mt-2 btn btn-primary">{{ trans('common.submit') }}</button>
				</form>
				</div>
	</div>
</div>
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
		data.append('module', '{{$data->module}}');
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		data.append('description', $('#description').val());
		data.append('priority', $('#priority').val());
		data.append('status', $('#status').val());
		data.append('image', jQuery('#image')[0].files[0]);
		var response = adminAjax('{{route("category.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000)
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
		}
	}
</script>
@endsection