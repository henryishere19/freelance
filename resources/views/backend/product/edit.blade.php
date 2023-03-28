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
							<div class="card-title"><h2>Product Details</h2></div>
						</div>
						<div class="card-body pt-0">
							<label class="form-label">Categories</label>
							<select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
								<option></option>
								<option value="Computers">Computers</option>
								<option value="Watches">Watches</option>
								<option value="Headphones">Headphones</option>
								<option value="Footwear">Footwear</option>
								<option value="Cameras">Cameras</option>
								<option value="Shirts">Shirts</option>
								<option value="Household">Household</option>
								<option value="Handbags">Handbags</option>
								<option value="Wines">Wines</option>
								<option value="Sandals">Sandals</option>
							</select>
							<div class="text-muted fs-7 mb-7">Add product to a category.</div>
							<a href="{{ route('category.list', ['product']) }}" target="_blank" class="btn btn-light-primary btn-sm mb-10"><i class="bi bi-plus fs-3"></i> Create new category</a>
							
							<label class="form-label d-block">Tags</label>
							<input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value=""/>
							<div class="text-muted fs-7">Add tags to a product.</div>
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
											<label class="required form-label">Product Title</label>
											<input type="text" class="form-control mb-2" id="title" placeholder="Enter title" value="{{ $data->title }}"/>
											<div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
										</div>
										<div>
											<label class="form-label">Description</label>
											<textarea id="description" class="min-h-200px mb-2">{{ $data->description }}</textarea>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
									</div>
								</div>
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Media</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="fv-row mb-2">
											<div class="dropzone" id="kt_ecommerce_add_product_media">
												<div class="dz-message needsclick">
													<i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
													<div class="ms-4">
														<h3 class="fs-5 fw-bold text-gray-900 mb-1 dropzone-text">Drop files here or click to upload.</h3>
														<span class="fs-7 fw-semibold text-gray-400">Upload up to 5 files</span>
														<input type="file" id="gallery" hidden>
													</div>
												</div>
											</div>
											<div class="text-muted fs-7">Set the media gallery.</div>
											
											<div id="gallery-list" class="pt-5">
												@if($gallery)
												@foreach($gallery as $list)
												<div class="gallery-img me-3 mt-5"><img src="{{asset($list->media)}}"></div>
												@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Pricing</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="fv-row mb-10">
											<div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
												<div class="col">
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
														<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1"><input class="form-check-input" type="radio" name="discount_option" value="No" checked="checked"/></span>
														<span class="ms-5"><span class="fs-4 fw-bold text-gray-800 d-block">No Discount</span></span>
													</label>
												</div>
												<div class="col">
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
														<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1"><input class="form-check-input" type="radio" name="discount_option" value="Yes" @if($data->offer_price) checked="checked" @endif/></span>
														<span class="ms-5"><span class="fs-4 fw-bold text-gray-800 d-block">With Discount</span></span>
													</label>
												</div>
											</div>
										</div>
										<div class="mb-10 row">
											<div class="col-md-4">
												<label class="required form-label">Base Price</label>
												<input type="number" id="price" class="form-control mb-2" placeholder="Enter Price" value="{{ $data->price }}"/>
												<div class="text-muted fs-7">Set the base price.</div>
											</div>
											<div id="offer-price-box" class="col-md-4" @if($data->offer_price) style="display:block;" @endif>
												<label class="form-label">Offer Price</label>
												<input type="number" id="offer_price" class="form-control mb-2" placeholder="Enter Offer Price" value="{{ $data->offer_price }}"/>
												<div class="text-muted fs-7">Set the offer price.</div>
											</div>
										</div>
										
										<div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
											<label class="form-label">Set Discount Percentage</label>
											<div class="d-flex flex-column text-center mb-5">
												<div class="d-flex align-items-start justify-content-center mb-7">
													<span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
													<span class="fw-bold fs-4 mt-1 ms-2">%</span>
												</div>
												<div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
											</div>
											<div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
										</div>
										<div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
											<label class="form-label">Fixed Discounted Price</label>
											<input type="text" name="dicsounted_price" class="form-control mb-2" placeholder="Discounted price" />
											<div class="text-muted fs-7">Set the discounted product price. The product will be reduced at the determined fixed price</div>
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

  	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		data.append('description', tinyMCE.get('description').getContent());
		data.append('price', $('#price').val());
		data.append('offer_price', $('#offer_price').val());
		data.append('image', jQuery('#image')[0].files[0]);
		data.append('brand_id', $('#brand_id').val());
		data.append('status', $('#status').val());
		data.append('seo_title', $('#seo_title').val());
		data.append('seo_keywords', $('#seo_keywords').val());
		data.append('seo_description', $('#seo_description').val());
		var response = adminAjax('{{route("ajax.save.product")}}', data);
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