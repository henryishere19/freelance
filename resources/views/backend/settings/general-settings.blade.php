@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">General Settings</h1>
			</div>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a></li>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<li class="breadcrumb-item text-muted">General Settings</li>
			</ul>
		</div>
	</div>
@endsection

@section('content')
	<!-- CONTENT START -->
	<div class="main-card mb-3 card">
		<div class="card-header-tab card-header">
			<div class="card-header-title font-size-lg text-capitalize font-weight-normal">{{trans('setting.information')}}</div>
			<div class="btn-actions-pane-right text-capitalize">
				<!--<a class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm" href="">{{trans('order.add')}}</a>-->
			</div>
		</div>
		<div class="card-body">
			<form id="save-general-settings" action="javascript:void(0);" onsubmit="saveSettings()">
				@if($data)
				@foreach($data as $row)
				<div class="position-relative row form-group">
					<label for="exampleEmail" class="col-sm-3 col-form-label">{{ trans('setting.'.$row->name) }}</label>
					<div class="col-sm-9">
						<input type="text" id="{{ $row->name }}" class="form-control" value="{{ $row->value }}"/>
						<div class="validation-div" id="val-{{ $row->name }}"></div>
					</div>
				</div>
				@endforeach
				<button type="submit" class="mt-2 btn btn-primary">{{ trans('common.submit') }}</button>
				@endif
			</form>
		</div>
	</div>
	
	<div class="main-card mb-3 card">
		<div class="card-header-tab card-header">
			<div class="card-header-title font-size-lg text-capitalize font-weight-normal">{{trans('setting.logo')}}</div>
		</div>
		<div class="card-body">
			<form id="save-qr-code" action="javascript:void(0);" onsubmit="saveLogo()">
				<div class="box-header with-border">
					<div class="col-sm-10">
						<img id="logo-image-view" style="max-height: 180px;" src="@if(Settings::get('logo')){{ asset(Settings::get('logo')) }} @endif"/>
						<input name="file" id="logo-image" type="file" class="form-control-file">
						<small class="form-text text-muted">Max size 300 KB</small>
					</div>
				</div>
				<br>
				<br>
				<br>
				<button type="submit" class="mt-2 btn btn-primary">{{ trans('setting.save_logo') }}</button>
			</form>
		</div>
	</div>
	<!-- CONTENT OVER -->
@endsection

@section('js')
<script>
	// SAVE
  	function saveSettings(){
		var data = new FormData();
		@if($data)
		@foreach($data as $row)
		data.append('{{ $row->name }}', $('#{{ $row->name }}').val());
		@endforeach
		@endif
		var response = adminAjax('{{route("ajax.store.general-settings")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			setTimeout(function(){ location.reload(); }, 2000)
			
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
	$(document).ready(function(e) {
		$("#logo-image").change(function () {
			readURL(this);
		});
	});
	
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				jQuery('#logo-image-view').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
		
	function saveLogo(){
		var data = new FormData();
		data.append('logo', jQuery('#logo-image')[0].files[0]);
		var response = adminAjax('{{route("ajax.store.logo")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		} else{
			swal.fire({title: response.message,type: 'error'});
		}
	}
</script>
@endsection