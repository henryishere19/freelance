@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit {{$post_type}}</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{ trans('common.dashboard') }}</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('page.post.management', [$post_type]) }}" class="text-muted text-hover-primary">{{$post_type}}</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-dark">{{ trans('common.edit') }}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<div id="kt_app_content_container" class="app-container container-xxl">
			<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="javascript:void(0);" onsubmit="saveData();">
				<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Thumbnail</h2></div>
						</div>
						<div class="card-body text-center pt-0">
							@if($data->image)
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset($data->image) }}');" data-kt-image-input="true">
							@else
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset('default/default-product.svg') }}');" data-kt-image-input="true">
							@endif
								<div class="image-input-wrapper w-150px h-150px"></div>
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<input type="file" id="image" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
								</label>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"><i class="bi bi-x fs-2"></i></span>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"><i class="bi bi-x fs-2"></i></span>
							</div>
							<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						</div>
					</div>

					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Banner</h2></div>
						</div>
						<div class="card-body text-center pt-0">
							@if($data->banner_image)
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset($data->image) }}');" data-kt-image-input="true">
							@else
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset('default/default-product.svg') }}');" data-kt-image-input="true">
							@endif
								<div class="image-input-wrapper w-150px h-150px"></div>
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<input type="file" id="banner_image" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
								</label>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"><i class="bi bi-x fs-2"></i></span>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"><i class="bi bi-x fs-2"></i></span>
							</div>
							<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						</div>
					</div>
					
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Status</h2></div>
						</div>
						<div class="card-body pt-0">
							<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="status">
								<option></option>
								<option value="active" @if($data->status == 'active') selected="selected" @endif>Active</option>
								<option value="draft" @if($data->status == 'draft') selected="selected" @endif>Draft</option>
								<option value="inactive" @if($data->status == 'inactive') selected="selected" @endif>Inactive</option>
							</select>
							<div class="text-muted fs-7">Set the product status.</div>
						</div>
						<div class="card-header">
							<div class="card-title"><h2>Post Date</h2></div>
						</div>
						
						<div class="card-body pt-0">
							<input type="date" class="form-control mb-2" id="post_date" placeholder="Enter post_date" value="{{ $data->post_date }}"/>
							<div class="text-muted fs-7">Set the postdate.</div>
						</div>
						<div class="card-header">
							<div class="card-title"><h2>Post Author</h2></div>
						</div>
						
						<div class="card-body pt-0">
								<input type="text"  class="form-control mb-2" id="author" placeholder="Enter Author" value="{{ $data->author }}"/>
							<div class="text-muted fs-7">Set the Author.</div>
						</div>
						
										
					</div>
					
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Blog Category</h2></div>
						</div>
						<div class="card-body pt-0">
							<select class="form-select mb-2" id="categselect" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
								
							</select>
							<div class="text-muted fs-7 mb-7">Add Blog to a category.</div>
							<a href="{{ route('category.list', ['Blog']) }}" target="_blank" class="btn btn-light-primary btn-sm mb-10"><i class="bi bi-plus fs-3"></i> Create new category</a>
							
							<!-- <label class="form-label d-block">Tags</label>
							<input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value=""/>
							<div class="text-muted fs-7">Add tags to a product.</div> -->
						</div>
					</div>
					
					<!-- <div class="card card-flush py-4"> -->
						<!-- <div class="card-header">
							<div class="card-title"><h2>Weekly Sales</h2></div>
						</div>
						<div class="card-body pt-0">
							<span class="text-muted">No data available. Sales data will begin capturing once product has been published.</span>
						</div> -->
					<!-- </div> -->
				</div>
				
				<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>General</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="mb-10 fv-row">
											<label class="required form-label">{{$post_type}} Title</label>
											<input type="text" class="form-control mb-2" id="title" placeholder="Enter title" value="{{ $data->title }}"/>
											<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
										</div>
										@if(!empty($services))
										<div>
											<label class="form-label">Service</label>
											<select class="form-select mb-2" id="service" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
												@foreach($services as $key => $val)
													<option value="{{$val->id}}">{{$val->slug}}</option>
												@endforeach
											</select>
											<!-- <div class="text-muted fs-7">Set a description for better visibility.</div> -->
										</div>
										@endif
										<div>
											<label class="form-label">Slug</label>
											<input type="text" disabled class="form-control mb-2" id="slug" placeholder="Enter slug" value="{{ $data->slug }}"/>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
									
										<div>
											<label class="form-label">Short Description</label>
											<textarea id="shortdescription" class="form-control">{{ $data->short_description }}</textarea>
										</div>
										<div>
											<label class="form-label">Description</label>
											<textarea id="description" class="min-h-200px mb-2">{{ $data->description }}</textarea>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Meta Options</h2></div>
									</div>
									<div class="card-body pt-0">
									<div class="mb-10">
											<label class="form-label">Meta Tag Title </label>
											<input type="text" class="form-control mb-2" id="page_title" name="page_title" value="{{ $data->page_title }}" placeholder="Meta tag name" />
											<div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
											<div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
										</div>
										<div class="mb-10">
											<label class="form-label">Page Title</label>
											<input type="text" class="form-control mb-2" id="seo_title" name="meta_title" value="{{ $data->post_seo_title }}" placeholder="Meta tag name" />
											<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
										</div>
										<div class="mb-10">
											<label class="form-label">Meta Tag Description</label>
											<textarea class="form-control" id="seo_description">{{$data->post_seo_description}}</textarea>
											<div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
											<div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
										</div>
										<div>
											<label class="form-label">Meta Tag Keywords</label>
											<input id="kt_ecommerce_add_product_meta_keywords" id="seo_keywords" value="{{ $data->post_seo_keywords }}"  name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
											<div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
											<code>,</code>between each keyword.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ ($post_type) ? route('page.post.management',$post_type) : route('products.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
						<button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
							<span class="indicator-label">Publish Changes</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection


@section('js')
<script src="https://cdn.tiny.cloud/1/344q5fi5mjmf6trdrw5naubzza7s17jt9k57e6s09dlpbl1u/tinymce/5/tinymce.min.js"></script>
<script>
	$(document).ready(function(e) {
		
		// Get Product Categories
		get_product_categories();
		
		$("#image").change(function() {
			readURL(this);
		});
		
		// For Discount
		

		// Product type on change
		
	});
	
	// Image View
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				jQuery('#image-src').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#title").keyup(function() {
  var Text = $(this).val();
  Text = Text.toLowerCase();
  Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
  $("#slug").val(Text);        
});
  	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		data.append('slug', $('#slug').val());
		data.append('post_type', "blog");
		data.append('category', $("#categselect").val());
		data.append('author', $("#author").val());
		data.append('description', tinyMCE.get('description').getContent());
		data.append('shortdescription', $('#shortdescription').val());
		data.append('image', jQuery('#image')[0].files[0]);
		data.append('banner_image', jQuery('#banner_image')[0].files[0]);
		data.append('status', $('#status').val());
		data.append('post_date', $('#post_date').val());
		data.append('seo_title', $('#seo_title').val());
		data.append('page_title', $('#page_title').val());
		data.append('seo_keywords', $('#seo_keywords').val());
		data.append('seo_description', $('#seo_description').val());
		data.append('service', $('#service').val());
		var response = adminAjax('{{route("ajax.post.store")}}', data);
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

	// Save Category
	function saveCategory(item_id = null, action = ''){
		var data = new FormData();
		data.append('item_id', item_id);
		data.append('action', action);
		data.append('product_id', '{{$data->id}}');
		var response = adminAjax('{{route("ajax.product.save.category")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Save Attribute
	function saveAttribute(item_id = null){
		var data = new FormData();
		data.append('item_id', item_id);
		data.append('product_id', '{{$data->id}}');
		var response = adminAjax('{{route("ajax.product.save.attribute")}}', data);
		if(response.status == '200'){
			//swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Save Variations
	function saveVariation(variation_id = ''){
		
		var price = $("#var-"+ variation_id +" input[name=price]").val();
		var sale_price = $("#var-"+ variation_id +" input[name=sale_price]").val();
		
		if(sale_price >= price){
			alert('Saling price < Price'); return false;
		}
		
		var data = new FormData();
		data.append('product_id', '{{$data->id}}');
		data.append('variation_id', variation_id);
		data.append('price', price);
		data.append('sale_price', sale_price);
		var response = adminAjax('{{route("ajax.product.save.variation")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Get Product Categories
	function get_product_categories(){
		var data = new FormData();
		data.append('product_id', '{{$data->id}}');
		data.append('modeule', 'Blog');
		var response = adminAjax('{{route("ajax.post.category.list")}}', data);
		if(response.status == '200'){
			if(response.data.length > 0){
				var myarray = "[{{$data->category}}]";
				console.log(myarray);
				parsedTest = JSON.parse(myarray);
				console.log(parsedTest);
				$.each(response.data, function( index, value ) {
					if(jQuery.inArray(value.id, parsedTest) != -1) {
						$("#categselect").append('<option value=' + value.id + ' selected>' + value.title + '</option>');
					} else {
						$("#categselect").append('<option value=' + value.id + '>' + value.title + '</option>');
					}

					
				})
			}
		}
	}
	
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
</script>

<!-- FOR EDITOR ONLY -->
<script type="text/javascript">
	tinymce.init({
        selector:'#description',
        height: 580,
		width:680,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help codesample'
        ],

        image_title : true,
        automatic_uploads: true,
        images_upload_url : '/adminApis/save_media',
        file_picker_types: 'image',
        file_picker_callback: function (cv, value, meta){
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function(){
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                render.onload = function(){
                    var id = 'blobid'+(new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {title:file.name});
                };
            };
            input.click();
        },
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help'
    });
</script>
@endsection