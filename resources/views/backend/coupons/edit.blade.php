@extends('layouts.backend.master')

@section('content')
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
					<div class="page-title-head center-elem">
						<span class="d-inline-block pr-2"><i class="lnr-apartment opacity-6"></i></span>
						<span class="d-inline-block">{{ trans('category.update') }}</span>
					</div>
				</div>
			</div>
			<div class="page-title-actions">
				<div class="page-title-subheading opacity-10">
					<nav class="" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i aria-hidden="true" class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"> <a  href="{{ route('category.list',[$module]) }}">{{ trans('category.singular') }}</a></li>
							<li class="active breadcrumb-item" aria-current="page">{{ trans('category.add') }}</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<!-- CONTENT START -->
	<div class="main-card mb-3 card">
		<div class="card-body">
			<form class="" action="javascript:void(0);" onsubmit="saveData()">
				<input name="_method" type="hidden" value="PUT">
				@foreach(config('app.locales') as $lk=>$lv)
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								<label for="title_{{$lk}}" class="">{{ trans('category.title') }}</label>
								<input type="text" id="title_{{$lk}}" value="{{$data->translate($lk)->title}}" placeholder="{{ trans('category.title_'.$lk) }}" class="form-control">
								<div class="validation-div" id="val-title_{{$lk}}"></div>
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
								<label for="description_{{$lk}}" class="">{{ trans('category.description') }}</label>
								<textarea  name="description_{{$lk}}" id="description_{{$lk}}"  rows="4" class="form-control"> {{$data->translate($lk)->description}}</textarea>
								<div class="validation-div" id="val-description_{{$lk}}"></div>
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
				@endforeach
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
		data.append('title_en', $('#title_en').val());
		data.append('description_en', $('#description_en').val());
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