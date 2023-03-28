@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ trans('product.heading') }}</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{ trans('common.edit') }}</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('products.index') }}" class="text-muted text-hover-primary">{{ trans('product.pural') }}</a></li>
					
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
					</div>
					
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Weekly Sales</h2></div>
						</div>
						<div class="card-body pt-0">
							<span class="text-muted">No data available. Sales data will begin capturing once product has been published.</span>
						</div>
					</div>
				</div>
				
				<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_leader">Leader</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
						</li> -->
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
											<label class="required form-label">Leader Title</label>
											<input type="text" class="form-control mb-2 titleprofile" id="title" placeholder="Enter title" value="{{ $data->title }}"/>
											<div class="text-muted fs-7">A Leader name is required and recommended to be unique.</div>
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Leader Designation</label>
											<input type="text" class="form-control mb-2 designation" id="designation" placeholder="Enter designation" value="{{ $data->designation }}"/>
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Image</label>
											<input type="file" class="form-control mb-2 imageprofile" id="image" placeholder="Enter Image" value="{{ $data->image }}"/>
											<img src="{{ $data->image }}" height="130px"  width="130px">
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Priority</label>
											<input type="number" class="form-control mb-2 priority" id="priority" placeholder="Enter priority" value="{{ $data->priority }}"/>
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Linkdin Link</label>
											<input type="text" class="form-control mb-2 link" id="link" placeholder="Enter Link" value="{{ $data->linkdinlink }}"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Inventory</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="mb-10 fv-row">
											<label class="required form-label">SKU</label>
											<input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number" value="" />
											<div class="text-muted fs-7">Enter the product SKU.</div>
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Barcode</label>
											<input type="text" name="sku" class="form-control mb-2" placeholder="Barcode Number" value="" />
											<div class="text-muted fs-7">Enter the product barcode number.</div>
										</div>
										<div class="mb-10 fv-row">
											<label class="required form-label">Quantity</label>
											<div class="d-flex gap-3">
												<input type="number" name="shelf" class="form-control mb-2" placeholder="On shelf" value="" />
												<input type="number" name="warehouse" class="form-control mb-2" placeholder="In warehouse" />
											</div>
											<div class="text-muted fs-7">Enter the product quantity.</div>
										</div>
										<div class="fv-row">
											<div class="form-check form-check-custom form-check-solid mb-2">
												<input class="form-check-input" type="checkbox" value="" />
												<label class="form-check-label">Yes</label>
											</div>
											<div class="text-muted fs-7">Allow customers to purchase products that are out of stock.</div>
										</div>
									</div>
								</div>
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Variations</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="" data-kt-ecommerce-catalog-add-product="auto-options">
											<label class="form-label">Add Product Variations</label>
											<div id="kt_ecommerce_add_product_options">
												<div class="form-group">
													<div data-repeater-list="kt_ecommerce_add_product_options" class="d-flex flex-column gap-3">
														<div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
															<div class="w-100 w-md-200px">
																<select class="form-select" name="product_option" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option">
																	<option></option>
																	<option value="color">Color</option>
																	<option value="size">Size</option>
																	<option value="material">Material</option>
																	<option value="style">Style</option>
																</select>
															</div>
															<input type="text" class="form-control mw-100 w-200px" name="product_option_value" placeholder="Variation" />
															<button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
																<span class="svg-icon svg-icon-1">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
																		<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
																	</svg>
																</span>
															</button>
														</div>
													</div>
												</div>
												<div class="form-group mt-5">
													<button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
													<span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>Add another variation</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Shipping</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="fv-row">
											<div class="form-check form-check-custom form-check-solid mb-2">
												<input class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
												<label class="form-check-label">This is a physical product</label>
											</div>
											<div class="text-muted fs-7">Set if the product is a physical or digital item. Physical products may require shipping.</div>
										</div>
										<div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
											<div class="mb-10 fv-row">
												<label class="form-label">Weight</label>
												<input type="text" name="weight" class="form-control mb-2" placeholder="Product weight" value="" />
												<div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
											</div>
											<div class="fv-row">
												<label class="form-label">Dimension</label>
												<div class="d-flex flex-wrap flex-sm-nowrap gap-3">
													<input type="number" name="width" class="form-control mb-2" placeholder="Width (w)" value="" />
													<input type="number" name="height" class="form-control mb-2" placeholder="Height (h)" value="" />
													<input type="number" name="length" class="form-control mb-2" placeholder="Lengtn (l)" value="" />
												</div>
												<div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Meta Options</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="mb-10">
											<label class="form-label">Meta Tag Title</label>
											<input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta tag name" />
											<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
										</div>
										<div class="mb-10">
											<label class="form-label">Meta Tag Description</label>
											<div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
											<div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
										</div>
										<div>
											<label class="form-label">Meta Tag Keywords</label>
											<input id="kt_ecommerce_add_product_meta_keywords" name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
											<div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
											<code>,</code>between each keyword.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ route('products.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
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
		$('input:radio[name=discount_option]:checked').change(function () {
			if ($("input[name='discount_option']:checked").val() == 'No') {
				$('#offer-price-box').hide();
            }else{
                $('#offer-price-box').show();
			}
		});
		
		// For Variation
		$(document).on('change','.variation-group',function(){
			if ($(this).is(':checked')) {
				$('#vgl-' + $(this).val()).show();
			}else{
				$('#vgl-' + $(this).val()).hide();
			}
		});

		// Product type on change
		$(document).on('change','#type',function(){
			if ($(this).val() == 'simple') {
				$('#simple').show();
				$('#variable').hide();
			}
			if ($(this).val() == 'variable') {
				$('#variable').show();
				$('#simple').hide();
			}
		});
		if ('{{$data->type}}' == 'simple') {
			$('#simple').show();
			$('#variable').hide();
		}else if ('{{$data->type}}' == 'variable') {
			$('#variable').show();
			$('#simple').hide();
		}
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
	function submitContent(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('titleprofile', $('.titleprofile').val());
		data.append('designation',$('.designation').val());
		data.append('imageprofile',jQuery(this)[0].files[0]);
		data.append('type', 'content');
		$('.titleprofile').each(function(i,v){
			var dataa = $(v).val();
			// arra.push(dataa);
			data.append('titleprofile[]',dataa);
		})
		$('.designation').each(function(i,v){
			var datadesc = $(v).val();
			// arrdesc.push(datadesc);
			data.append('designation[]', datadesc);
		})
		$('.priority').each(function(i,v){
			var datadesc = $(v).val();
			// arrdesc.push(datadesc);
			data.append('priority[]', datadesc);
		})
		$('.link').each(function(i,v){
			var datadesc = $(v).val();
			// arrdesc.push(datadesc);
			data.append('link[]', datadesc);
		})
		$('.imageprofile').each(function(i,v){
			if(typeof jQuery(this)[0].files[0] != "undefined")
			{
				console.log(jQuery(this)[0].files[0]);
				data.append('imageprofile[]', jQuery(this)[0].files[0]);
			}
			else
			{
				// $('.editimg').each(function(i,v){
				// 	var imgsss = $(v).val()
				// 	if(typeof imgsss != "")
				// 	{
				// 		console.log(imgsss+'dasdssd');
				// 		data.append('imageprofile[]',imgsss);
				// 	}
				// })
				// var img = $(v).val();
				var img = $(v).data("img")
				console.log(img+'dasdssd');
				data.append('imageprofile[]',img);
			}
			
			// dataimg.push(jQuery(this)[0].files[0] );
		})
		
		var response = adminAjax('{{route("ajax.save.leader")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
  	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('titleprofile', $('.titleprofile').val());
		data.append('designation',$('.designation').val());
		data.append('imageprofile',jQuery('.imageprofile')[0].files[0]);
		data.append('priority',$('.priority').val());
		data.append('link',$('.link').val());
		data.append('status', $('#status').val());
		var response = adminAjax('{{route("ajax.save.leader")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
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
		var response = adminAjax('{{route("ajax.product.category.list")}}', data);
		if(response.status == '200'){
			if(response.data.length > 0){
				$.each(response.data, function( index, value ) {
					$('#category-'+value.category_id).prop('checked', true);
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
</script>
@endsection